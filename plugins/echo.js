"use strict";

module.exports = {
  name: "echo",
  description: "Ulangi teks kamu. Format: /echo <teks>",
  run: ({ ctx, serialized }) => {
    const text = serialized.command.argsText.trim();

    if (!text) {
      return ctx.reply("Format: /echo <teks>");
    }

    return ctx.reply(text);
  },
};
