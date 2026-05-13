<div class="bg-white rounded-2xl shadow-sm border overflow-hidden">
  <div class="px-4 md:px-8 py-4 border-b text-sm text-slate-500">Beranda / Checkout / <span class="text-blue-600 font-semibold"><?= $mode === 'success' ? 'Pembayaran Selesai' : 'Pesanan Diproses'; ?></span></div>
  <section class="p-4 md:p-8 grid lg:grid-cols-12 gap-6">
    <div class="lg:col-span-8 border rounded-2xl p-5">
      <h1 class="text-4xl font-extrabold mb-2"><?= $mode === 'success' ? 'Pembayaran Selesai' : 'Pesanan Diproses'; ?></h1>
      <p class="text-slate-600 mb-4"><?= $mode === 'success' ? 'Pembayaran diterima dan diamankan escrow.' : 'Seller sedang menyiapkan data akun untuk dikirim.'; ?></p>

      <div class="border rounded-xl p-4">
        <div class="font-bold">Ringkasan Pesanan</div>
        <div class="flex gap-3 items-center mt-3"><div class="h-20 w-36 rounded-xl bg-slate-200"></div><div class="flex-1"><div class="font-bold text-xl"><?= html_escape($product['title']); ?></div><div class="text-slate-500">Seller: ProPlayerStore</div><div class="text-slate-500">No. Pesanan: <?= html_escape($order['order_no']); ?></div></div><div class="text-3xl font-extrabold text-blue-600">Rp<?= number_format((float)$product['price'],0,',','.'); ?></div></div>
      </div>

      <div class="mt-4 border rounded-xl p-4 bg-slate-50">
        <div class="font-semibold mb-2">Konfirmasi Keamanan Data</div>
        <p class="text-sm text-slate-600 mb-3">Apakah data akun yang kamu terima aman dan sesuai deskripsi?</p>
        <form method="post" action="<?= site_url('order/confirm-safety/' . $product['id']); ?>" class="flex flex-wrap gap-2">
          <button name="is_safe" value="1" class="px-4 py-2 bg-green-600 text-white rounded-lg" data-confirm="Pastikan data akun aman sebelum dana diteruskan ke seller.">Aman, teruskan dana ke seller</button>
          <button name="is_safe" value="0" class="px-4 py-2 border rounded-lg" data-confirm="Dana akan tetap ditahan di escrow sampai kamu konfirmasi aman.">Tidak aman, tahan dana di escrow</button>
        </form>
      </div>
    </div>

    <aside class="lg:col-span-4 border rounded-2xl p-5 space-y-3 h-fit">
      <h3 class="font-bold text-2xl">Detail Pembayaran</h3>
      <div class="flex justify-between"><span>Harga Produk</span><b>Rp<?= number_format((float)$product['price'],0,',','.'); ?></b></div>
      <div class="flex justify-between"><span>Status Pembayaran</span><b class="text-green-600"><?= html_escape($order['payment_status']); ?></b></div>
      <div class="flex justify-between"><span>Escrow</span><b class="<?= $order['is_safe'] ? 'text-green-600' : 'text-orange-600'; ?>"><?= html_escape($order['escrow_status']); ?></b></div>
      <a href="<?= site_url('order/status/process/' . $product['id']); ?>" class="block text-center border rounded-xl py-2">Lihat Status Proses</a>
      <a href="<?= site_url('order/status/success/' . $product['id']); ?>" class="block text-center border rounded-xl py-2">Lihat Status Selesai</a>
    </aside>
  </section>
</div>
