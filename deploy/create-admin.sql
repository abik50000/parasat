-- Аккаунт для входа в /admin. Пароль: Parasat2026!  — СМЕНИ его после первого входа.
-- Выполнить в phpMyAdmin ПОСЛЕ импорта parasat-db.sql (только если нет доступа к CLI;
-- при наличии CLI лучше: php artisan make:filament-user)
INSERT INTO `users` (`name`, `email`, `password`, `created_at`, `updated_at`)
VALUES ('Admin', 'admin@parasat-aj.kz', '$2y$10$IfUjMP4N/cI.nfx4N6S/LucOF.NrN06QI3ltE7ARswKaPiMRc2sDC', NOW(), NOW());
 