# Деплой на shared-хостинг (без Docker)

Хостинг — обычный Apache + PHP (cPanel / ISPmanager). Docker там не нужен.

## 1. Проверить PHP

В панели выбрать для домена **PHP 8.2 или 8.3**. Нужны расширения:
`pdo_mysql, mbstring, openssl, bcmath, ctype, fileinfo, tokenizer, xml, curl, gd, intl, zip`
(на большинстве хостингов включены по умолчанию).

## 2. Создать базу данных

Панель хостинга → **«Базы данных MySQL»** (cPanel) / **«Базы данных»** (ISPmanager):

1. Создать базу — запомнить полное имя (часто с префиксом, напр. `parasat_main`).
2. Создать пользователя БД + пароль.
3. Привязать пользователя к базе, дать **все привилегии**.
4. Хост базы — почти всегда `localhost` (иногда отдельный, смотри в панели).

## 3. Залить файлы

Загрузить весь проект (FTP / файловый менеджер / git), **включая папку `vendor/`**
(если на хостинге нет composer). Структура на сервере — как в репозитории;
корневой `.htaccess` уже перенаправляет запросы в `public/`.

Если домен смотрит прямо в `public/` — корневой `.htaccess` не нужен, просто указать
document root на `.../public`.

## 4. Настроить .env

Скопировать `deploy/.env.production.example` → `.env` в корне проекта и заполнить:

- `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` — из шага 2, `DB_HOST=localhost`
- `APP_URL=https://test.parasat-aj.kz`
- `APP_KEY` — сгенерировать: `php artisan key:generate` (если есть CLI),
  либо скопировать строку `APP_KEY=base64:...` из локального `.env`.

## 5. Создать таблицы

### Вариант А — есть SSH или «Терминал» в панели (предпочтительно)

```bash
cd ~/путь/к/проекту
php artisan migrate --force
php artisan db:seed --class=NewsSeeder --force      # 3 стартовые новости (необязательно)
php artisan make:filament-user                       # аккаунт для /admin
php artisan storage:link                             # чтобы показывались загруженные картинки
php artisan config:cache && php artisan route:cache && php artisan view:cache
```

Если `php` в консоли — не та версия, обычно есть `php82` / `php8.3` / полный путь
`/usr/local/bin/ea-php83` (уточнить в панели).

### Вариант Б — CLI нет, но есть браузер (веб-роут `/__deploy`)

В `routes/web.php` есть временный роут для запуска artisan-команд через URL.
Включается заданием секрета в `.env`:

```
DEPLOY_KEY=любая-длинная-случайная-строка
```

Затем в браузере (по очереди):

```
https://test.parasat-aj.kz/__deploy?key=СЕКРЕТ                 → список команд
https://test.parasat-aj.kz/__deploy/migrate?key=СЕКРЕТ         → создать таблицы
https://test.parasat-aj.kz/__deploy/seed-news?key=СЕКРЕТ       → 3 стартовые новости
https://test.parasat-aj.kz/__deploy/storage-link?key=СЕКРЕТ    → симлинк для картинок
https://test.parasat-aj.kz/__deploy/clear?key=СЕКРЕТ           → сбросить кеши
https://test.parasat-aj.kz/__deploy/cache-build?key=СЕКРЕТ     → собрать кеши (ускорение)
```

Аккаунт админа: импортировать `deploy/create-admin.sql` через phpMyAdmin
(`make:filament-user` из браузера не запустить).

**После настройки:** убрать `DEPLOY_KEY` из `.env` (роут сразу отключится) или
удалить блок `/__deploy` из `routes/web.php`.

### Вариант В — только phpMyAdmin

1. phpMyAdmin → выбрать базу → **«Импорт»** → залить **`deploy/parasat-db.sql`**
   (все таблицы + миграции + 3 новости).
2. Затем импортировать **`deploy/create-admin.sql`** — вход
   `admin@parasat-aj.kz` / `Parasat2026!` (**сменить пароль после входа**).
3. Симлинк `public/storage` phpMyAdmin не сделает. Варианты:
   - создать вручную через файловый менеджер: `public/storage` → `../storage/app/public`;
   - или в `config/filesystems.php` у диска `public` поставить
     `'root' => public_path('storage')`, `'url' => '/storage'` и создать папку
     `public/storage/news`.

## 6. Права на папки

`storage/` и `bootstrap/cache/` должны быть доступны на запись (обычно 755, владелец — юзер хостинга).

## 7. Проверить

- `https://test.parasat-aj.kz` — сайт
- `https://test.parasat-aj.kz/news` — новости из БД
- `https://test.parasat-aj.kz/admin` — вход в админку

## Обновление БД в будущем

Схему меняем только миграциями. После добавления новой миграции:
`php artisan migrate --force` (вариант А) или сгенерировать свежий
`parasat-db.sql` локально и импортировать разницу.

---

### Файлы в этой папке

| Файл | Что это |
|---|---|
| `.env.production.example` | шаблон `.env` для боевого сервера |
| `parasat-db.sql` | дамп: структура всех таблиц + строки `migrations` + 3 новости |
| `create-admin.sql` | INSERT аккаунта администратора (только для варианта Б) |

`parasat-db.sql` пересобрать: `docker compose exec db mariadb-dump -u parasat -psecret --no-data parasat > deploy/parasat-db.sql && docker compose exec db mariadb-dump -u parasat -psecret --no-create-info parasat migrations news >> deploy/parasat-db.sql`
