"use strict";

module.exports = {
  name: "start",
  description: "Sapaan awal dan contoh command",
  run: async ({ ctx }) => {
    const name = ctx.from?.first_name || "teman";

    await ctx.reply(
      `Halo ${name}! 👋\n\n` +
        "Saya bot Telegram modular yang mudah kamu kembangkan.\n" +
        "Coba command ini:\n" +
        "• /help\n" +
        "• /ping\n" +
        "• /echo halo dunia\n" +
        "• /id"
    );
  },
};
