<div class="grid lg:grid-cols-12 gap-4">
  <aside class="lg:col-span-3 bg-white border rounded-2xl p-4">
    <div class="font-extrabold text-2xl">AkunMart</div>
    <div class="text-sm text-slate-500 mb-3">Seller Dashboard</div>
    <nav class="space-y-1 text-sm">
      <?php foreach(['Dashboard','Produk Saya','Pesanan','Transaksi','Saldo & Pencairan','Statistik','Promo & Kupon','Ulasan','Pengaturan Toko','Pengaturan Akun'] as $i => $menu): ?>
        <a href="#" class="block px-3 py-2 rounded-lg <?= $i===0 ? 'bg-blue-50 text-blue-700 font-semibold' : 'hover:bg-slate-50'; ?>"><?= $menu; ?></a>
      <?php endforeach; ?>
    </nav>
  </aside>

  <section class="lg:col-span-9 space-y-4">
    <div class="bg-white border rounded-2xl p-4"><h1 class="text-3xl font-extrabold">Dashboard</h1><p class="text-slate-600">Selamat datang kembali, Rizky Pratama 👋</p></div>

    <div class="grid md:grid-cols-4 gap-3">
      <div class="bg-white border rounded-2xl p-4"><div class="text-sm text-slate-500">Pendapatan</div><div class="text-3xl font-extrabold mt-1">Rp<?= number_format($summary['income'],0,',','.'); ?></div></div>
      <div class="bg-white border rounded-2xl p-4"><div class="text-sm text-slate-500">Penjualan</div><div class="text-3xl font-extrabold mt-1"><?= $summary['sales']; ?></div></div>
      <div class="bg-white border rounded-2xl p-4"><div class="text-sm text-slate-500">Pesanan Selesai</div><div class="text-3xl font-extrabold mt-1"><?= $summary['completed']; ?></div></div>
      <div class="bg-white border rounded-2xl p-4"><div class="text-sm text-slate-500">Rating Toko</div><div class="text-3xl font-extrabold mt-1"><?= $summary['rating']; ?></div></div>
    </div>

    <div class="grid md:grid-cols-2 gap-4">
      <div class="bg-white border rounded-2xl p-4"><div class="font-bold text-xl mb-2">Pesanan Masuk Terbaru</div>
        <div class="space-y-2 text-sm">
          <?php foreach($recent_orders as $row): ?><div class="flex justify-between border rounded-lg p-2"><div><div class="font-semibold"><?= html_escape($row['name']); ?></div><div class="text-slate-500"><?= $row['status']; ?></div></div><b>Rp<?= number_format($row['price'],0,',','.'); ?></b></div><?php endforeach; ?>
        </div>
      </div>
      <div class="bg-white border rounded-2xl p-4"><div class="font-bold text-xl mb-2">Statistik Toko</div><div class="space-y-2 text-sm"><div class="flex justify-between"><span>Dilihat</span><b>3.245</b></div><div class="flex justify-between"><span>Pengunjung</span><b>1.287</b></div><div class="flex justify-between"><span>Konversi</span><b>24.8%</b></div><div class="flex justify-between"><span>Favorit</span><b>342</b></div></div></div>
    </div>

    <div class="bg-white border rounded-2xl p-4 overflow-x-auto">
      <div class="font-bold text-xl mb-2">Produk Terlaris</div>
      <table class="w-full text-sm min-w-[520px]"><thead><tr class="text-left text-slate-500"><th class="py-2">Produk</th><th>Terjual</th><th>Pendapatan</th><th>Stok</th></tr></thead><tbody>
      <?php foreach($top_products as $p): ?><tr class="border-t"><td class="py-2 font-semibold"><?= html_escape($p['name']); ?></td><td><?= $p['sold']; ?></td><td>Rp<?= number_format($p['income'],0,',','.'); ?></td><td><?= $p['stock']; ?></td></tr><?php endforeach; ?>
      </tbody></table>
    </div>
  </section>
</div>
