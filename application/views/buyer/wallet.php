<div class="bg-white p-4 rounded shadow">
  <h2 class="font-semibold mb-2">Wallet</h2>
  <p>Saldo: Rp <?= number_format((float)($wallet['balance'] ?? 0),0,',','.'); ?></p>
</div>
