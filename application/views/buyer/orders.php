<div class="bg-white rounded-2xl shadow-sm border overflow-hidden">
  <div class="px-4 md:px-8 py-4 border-b text-sm text-slate-500">Beranda / <span class="text-blue-600 font-semibold">Riwayat Pembelian</span></div>
  <section class="p-4 md:p-8 grid lg:grid-cols-12 gap-6">
    <div class="lg:col-span-9">
      <h1 class="text-4xl font-extrabold">Riwayat Pembelian</h1>
      <p class="text-slate-600 mt-2">Lihat semua pesanan akun yang pernah kamu beli.</p>

      <form class="mt-4 flex gap-2" method="get">
        <input type="text" name="q" value="<?= html_escape($filters['q']); ?>" class="flex-1 border rounded-xl px-4 py-3" placeholder="Cari nomor pesanan atau produk...">
        <select name="status" class="border rounded-xl px-4 py-3">
          <?php foreach(['semua'=>'Semua','selesai'=>'Selesai','diproses'=>'Diproses','dibatalkan'=>'Dibatalkan'] as $k=>$v): ?>
            <option value="<?= $k; ?>" <?= $filters['status']===$k?'selected':''; ?>><?= $v; ?></option>
          <?php endforeach; ?>
        </select>
        <button class="bg-blue-600 text-white px-5 rounded-xl">Filter</button>
      </form>

      <div class="mt-4 space-y-3">
        <?php foreach($orders as $order): ?>
          <div class="border rounded-2xl p-4 flex flex-col md:flex-row gap-3 md:items-center">
            <div class="h-20 w-36 rounded-xl bg-slate-200"></div>
            <div class="flex-1"><div class="font-bold text-2xl"><?= html_escape($order['title']); ?></div><div class="text-slate-500"><?= html_escape($order['subtitle']); ?></div><div class="text-slate-500">Seller: <?= html_escape($order['seller']); ?> · <?= html_escape($order['order_no']); ?> · <?= html_escape($order['date']); ?></div></div>
            <div class="md:text-right"><div class="text-3xl font-extrabold text-blue-600">Rp<?= number_format((float)$order['price'],0,',','.'); ?></div><div class="mt-2 text-sm inline-block px-3 py-1 rounded-full <?= $order['status']==='selesai'?'bg-green-100 text-green-700':($order['status']==='diproses'?'bg-amber-100 text-amber-700':'bg-slate-200 text-slate-700'); ?>"><?= ucfirst($order['status']); ?></div></div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <aside class="lg:col-span-3 space-y-4">
      <div class="border rounded-2xl p-4">
        <div class="font-bold text-xl mb-3">Statistik Pembelian</div>
        <div class="grid grid-cols-2 gap-2 text-sm">
          <div class="border rounded-xl p-2"><div class="text-2xl font-bold"><?= $stats['total']; ?></div><div>Total</div></div>
          <div class="border rounded-xl p-2"><div class="text-2xl font-bold text-green-600"><?= $stats['selesai']; ?></div><div>Selesai</div></div>
          <div class="border rounded-xl p-2"><div class="text-2xl font-bold text-amber-600"><?= $stats['diproses']; ?></div><div>Diproses</div></div>
          <div class="border rounded-xl p-2"><div class="text-2xl font-bold text-slate-500"><?= $stats['dibatalkan']; ?></div><div>Dibatalkan</div></div>
        </div>
      </div>
    </aside>
  </section>
</div>
