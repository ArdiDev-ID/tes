# AkunMarket Installation

1. Configure database in **`application/config/database.php`**.
2. Import `database_schema_marketplace.sql` and `database/migrations/*.sql`.
3. Enable CSRF in `application/config/config.php`.
4. Configure SMTP and payment keys in secure config/env files.

## Contoh konfigurasi database.php
```php
$db['default'] = [
  'hostname' => '127.0.0.1',
  'username' => 'root',
  'password' => '',
  'database' => 'akunmarket',
  'dbdriver' => 'mysqli',
  'char_set' => 'utf8mb4',
  'dbcollat' => 'utf8mb4_unicode_ci',
];
```

Tidak ada file `database.js` pada CodeIgniter 3.
