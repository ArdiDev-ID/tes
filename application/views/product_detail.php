<div class="bg-white rounded-2xl shadow-sm border overflow-hidden">
  <div class="px-4 md:px-8 py-4 border-b text-sm text-slate-500">Beranda / <?= html_escape($product['category_name']); ?> / <span class="text-blue-600 font-semibold">Detail Produk</span></div>
  <section class="p-4 md:p-8 grid lg:grid-cols-12 gap-6">
    <div class="lg:col-span-8">
      <div class="rounded-2xl bg-slate-900 h-64 md:h-80"></div>
      <div class="grid grid-cols-4 md:grid-cols-6 gap-2 mt-3">
        <?php for ($i=0; $i<6; $i++): ?><div class="h-16 rounded-xl bg-slate-200"></div><?php endfor; ?>
      </div>
      <h1 class="text-3xl font-extrabold mt-5"><?= html_escape($product['title']); ?></h1>
      <p class="text-slate-600 mt-1">Mythic Glory · 75+ Skin · Aman</p>
      <div class="flex gap-2 flex-wrap mt-3 text-xs"><?php foreach(['Ready','Seller Terverifikasi','Garansi 100%'] as $badge): ?><span class="px-3 py-1 rounded-full bg-slate-100 border"><?= $badge; ?></span><?php endforeach; ?></div>
      <div class="text-4xl text-blue-600 font-extrabold mt-4">Rp<?= number_format((float)$product['price'],0,',','.'); ?></div>
      <div class="grid md:grid-cols-3 gap-3 mt-4">
        <a href="<?= site_url('checkout/' . $product['id']); ?>" class="bg-blue-600 text-white font-semibold rounded-xl py-3 text-center block">Beli Sekarang</a>
        <button class="border border-blue-600 text-blue-600 font-semibold rounded-xl py-3">Chat Seller</button>
        <button class="border rounded-xl py-3"><i class="fa-regular fa-heart"></i></button>
      </div>
    </div>
    <aside class="lg:col-span-4 border rounded-2xl p-5 h-fit">
      <h3 class="font-bold text-lg">Informasi Seller</h3>
      <div class="flex items-center gap-3 mt-4"><div class="h-12 w-12 rounded-full bg-slate-900"></div><div><div class="font-bold">ProPlayerStore</div><div class="text-xs text-slate-500">Seller Terverifikasi</div></div></div>
      <div class="mt-4 text-sm space-y-2"><div class="flex justify-between"><span class="text-slate-500">Tingkat Respon</span><b>98%</b></div><div class="flex justify-between"><span class="text-slate-500">Transaksi Sukses</span><b>2.857+</b></div><div class="flex justify-between"><span class="text-slate-500">Bergabung Sejak</span><b>Jan 2023</b></div></div>
      <button class="mt-4 w-full border border-blue-600 text-blue-600 rounded-xl py-3 font-semibold">Kunjungi Toko</button>
    </aside>
  </section>

  <section class="px-4 md:px-8 pb-8 grid lg:grid-cols-12 gap-6">
    <div class="lg:col-span-8 border rounded-2xl p-5">
      <div class="font-bold text-lg">Deskripsi</div>
      <p class="text-slate-600 mt-2"><?= html_escape($product['description']); ?></p>
    </div>
    <div class="lg:col-span-4 border rounded-2xl p-5">
      <div class="font-bold text-lg mb-3">Produk Terkait</div>
      <div class="space-y-3">
        <?php foreach($related_products as $item): ?>
          <a href="<?= $item['id'] ? site_url('product/'.$item['id']) : '#'; ?>" class="flex items-center gap-3 border rounded-xl p-2 hover:bg-slate-50">
            <div class="h-14 w-20 rounded-lg bg-slate-200"></div>
            <div class="flex-1"><div class="text-sm font-semibold"><?= html_escape($item['title']); ?></div><div class="text-blue-600 font-bold text-sm">Rp<?= number_format((float)$item['price'],0,',','.'); ?></div></div>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
</div>
