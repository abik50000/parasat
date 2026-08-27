<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo '<pre>';
echo '<b>PHP версия:</b> ' . PHP_VERSION . "\n";
echo '<b>__DIR__:</b> ' . __DIR__ . "\n\n";

// Показать что есть рядом с public/
echo "<b>Содержимое папки выше public/:</b>\n";
$parent = dirname(__DIR__);
echo "Путь: $parent\n";
$items = @scandir($parent);
if ($items) {
    foreach ($items as $item) {
        if ($item === '.' || $item === '..') continue;
        $full = $parent . '/' . $item;
        $type = is_dir($full) ? '[dir]' : '[file]';
        echo "  $type $item\n";
    }
} else {
    echo "  ❌ Не удалось прочитать папку\n";
}

// Показать содержимое public/
echo "\n<b>Содержимое public/:</b>\n";
$items = @scandir(__DIR__);
if ($items) {
    foreach ($items as $item) {
        if ($item === '.' || $item === '..') continue;
        $full = __DIR__ . '/' . $item;
        $type = is_dir($full) ? '[dir]' : '[file]';
        echo "  $type $item\n";
    }
}

// Проверить vendor в нескольких местах
echo "\n<b>Поиск vendor/autoload.php:</b>\n";
$candidates = [
    __DIR__ . '/../vendor/autoload.php',
    __DIR__ . '/../../vendor/autoload.php',
    __DIR__ . '/vendor/autoload.php',
];
foreach ($candidates as $path) {
    $real = realpath($path);
    if ($real) {
        echo "  ✅ Найден: $real\n";
    } else {
        echo "  ❌ Нет: $path\n";
    }
}

echo '</pre>';
