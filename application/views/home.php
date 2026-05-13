<div class="bg-white rounded-2xl shadow-sm border overflow-hidden">
  <header class="px-4 md:px-6 py-4 border-b flex items-center justify-between">
    <div class="flex items-center gap-2 text-2xl md:text-3xl font-extrabold text-blue-700"><i class="fa-solid fa-shield-cat text-xl"></i><span class="text-slate-900">AkunMarket</span></div>
    <nav class="hidden md:flex gap-8 text-sm font-semibold">
      <a class="text-blue-600 border-b-2 border-blue-600 pb-1" href="#">Beranda</a>
      <a href="#">Kategori</a><a href="#">Cara Kerja</a><a href="#">Promo</a><a href="#">Bantuan</a>
    </nav>
    <div class="hidden md:flex gap-2"><button class="px-4 py-2 border rounded-lg text-blue-700 font-semibold">Masuk</button><button class="px-4 py-2 bg-blue-600 text-white rounded-lg font-semibold">Daftar</button></div>
    <button id="mobileMenuButton" class="md:hidden h-10 w-10 border rounded-lg text-slate-700" aria-label="Buka menu"><i class="fa-solid fa-bars"></i></button>
  </header>

  <div id="mobileDrawerOverlay" class="hidden fixed inset-0 bg-slate-900/40 z-40"></div>
  <aside id="mobileDrawer" class="fixed right-0 top-0 h-full w-72 max-w-[85vw] bg-white shadow-xl z-50 translate-x-full transition-transform duration-200">
    <div class="p-4 border-b flex items-center justify-between"><div class="font-bold text-lg">Menu</div><button id="mobileMenuClose" class="h-9 w-9 border rounded-lg" aria-label="Tutup menu"><i class="fa-solid fa-xmark"></i></button></div>
    <nav class="p-4 space-y-2 text-sm font-semibold">
      <a class="block px-3 py-2 rounded-lg bg-blue-50 text-blue-700" href="#">Beranda</a><a class="block px-3 py-2 rounded-lg hover:bg-slate-50" href="#">Kategori</a><a class="block px-3 py-2 rounded-lg hover:bg-slate-50" href="#">Cara Kerja</a><a class="block px-3 py-2 rounded-lg hover:bg-slate-50" href="#">Promo</a><a class="block px-3 py-2 rounded-lg hover:bg-slate-50" href="#">Bantuan</a>
      <div class="pt-3 grid grid-cols-2 gap-2"><button class="px-4 py-2 border rounded-lg text-blue-700 font-semibold">Masuk</button><button class="px-4 py-2 bg-blue-600 text-white rounded-lg font-semibold">Daftar</button></div>
    </nav>
  </aside>

  <section class="px-6 py-8 grid md:grid-cols-2 gap-8 items-center bg-gradient-to-b from-slate-50 to-white">
    <div>
      <h1 class="text-4xl font-extrabold leading-tight">Platform Aman untuk <span class="text-blue-600">Jual Beli Akun</span></h1>
      <p class="text-slate-600 mt-3">Temukan berbagai akun premium dengan harga terbaik atau jual akunmu dengan aman dan terpercaya.</p>
      <div class="mt-5 flex rounded-xl border bg-white overflow-hidden"><input class="flex-1 px-4 py-3 outline-none" placeholder="Cari akun game, sosial media, streaming..."/><button class="px-4"><i class="fa fa-search text-slate-400"></i></button></div>
      <div class="mt-3 flex gap-3"><button class="flex-1 md:flex-none px-8 py-3 bg-blue-600 text-white rounded-lg font-semibold">Cari Akun</button><button class="flex-1 md:flex-none px-8 py-3 border border-blue-600 text-blue-600 rounded-lg font-semibold">Jual Akun</button></div>
    </div>
    <div class="rounded-2xl bg-blue-50 h-72 flex items-center justify-center text-blue-600 text-8xl"><i class="fa-solid fa-shield-halved"></i></div>
  </section>

  <section class="px-6 pb-8">
    <div class="grid md:grid-cols-4 gap-3 text-sm">
      <div class="border rounded-xl p-3"><b>Transaksi Aman</b><p class="text-slate-500">Dana ditahan hingga transaksi selesai</p></div>
      <div class="border rounded-xl p-3"><b>Verifikasi Seller</b><p class="text-slate-500">Seller terpercaya & tervalidasi</p></div>
      <div class="border rounded-xl p-3"><b>Escrow</b><p class="text-slate-500">Sistem melindungi pembeli</p></div>
      <div class="border rounded-xl p-3"><b>Support 24/7</b><p class="text-slate-500">Tim siap membantu Anda</p></div>
    </div>

    <h2 class="mt-8 text-2xl font-bold">Kategori Populer</h2>
    <div class="grid grid-cols-2 md:grid-cols-6 gap-3 mt-3">
      <?php if (!empty($categories)): ?>
        <?php foreach ($categories as $category): ?>
          <?php $this->load->view('components/category_card', ['category' => $category]); ?>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="col-span-full text-sm text-slate-500">Belum ada kategori aktif.</div>
      <?php endif; ?>
    </div>

    <h2 class="mt-8 text-2xl font-bold">Akun Populer</h2>
    <div class="grid md:grid-cols-5 gap-3 mt-3">
      <?php if (!empty($products)): ?>
        <?php foreach ($products as $product): ?>
          <?php $this->load->view('components/product_card', ['product' => $product]); ?>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="col-span-full text-sm text-slate-500">Belum ada produk aktif.</div>
      <?php endif; ?>
    </div>

    <section class="mt-8 rounded-xl bg-blue-600 text-white p-6 flex flex-col md:flex-row items-center justify-between gap-3">
      <div>
        <h3 class="text-2xl font-bold">Siap Jual atau Beli Akun dengan Aman?</h3>
        <p class="text-blue-100">Bergabung sekarang dan rasakan pengalaman transaksi terbaik.</p>
      </div>
      <div class="flex gap-2"><button class="px-6 py-3 rounded-lg bg-white text-blue-700 font-semibold">Cari Akun</button><button class="px-6 py-3 rounded-lg border border-white font-semibold">Jual Akun</button></div>
    </section>
  </section>

  <footer class="px-6 py-8 border-t bg-slate-50 text-sm text-slate-600">© 2026 AkunMarket. Semua hak dilindungi.</footer>
</div>
