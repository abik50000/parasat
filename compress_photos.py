#!/usr/bin/env python3
"""Сжатие фотографий (png/jpg/jpeg) в папке.

По умолчанию обрабатывает ~/Downloads/parasat/photos:
  - ширина не больше 1920 (пропорции сохраняются, вверх не растягивает)
  - JPEG, качество 80
  - на выходе всегда .jpg

Требуется Pillow:  pip install Pillow
"""

from __future__ import annotations

import argparse
import sys
from pathlib import Path

try:
    from PIL import Image, ImageOps
except ImportError:
    sys.exit("Нужен Pillow. Установи:  pip install Pillow")

SRC_EXTS = {".png", ".jpg", ".jpeg"}


def human(size: float) -> str:
    for unit in ("B", "KB", "MB", "GB"):
        if size < 1024 or unit == "GB":
            return f"{size:.0f} {unit}" if unit == "B" else f"{size:.1f} {unit}"
        size /= 1024


def unique_path(path: Path) -> Path:
    """Не затирать чужой файл: photo.jpg -> photo_1.jpg и т.д."""
    if not path.exists():
        return path
    stem, suffix, parent = path.stem, path.suffix, path.parent
    i = 1
    while (candidate := parent / f"{stem}_{i}{suffix}").exists():
        i += 1
    return candidate


def compress(src: Path, dst: Path, max_width: int, quality: int) -> None:
    with Image.open(src) as img:
        img = ImageOps.exif_transpose(img)  # учесть поворот из EXIF

        if img.mode in ("RGBA", "LA", "P"):
            img = img.convert("RGBA")
            background = Image.new("RGB", img.size, (255, 255, 255))
            background.paste(img, mask=img.split()[-1])
            img = background
        else:
            img = img.convert("RGB")

        if img.width > max_width:
            new_height = round(img.height * max_width / img.width)
            img = img.resize((max_width, new_height), Image.LANCZOS)

        dst.parent.mkdir(parents=True, exist_ok=True)
        img.save(dst, "JPEG", quality=quality, optimize=True, progressive=True)


def main() -> None:
    default_src = Path.home() / "Downloads" / "parasat" / "photos"

    parser = argparse.ArgumentParser(description="Сжатие png/jpg/jpeg -> jpg")
    parser.add_argument("src", nargs="?", type=Path, default=default_src,
                        help=f"папка с фото (по умолчанию: {default_src})")
    parser.add_argument("-o", "--out", type=Path, default=None,
                        help="папка для результата (по умолчанию: <src>/compressed)")
    parser.add_argument("--in-place", action="store_true",
                        help="перезаписать файлы в исходной папке (png удаляются после конвертации)")
    parser.add_argument("-w", "--max-width", type=int, default=1920, help="макс. ширина (1920)")
    parser.add_argument("-q", "--quality", type=int, default=80, help="качество JPEG (80)")
    parser.add_argument("-r", "--recursive", action="store_true", help="искать во вложенных папках")
    args = parser.parse_args()

    src_dir: Path = args.src
    if not src_dir.is_dir():
        sys.exit(f"Нет такой папки: {src_dir}")

    if args.in_place:
        out_dir = src_dir
    else:
        out_dir = args.out or (src_dir / "compressed")

    pattern = "**/*" if args.recursive else "*"
    files = sorted(
        p for p in src_dir.glob(pattern)
        if p.is_file() and p.suffix.lower() in SRC_EXTS
        and (args.in_place or out_dir not in p.parents)
    )

    if not files:
        print(f"Фото не найдено в {src_dir}")
        return

    total_before = total_after = 0
    ok = fail = 0

    for src in files:
        rel = src.relative_to(src_dir)
        dst = (out_dir / rel).with_suffix(".jpg")

        if args.in_place:
            # png -> jpg: убираем оригинал; jpg -> jpg: перезаписываем на месте
            if src.suffix.lower() != ".jpg" and dst != src:
                dst = unique_path(dst)
        elif dst.resolve() != src.resolve():
            dst = unique_path(dst)

        try:
            before = src.stat().st_size
            compress(src, dst, args.max_width, args.quality)
            after = dst.stat().st_size
        except Exception as exc:  # noqa: BLE001
            fail += 1
            print(f"  ✗ {rel}: {exc}")
            continue

        if args.in_place and src.suffix.lower() != ".jpg" and src.exists() and dst != src:
            src.unlink()

        total_before += before
        total_after += after
        ok += 1
        pct = (after / before - 1) * 100 if before else 0
        print(f"  ✓ {rel} -> {dst.name}  {human(before)} -> {human(after)}  ({pct:+.0f}%)")

    print(
        f"\nГотово: {ok} шт."
        + (f", ошибок {fail}" if fail else "")
        + f"\nРазмер: {human(total_before)} -> {human(total_after)}"
        + (f"  (-{(1 - total_after / total_before) * 100:.0f}%)" if total_before else "")
        + (f"\nПапка результата: {out_dir}" if not args.in_place else "")
    )


if __name__ == "__main__":
    main()
