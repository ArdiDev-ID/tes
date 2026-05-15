# AkunMarket Installation

1. Configure database in application/config/database.php
2. Import database_schema_marketplace.sql and database/migrations/*.sql
3. Enable CSRF in config.php
4. Configure SMTP and payment keys in env/config

> Catatan: Pada CodeIgniter 3, konfigurasi database ada di `application/config/database.php` (bukan `database.js`).
