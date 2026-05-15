<div class="bg-white rounded-2xl shadow-sm border overflow-hidden">
  <div class="px-4 md:px-8 py-4 border-b text-sm text-slate-500">Beranda / <span class="text-blue-600 font-semibold">Profile</span></div>
  <section class="p-4 md:p-8 grid lg:grid-cols-12 gap-6">
    <aside class="lg:col-span-3 border rounded-2xl p-5 text-center">
      <div class="h-28 w-28 rounded-full bg-slate-200 mx-auto"></div>
      <h2 class="text-4xl font-extrabold mt-3"><?= html_escape($profile['name']); ?></h2>
      <p class="text-slate-500"><?= html_escape($profile['username']); ?></p>
      <div class="mt-2 inline-block px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-sm">Pembeli Terverifikasi</div>
      <div class="mt-4 space-y-2 text-sm text-left"><div>Member sejak <?= html_escape($profile['member_since']); ?></div><div>Status Akun <span class="text-green-600 font-semibold">Aman</span></div></div>
      <button class="mt-4 w-full bg-blue-600 text-white rounded-xl py-3">Edit Profile</button>
      <button class="mt-2 w-full border border-blue-600 text-blue-600 rounded-xl py-3">Ubah Password</button>
    </aside>

    <div class="lg:col-span-9 space-y-4">
      <div class="grid md:grid-cols-2 gap-4">
        <div class="border rounded-2xl p-4">
          <div class="font-bold text-2xl mb-3">Informasi Pribadi</div>
          <div class="space-y-2 text-sm">
            <div>Nama Lengkap: <b><?= html_escape($profile['name']); ?></b></div>
            <div>Email: <b><?= html_escape($profile['email']); ?></b></div>
            <div>Nomor WhatsApp: <b><?= html_escape($profile['phone']); ?></b></div>
            <div>Tanggal Lahir: <b><?= html_escape($profile['birth_date']); ?></b></div>
            <div>Jenis Kelamin: <b><?= html_escape($profile['gender']); ?></b></div>
          </div>
        </div>
        <div class="border rounded-2xl p-4">
          <div class="font-bold text-2xl mb-3">Alamat & Pembayaran</div>
          <div class="text-sm"><?= html_escape($profile['address']); ?></div>
          <div class="mt-4 grid grid-cols-3 gap-2 text-sm"><div class="border rounded-xl p-2 text-center">DANA</div><div class="border rounded-xl p-2 text-center">OVO</div><div class="border rounded-xl p-2 text-center">GoPay</div></div>
        </div>
      </div>
      <div class="grid md:grid-cols-4 gap-3">
        <div class="border rounded-xl p-3 text-center"><div class="text-3xl font-bold"><?= $stats['total']; ?></div><div>Total Pembelian</div></div>
        <div class="border rounded-xl p-3 text-center"><div class="text-3xl font-bold text-green-600"><?= $stats['selesai']; ?></div><div>Selesai</div></div>
        <div class="border rounded-xl p-3 text-center"><div class="text-3xl font-bold text-amber-600"><?= $stats['diproses']; ?></div><div>Diproses</div></div>
        <div class="border rounded-xl p-3 text-center"><div class="text-3xl font-bold text-purple-600"><?= $stats['wishlist']; ?></div><div>Wishlist</div></div>
      </div>
      <div class="border rounded-2xl p-4">
        <div class="font-bold text-2xl mb-3">Aktivitas Terbaru</div>
        <ul class="space-y-2 text-sm"><li>Membeli Mobile Legends Account · 24 Mei 2024</li><li>Pembayaran Netflix Premium berhasil · 20 Mei 2024</li><li>Ulasan diberikan untuk Spotify Premium · 10 Mei 2024</li></ul>
      </div>
    </div>
  </section>
</div>
