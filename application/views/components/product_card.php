<div class="border rounded-xl overflow-hidden bg-white hover:shadow-sm transition">
  <div class="h-24 bg-slate-900"></div>
  <div class="p-3">
    <div class="font-semibold text-sm"><?= html_escape($product['title']); ?></div>
    <div class="text-xs text-slate-500 mt-1"><?= html_escape(isset($product['category_name']) ? $product['category_name'] : '-'); ?></div>
    <div class="text-blue-600 font-bold mt-2">Rp<?= number_format((float) $product['price'], 0, ',', '.'); ?></div>
    <a href="<?= !empty($product['id']) ? site_url('product/' . $product['id']) : '#'; ?>" class="mt-2 w-full block text-center border border-blue-600 text-blue-600 rounded-lg py-2 text-sm font-semibold">Lihat Detail</a>
  </div>
</div>
