"use strict";

module.exports = {
  name: "buttons",
  description: "Button singkat + demo auto edit pesan (edit:true)",
  run: async ({ ctx }) => {
    await ctx.sendMessage(
      "Menu utama",
      ["Lihat status", "status"],
      ["Edit pesan ini", "edit_menu", { edit: true, text: "✅ Pesan sudah di-edit otomatis" }]
    );

    return ctx.sendPhoto(
      "https://picsum.photos/300/200",
      "Contoh media + button",
      ["Foto OK", "foto_ok"],
      ["Edit caption text", "edit_foto", { edit: true, text: "📸 Aksi dari tombol media" }]
    );
  },
};
