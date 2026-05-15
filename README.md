# Marketplace Jual Beli Akun (CodeIgniter 3 Starter)

Starter fullstack awal untuk marketplace akun game dengan role Buyer, Seller, dan Admin.

## Yang sudah tersedia
- Struktur awal CodeIgniter 3 (`application/controllers`, `models`, `views`, `libraries`, `config`).
- Route dasar Buyer/Seller/Admin + callback payment Duitku.
- Contoh race-safe wallet debit pada `Wallet_model::safeDebit()` dengan `SELECT ... FOR UPDATE`.
- UI starter berbasis Tailwind CSS untuk halaman dashboard dan list dasar.
- Dokumen blueprint di `MARKETPLACE_SPEC.md` dan skema SQL di `database_schema_marketplace.sql`.

## Endpoint awal
- `/` home
- `/buyer/dashboard`, `/buyer/wallet`, `/buyer/orders`
- `/seller/dashboard`, `/seller/products`, `/seller/orders`
- `/admin/dashboard`, `/admin/products/review`, `/admin/orders`
- `/payment/duitku/callback`

## Next step implementasi
1. Auth + session + role middleware.
2. CRUD produk + upload screenshot + reorder.
3. Checkout + invoice Duitku + callback idempotent.
4. Escrow seller (`pending` -> `available`) saat order complete.
5. Dispute, refund, withdrawal approval admin.
