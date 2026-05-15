<div class="min-h-[80vh] bg-gradient-to-br from-slate-50 to-white rounded-2xl border p-4 md:p-8">
  <div class="grid lg:grid-cols-2 gap-6 items-stretch">
    <aside class="rounded-2xl p-6 md:p-8 bg-white border">
      <div class="text-2xl font-extrabold">AkunMart</div>
      <h1 class="mt-6 text-5xl font-extrabold leading-tight">Buat akun baru dan mulai jual beli dengan aman</h1>
      <p class="mt-4 text-slate-600">Daftar gratis untuk mengakses fitur buyer dan seller di AkunMart.</p>
    </aside>

    <section class="rounded-2xl p-6 md:p-8 bg-white border">
      <h2 class="text-4xl font-extrabold">Daftar Akun Baru</h2>
      <?php if (!empty($error)): ?><div class="mt-3 p-2 rounded bg-red-50 text-red-700 text-sm"><?= html_escape($error); ?></div><?php endif; ?>
      <form method="post" class="mt-5 space-y-4">
        <input name="name" class="w-full border rounded-xl px-4 py-3" placeholder="Nama lengkap" required>
        <input name="email" type="email" class="w-full border rounded-xl px-4 py-3" placeholder="Email" required>
        <input name="phone" class="w-full border rounded-xl px-4 py-3" placeholder="Nomor WhatsApp">
        <input type="password" name="password" class="w-full border rounded-xl px-4 py-3" placeholder="Password" required>
        <button class="w-full rounded-xl py-3 text-white font-semibold bg-gradient-to-r from-violet-600 to-blue-600">Daftar</button>
      </form>
      <p class="text-center mt-5 text-sm">Sudah punya akun? <a class="text-violet-600 font-semibold" href="<?= site_url('login'); ?>">Masuk sekarang</a></p>
    </section>
  </div>
</div>
