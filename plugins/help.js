"use strict";

module.exports = {
  name: "help",
  description: "Menampilkan daftar semua command otomatis",
  run: async ({ ctx, plugins }) => {
    const list = plugins
      .map((plugin) => `/${plugin.name} - ${plugin.description}`)
      .join("\n");

    await ctx.reply(
      "Daftar command (auto dari folder plugins):\n" +
        `${list}\n\n` +
        "Tips: tambah file plugin baru di folder plugins/, command langsung terdaftar."
    );
  },
};
