# Marketplace Jual Beli Akun (CodeIgniter 3) — Technical Blueprint

Dokumen ini adalah blueprint implementasi lengkap untuk website marketplace jual beli akun game dengan peran **Buyer, Seller, Admin**, payment gateway **Duitku**, notifikasi **in-app + email**, dan proteksi **race-safe database locking**.

## 1) Stack
- Backend: CodeIgniter 3 (PHP 7.4+ / 8.0 compatibility mode)
- Frontend: HTML, Tailwind CSS, JavaScript, Font Awesome, Google Fonts
- DB: MySQL 8+ (InnoDB, transaction + row-level locking)
- Queue/Jobs: Cron + table-based locking
- Payment: Duitku (create invoice + callback + settlement)

## 2) Modul Utama

### Buyer
- Wallet: saldo, top-up, riwayat wallet, riwayat top-up, withdraw
- Orders: list + filter status, detail, complete order, request refund
- Wishlist: add/remove/toggle
- Dispute: open per order, chat, status resolusi
- Profile: edit profil, ganti password, upgrade seller
- Notification: bell, popup, mark read, delete

### Seller
- Dashboard statistik + chart performa
- Product management: CRUD, multiple screenshot, reorder drag-drop, delivery type instant/manual, custom fields, status approval
- Order management: list/filter, input data akun manual, auto-complete
- Promotion: CRUD diskon persen/nominal + periode aktif
- Dispute: lihat/balas
- Finance: seller balance realtime + logs + withdraw
- Store profile: nama/deskripsi/slug/logo

### Admin
- Dashboard statistik platform + chart
- User management (including wallet adjustment + suspend)
- Product moderation (approve/reject)
- Order monitoring + refund approval
- Dispute resolution (menang buyer/seller)
- Promotion moderation + force deactivate
- Finance operations topup/withdraw user/seller
- Content CMS: category, banner, static pages, SEO
- Payment & bank methods
- Settings tabs: Umum, Transaksi, Wallet, Produk, Maintenance, Sosial+SEO

## 3) Data Model (Ringkas)

### Core identity
- `users` (id, role: buyer/seller/admin, name, email, phone, password_hash, avatar, status, created_at)
- `seller_profiles` (user_id, store_name, slug, logo, description, balance_available, balance_pending)
- `user_wallets` (user_id, balance)

### Product & listing
- `products` (id, seller_id, title, description, price, category_id, delivery_type, is_active, approval_status, stock_mode_single, created_at)
- `product_screenshots` (id, product_id, path, sort_order)
- `product_custom_fields` (id, product_id, field_key, field_label, field_value)
- `categories` (id, name, is_active)

### Order & escrow
- `orders` (id, order_no, buyer_id, seller_id, product_id, price, platform_fee, seller_amount, status, payment_status, delivery_status, completed_at, auto_complete_at)
- `order_deliveries` (id, order_id, payload_encrypted, delivered_at, delivered_by)
- `refund_requests` (id, order_id, reason, status, admin_note)

### Wallet & seller finance
- `wallet_transactions` (id, user_id, type, amount, balance_before, balance_after, ref_type, ref_id)
- `seller_balance_logs` (id, seller_id, type, amount, balance_available_before, balance_available_after, balance_pending_before, balance_pending_after, ref_type, ref_id)
- `topups` (id, user_id, invoice_no, duitku_ref, amount, status, expired_at, paid_at)
- `withdrawals` (id, actor_type:user/seller, actor_id, amount, bank_id, account_no, account_name, status, admin_note)

### Promotion
- `promotions` (id, seller_id, product_id, type:percent/fixed, value, start_at, end_at, status, approval_status)

### Dispute
- `disputes` (id, order_id, buyer_id, seller_id, status, winner, resolved_by, resolved_at)
- `dispute_messages` (id, dispute_id, sender_id, message, created_at)

### Notification
- `notifications` (id, user_id, type, title, body, data_json, is_read, read_at)
- `notification_logs` (id, channel:inapp/email, user_id, template_key, status, sent_at, error_message)

### CMS & settings
- `banners`, `static_pages`, `seo_meta`, `banks`, `payment_methods`, `settings` (key-value)

## 4) Status Flow
- Produk: `pending_approval -> active -> inactive`
- Order: `pending_payment -> paid -> processing -> delivered -> completed`
- Refund: `requested -> approved/rejected -> refunded`
- Dispute: `open -> in_review -> resolved`
- Withdrawal: `requested -> approved/rejected -> paid`

## 5) Race-Safe Strategy (Wajib)

Gunakan transaction + lock row:

```sql
START TRANSACTION;
SELECT * FROM user_wallets WHERE user_id = ? FOR UPDATE;
-- validate and update balance
UPDATE user_wallets SET balance = balance - ? WHERE user_id = ?;
INSERT INTO wallet_transactions (...);
COMMIT;
```

Prinsip:
1. Semua mutasi saldo buyer/seller wajib lock row terkait (`FOR UPDATE`).
2. Proses payment callback wajib lock `orders` dan `products` sebelum update status.
3. Single-stock account listing: lock product row sebelum mark sold.
4. Job idempotent: gunakan `job_locks` / `processed_events` untuk mencegah double execute.
5. Refund: lock order + wallet/seller balance + product status dalam satu transaction boundary.

## 6) Struktur Folder CodeIgniter 3 (Saran)

- `application/controllers/`
  - `Buyer/Wallet.php`, `Buyer/Orders.php`, `Seller/Products.php`, `Admin/Orders.php`, dll
- `application/models/`
  - `Wallet_model.php`, `Order_model.php`, `Product_model.php`, `Dispute_model.php`
- `application/libraries/`
  - `Duitku.php`, `Notifier.php`, `LockingService.php`, `EscrowService.php`
- `application/views/`
  - buyer, seller, admin, shared components (navbar bell notification)
- `application/config/`
  - `duitku.php`, `marketplace.php`

## 7) Endpoint Prioritas (MVP)

1. Auth + role middleware
2. Product listing + detail + wishlist toggle
3. Checkout + invoice Duitku + callback settlement
4. Order delivery (manual + instant)
5. Complete order + escrow release
6. Refund & dispute basic
7. Wallet topup/withdraw
8. Admin moderation (product/refund/withdraw)

## 8) Integrasi Duitku
- Create invoice saat checkout/topup.
- Simpan signature payload dan verify callback signature.
- Callback harus idempotent (cek `processed_events` by callback reference).
- Status invoice expired update oleh cron.

## 9) Notifikasi
Setiap event mengirim:
- In-app: insert ke `notifications`
- Email: queue ke `email_outbox`

Template key contoh:
- `buyer_payment_success`
- `seller_new_order`
- `admin_refund_request`

## 10) Checklist Keamanan
- Password hash `password_hash` (bcrypt/argon2)
- CSRF aktif
- XSS filtering + output escaping
- Encrypt payload sensitif (data akun yang dikirim seller)
- Rate limit untuk login, callback, dispute message
- Audit trail untuk tindakan admin

## 11) Roadmap Implementasi
1. Schema migration + seed setting default
2. Auth, roles, ACL
3. Product + moderation
4. Checkout, payment callback, escrow
5. Order lifecycle
6. Wallet, withdraw, logs
7. Dispute & notification center
8. Admin CMS/settings
9. Hardening + load test concurrency
