<div class="bg-white rounded-2xl shadow-sm border overflow-hidden">
  <div class="px-4 md:px-8 py-4 border-b text-sm text-slate-500">Beranda / Seller / <span class="text-blue-600 font-semibold"><?= html_escape($store['name']); ?></span></div>
  <section class="p-4 md:p-8 grid lg:grid-cols-12 gap-6">
    <div class="lg:col-span-7 border rounded-2xl p-5">
      <div class="flex gap-4">
        <div class="h-28 w-28 rounded-full bg-slate-900"></div>
        <div class="flex-1">
          <h1 class="text-4xl font-extrabold"><?= html_escape($store['name']); ?></h1>
          <div class="text-blue-600 text-sm mt-1">Seller Terverifikasi</div>
          <p class="text-slate-600 mt-2"><?= html_escape($store['description']); ?></p>
          <div class="grid grid-cols-2 md:grid-cols-4 gap-2 mt-3 text-sm">
            <div class="border rounded-xl p-2"><div class="text-slate-500">Sejak</div><b><?= $store['joined']; ?></b></div>
            <div class="border rounded-xl p-2"><div class="text-slate-500">Respon</div><b><?= $store['response']; ?></b></div>
            <div class="border rounded-xl p-2"><div class="text-slate-500">Transaksi</div><b><?= $store['transactions']; ?></b></div>
            <div class="border rounded-xl p-2"><div class="text-slate-500">Rating</div><b><?= $store['rating']; ?></b></div>
          </div>
        </div>
      </div>
      <div class="mt-4 grid grid-cols-3 gap-2"><button class="bg-blue-600 text-white rounded-xl py-2">Ikuti Toko</button><button class="border border-blue-600 text-blue-600 rounded-xl py-2">Chat Seller</button><button class="border rounded-xl py-2">Bagikan</button></div>
    </div>

    <div class="lg:col-span-5 space-y-4">
      <div class="border rounded-2xl p-4 grid grid-cols-4 gap-2 text-center text-sm">
        <div><div class="font-bold text-2xl"><?= $store['active_products']; ?></div><div>Produk</div></div>
        <div><div class="font-bold text-2xl"><?= $store['completed_orders']; ?></div><div>Selesai</div></div>
        <div><div class="font-bold text-2xl"><?= $store['rating']; ?></div><div>Rating</div></div>
        <div><div class="font-bold text-2xl"><?= $store['followers']; ?></div><div>Followers</div></div>
      </div>
      <div class="border rounded-2xl p-4"><div class="font-bold text-xl mb-2">Informasi Seller</div><ul class="text-sm text-slate-600 space-y-1"><li>• Proses cepat dan aman</li><li>• Akun dicek manual sebelum dikirim</li><li>• Garansi 100%</li><li>• Support 24/7</li></ul></div>
    </div>
  </section>

  <section class="px-4 md:px-8 pb-8">
    <div class="flex items-center justify-between mb-3"><h2 class="text-3xl font-extrabold">Produk Seller</h2><a class="text-blue-600 font-semibold" href="#">Lihat Semua</a></div>
    <div class="grid grid-cols-2 md:grid-cols-5 gap-3">
      <?php foreach($products as $product): ?>
        <?php $this->load->view('components/product_card', ['product' => $product]); ?>
      <?php endforeach; ?>
    </div>
  </section>
</div>
