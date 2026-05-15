<div class="bg-white border rounded-2xl p-6">
  <h1 class="text-3xl font-extrabold">Pengaturan Website</h1>
  <p class="text-slate-600">Pusat kontrol seluruh sistem AkunMarket.</p>
  <div class="mt-4 flex gap-2 overflow-auto pb-2">
    <?php foreach($tabs as $i => $tab): ?>
      <button class="shrink-0 px-4 py-2 rounded-xl border <?= $i===0 ? 'bg-violet-600 text-white border-violet-600' : 'bg-white'; ?>"><?= html_escape($tab); ?></button>
    <?php endforeach; ?>
  </div>
  <div class="mt-5 grid md:grid-cols-2 gap-3">
    <label class="border rounded-xl p-3">Nama Website <input class="mt-2 w-full border rounded-lg px-3 py-2" value="AkunMarket"></label>
    <label class="border rounded-xl p-3">Email Support <input class="mt-2 w-full border rounded-lg px-3 py-2" value="support@akunmarket.com"></label>
    <label class="border rounded-xl p-3">WhatsApp Support <input class="mt-2 w-full border rounded-lg px-3 py-2" value="0812-xxxx"></label>
    <label class="border rounded-xl p-3">Zona Waktu <input class="mt-2 w-full border rounded-lg px-3 py-2" value="Asia/Jakarta"></label>
  </div>
  <button class="mt-4 px-5 py-3 rounded-xl bg-violet-600 text-white font-semibold">Simpan Pengaturan</button>
</div>
