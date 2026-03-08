# Telegram Bot Sederhana (Node.js + Auto Plugin)

## Yang sudah dibikin
- Command auto-register dari folder `plugins/`.
- Serializer memakai **1 function utama**: `serializeTelegramUpdate(ctx, options)`.
- Button pakai format singkat, bisa untuk message dan media.
- Ada fitur global auto-edit pesan saat tombol diklik (`edit: true`).

## Format button singkat
Format pasangan:
- elemen pertama = teks button
- elemen kedua = callback
- elemen ketiga (opsional) = opsi, contoh `{ edit: true, text: "..." }`

### Kirim pesan biasa
```js
await ctx.sendMessage(
  "tes",
  ["ping", "ping"],
  ["mantap", "mantap"]
);
```

### Kirim media
```js
await ctx.sendPhoto(
  "https://picsum.photos/300/200",
  "caption",
  ["ping", "ping"],
  ["mantap", "mantap"]
);
```

### Auto edit pesan global
Kalau tombol punya opsi `edit: true`, bot otomatis edit pesan saat tombol itu diklik.

```js
["Edit pesan", "edit_1", { edit: true, text: "✅ Sudah di-edit" }]
```

## Struktur penting
- `bot_telegram.js` → load plugin otomatis + callback query global + helper global (`ctx.button`, `ctx.sendMessage`, `ctx.sendPhoto`, `ctx.editpesan`)
- `lib/serialize.js` → 1 function serializer utama
- `lib/button-format.js` → parser format singkat button + resolver action callback
- `plugins/*.js` → command/plugin

## Jalankan
```bash
npm install
export TELEGRAM_BOT_TOKEN="TOKEN_DARI_BOTFATHER"
npm start
```
