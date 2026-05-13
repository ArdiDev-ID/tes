<div class="grid lg:grid-cols-12 gap-4">
  <aside class="lg:col-span-3 bg-white border rounded-2xl p-4">
    <div class="font-extrabold text-2xl">AkunMart</div><div class="text-sm text-slate-500">Admin Panel</div>
    <nav class="mt-4 space-y-1 text-sm">
      <?php foreach(['Dashboard','Pengguna','Seller','Produk','Pesanan','Transaksi','Laporan','Kategori','Kupon','Banner','Notifikasi'] as $i=>$m): ?><a class="block px-3 py-2 rounded-lg <?= $i===0?'bg-violet-50 text-violet-700 font-semibold':'hover:bg-slate-50'; ?>" href="#"><?= $m; ?></a><?php endforeach; ?>
      <a href="<?= site_url('admin/system-control'); ?>" class="block px-3 py-2 rounded-lg hover:bg-slate-50">Pengaturan Aplikasi</a>
    </nav>
  </aside>

  <section class="lg:col-span-9 space-y-4">
    <div class="bg-white border rounded-2xl p-4"><h1 class="text-3xl font-extrabold">Dashboard</h1><p class="text-slate-600">Selamat datang kembali, Admin! 👋</p></div>
    <div class="grid md:grid-cols-4 gap-3">
      <div class="bg-white border rounded-2xl p-4"><div class="text-sm text-slate-500">Total Pengguna</div><div class="text-3xl font-bold"><?= $summary['users']; ?></div></div>
      <div class="bg-white border rounded-2xl p-4"><div class="text-sm text-slate-500">Total Seller</div><div class="text-3xl font-bold"><?= $summary['sellers']; ?></div></div>
      <div class="bg-white border rounded-2xl p-4"><div class="text-sm text-slate-500">Total Pesanan</div><div class="text-3xl font-bold"><?= $summary['orders']; ?></div></div>
      <div class="bg-white border rounded-2xl p-4"><div class="text-sm text-slate-500">Total Pendapatan</div><div class="text-3xl font-bold">Rp <?= $summary['revenue']; ?></div></div>
    </div>

    <div class="grid md:grid-cols-2 gap-4">
      <div class="bg-white border rounded-2xl p-4"><div class="font-bold mb-2">Grafik Pendapatan</div><div class="h-56 rounded-xl bg-gradient-to-t from-violet-100 to-white border"></div></div>
      <div class="bg-white border rounded-2xl p-4"><div class="font-bold mb-2">Status Pesanan</div><div class="h-56 rounded-xl bg-slate-50 border flex items-center justify-center text-slate-500">Selesai 68.5% · Dikemas 16.0% · Dikirim 11.9%</div></div>
    </div>

    <div class="bg-white border rounded-2xl p-4 overflow-x-auto">
      <div class="font-bold mb-2">Pesanan Terbaru</div>
      <table class="w-full text-sm min-w-[650px]"><thead><tr class="text-left text-slate-500"><th>ID Pesanan</th><th>Pelanggan</th><th>Seller</th><th>Total</th><th>Status</th></tr></thead><tbody>
        <?php foreach($recent_orders as $o): ?><tr class="border-t"><td class="py-2 font-semibold"><?= $o['id']; ?></td><td><?= $o['buyer']; ?></td><td><?= $o['seller']; ?></td><td>Rp<?= number_format($o['total'],0,',','.'); ?></td><td><?= $o['status']; ?></td></tr><?php endforeach; ?>
      </tbody></table>
    </div>
  </section>
</div>
