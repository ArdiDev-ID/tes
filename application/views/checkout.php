<div class="bg-white rounded-2xl shadow-sm border overflow-hidden">
  <div class="px-4 md:px-8 py-4 border-b text-sm text-slate-500">Beranda / <span class="text-blue-600 font-semibold">Checkout</span></div>
  <section class="p-4 md:p-8 grid lg:grid-cols-12 gap-6">
    <div class="lg:col-span-8 space-y-4">
      <h1 class="text-4xl font-extrabold">Checkout</h1>
      <div class="border rounded-2xl p-4">
        <div class="font-bold mb-3">1. Produk Dibeli</div>
        <div class="flex gap-3 items-center"><div class="h-20 w-36 rounded-xl bg-slate-200"></div><div class="flex-1"><div class="font-bold text-xl"><?= html_escape($product['title']); ?></div><div class="text-slate-500">Mythic Glory · 75+ Skin · 110+ Hero</div><div class="text-slate-500">Seller: ProPlayerStore</div></div><div class="text-3xl font-extrabold text-blue-600">Rp<?= number_format((float)$product['price'],0,',','.'); ?></div></div>
      </div>
      <div class="border rounded-2xl p-4">
        <div class="font-bold mb-3">2. Data Pembeli</div>
        <div class="grid md:grid-cols-3 gap-3"><input class="border rounded-xl px-3 py-3" placeholder="contoh@email.com"><input class="border rounded-xl px-3 py-3" placeholder="08xxxxxxxxxx"><input class="border rounded-xl px-3 py-3" placeholder="Catatan untuk seller"></div>
      </div>
      <div class="border rounded-2xl p-4">
        <div class="font-bold mb-3">3. Metode Pembayaran</div>
        <div class="grid md:grid-cols-4 gap-3 text-sm">
          <button class="border rounded-xl p-3 text-left">Transfer Bank</button><button class="border-2 border-blue-600 rounded-xl p-3 text-left">E-Wallet</button><button class="border rounded-xl p-3 text-left">QRIS</button><button class="border rounded-xl p-3 text-left">Virtual Account</button>
        </div>
      </div>
    </div>
    <aside class="lg:col-span-4 border rounded-2xl p-5 h-fit space-y-4">
      <h3 class="font-bold text-2xl">Ringkasan Pesanan</h3>
      <div class="space-y-2 text-sm">
        <div class="flex justify-between"><span>Harga Produk</span><b>Rp<?= number_format((float)$product['price'],0,',','.'); ?></b></div>
        <div class="flex justify-between"><span>Biaya Admin</span><b>Rp<?= number_format((float)$summary['admin_fee'],0,',','.'); ?></b></div>
        <div class="flex justify-between"><span>Biaya Layanan</span><b>Rp<?= number_format((float)$summary['service_fee'],0,',','.'); ?></b></div>
        <div class="flex justify-between"><span>Diskon Promo</span><b class="text-green-600">-Rp<?= number_format((float)$summary['promo_discount'],0,',','.'); ?></b></div>
      </div>
      <div class="border-t pt-3 flex justify-between items-center"><span class="font-bold text-xl">Total</span><span class="font-extrabold text-4xl text-blue-600">Rp<?= number_format((float)$summary['total'],0,',','.'); ?></span></div>
      <a href="<?= site_url('order/status/success/' . $product['id']); ?>" class="w-full block text-center bg-blue-600 text-white font-semibold rounded-xl py-3" data-confirm="Konfirmasi lanjut ke pembayaran?">Bayar Sekarang</a>
      <button class="w-full border border-blue-600 text-blue-600 font-semibold rounded-xl py-3">Chat Seller</button>
      <a href="<?= site_url('product/' . $product['id']); ?>" class="block text-center text-blue-600 font-semibold">Kembali ke Produk</a>
    </aside>
  </section>
</div>
