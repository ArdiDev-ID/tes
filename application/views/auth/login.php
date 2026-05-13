<div class="min-h-[80vh] bg-gradient-to-br from-slate-50 to-white rounded-2xl border p-4 md:p-8">
  <div class="grid lg:grid-cols-2 gap-6 items-stretch">
    <aside class="rounded-2xl p-6 md:p-8 bg-white border">
      <div class="text-2xl font-extrabold">AkunMart</div>
      <h1 class="mt-6 text-5xl font-extrabold leading-tight">Belanja akun <span class="text-violet-600">favoritmu</span> dengan aman</h1>
      <p class="mt-4 text-slate-600">AkunMart adalah marketplace terpercaya untuk kebutuhan akun digital Anda.</p>
    </aside>

    <section class="rounded-2xl p-6 md:p-8 bg-white border">
      <h2 class="text-4xl font-extrabold">Selamat Datang Kembali! 👋</h2>
      <p class="text-slate-500 mt-2">Masuk untuk melanjutkan ke AkunMart</p>
      <?php if ($this->session->flashdata('auth_success')): ?><div class="mt-3 p-2 rounded bg-green-50 text-green-700 text-sm"><?= html_escape($this->session->flashdata('auth_success')); ?></div><?php endif; ?>
      <?php if (!empty($error)): ?><div class="mt-3 p-2 rounded bg-red-50 text-red-700 text-sm"><?= html_escape($error); ?></div><?php endif; ?>
      <form method="post" class="mt-5 space-y-4">
        <input name="identity" class="w-full border rounded-xl px-4 py-3" placeholder="Masukkan email atau username">
        <input type="password" name="password" class="w-full border rounded-xl px-4 py-3" placeholder="Masukkan password">
        <div class="flex justify-between text-sm"><label><input type="checkbox"> Ingat saya</label><a href="#" class="text-violet-600">Lupa Password?</a></div>
        <button class="w-full rounded-xl py-3 text-white font-semibold bg-gradient-to-r from-violet-600 to-blue-600">Masuk</button>
      </form>
      <div class="my-4 text-center text-slate-400">atau masuk dengan</div>
      <div class="grid grid-cols-2 gap-3"><button class="border rounded-xl py-3">Google</button><button class="border rounded-xl py-3">Facebook</button></div>
      <p class="text-center mt-5 text-sm">Belum punya akun? <a class="text-violet-600 font-semibold" href="<?= site_url('register'); ?>">Daftar sekarang</a></p>
    </section>
  </div>
</div>
