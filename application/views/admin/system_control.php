<div class="bg-white border rounded-2xl p-5 md:p-8 max-w-4xl mx-auto">
  <h1 class="text-3xl font-extrabold">System Control</h1>
  <p class="text-slate-600 mt-1">Kontrol pusat untuk semua fitur penting sistem marketplace.</p>
  <?php if ($this->session->flashdata('auth_success')): ?><div class="mt-3 p-2 rounded bg-green-50 text-green-700 text-sm"><?= html_escape($this->session->flashdata('auth_success')); ?></div><?php endif; ?>
  <form method="post" class="mt-6 space-y-3">
    <?php foreach($controls as $control): ?>
      <label class="flex items-center justify-between border rounded-xl px-4 py-3">
        <span class="font-medium"><?= html_escape($control['label']); ?></span>
        <input type="checkbox" name="controls[<?= html_escape($control['key']); ?>]" value="1" <?= $control['enabled'] ? 'checked' : ''; ?>>
      </label>
    <?php endforeach; ?>
    <button class="mt-3 bg-violet-600 text-white rounded-xl px-5 py-3 font-semibold">Simpan Pengaturan</button>
  </form>
</div>
