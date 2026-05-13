<div class="bg-white rounded-2xl shadow-sm border overflow-hidden">
  <div class="grid lg:grid-cols-12 gap-4 p-4 md:p-8">
    <section class="lg:col-span-5 border rounded-2xl p-5 md:p-8">
      <h1 class="text-4xl font-extrabold text-center">Masuk ke <span class="text-blue-600">AkunMarket</span></h1>
      <p class="text-slate-600 text-center mt-2">Masuk untuk membeli atau menjual akun dengan aman.</p>
      <?php if (!empty($error)): ?><div class="mt-4 p-3 rounded-lg bg-red-50 text-red-700 text-sm"><?= html_escape($error); ?></div><?php endif; ?>
      <form method="post" class="mt-5 space-y-4">
        <div><label class="text-sm font-semibold">Email / Username</label><input name="identity" class="mt-1 w-full border rounded-xl px-4 py-3" placeholder="Masukkan email atau username Anda" required></div>
        <div><label class="text-sm font-semibold">Password</label><input type="password" name="password" class="mt-1 w-full border rounded-xl px-4 py-3" placeholder="Masukkan password Anda" required></div>
        <div class="flex justify-between text-sm"><label><input type="checkbox" name="remember" value="1"> Ingat saya</label><a class="text-blue-600" href="#">Lupa password?</a></div>
        <button class="w-full bg-blue-600 text-white rounded-xl py-3 font-semibold">Masuk</button>
        <a href="#" class="w-full block text-center border border-blue-600 text-blue-600 rounded-xl py-3 font-semibold">Daftar Akun Baru</a>
      </form>
      <div class="my-4 text-center text-slate-400">atau masuk dengan</div>
      <div class="grid grid-cols-2 gap-2"><button class="border rounded-xl py-3">Google</button><button class="border rounded-xl py-3">Apple</button></div>
    </section>

    <aside class="lg:col-span-7 rounded-2xl bg-gradient-to-b from-slate-50 to-blue-50 p-5 md:p-8 flex flex-col justify-between">
      <div class="h-72 rounded-2xl bg-white/50 border"></div>
      <div class="grid grid-cols-3 gap-2 mt-4">
        <div class="bg-white rounded-xl p-3 text-center"><div class="font-bold">Transaksi Aman</div><div class="text-xs text-slate-500">Dana ditahan hingga transaksi selesai.</div></div>
        <div class="bg-white rounded-xl p-3 text-center"><div class="font-bold">Seller Terverifikasi</div><div class="text-xs text-slate-500">Seller diverifikasi ketat.</div></div>
        <div class="bg-white rounded-xl p-3 text-center"><div class="font-bold">Support 24/7</div><div class="text-xs text-slate-500">Tim support siap membantu.</div></div>
      </div>
    </aside>
  </div>
</div>
