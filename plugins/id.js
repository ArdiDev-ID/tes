"use strict";

module.exports = {
  name: "id",
  description: "Lihat user/chat ID + ringkasan serialized context",
  run: ({ ctx, serialized }) => {
    const userId = serialized.from?.id ?? "-";
    const chatId = serialized.chat?.id ?? "-";
    const updateType = serialized.meta.updateType ?? "unknown";
    const argsCount = serialized.command.args.length;
    const hasAnyButton = serialized.buttons.hasAnyButton ? "ya" : "tidak";
    const pressed = serialized.buttons.pressed?.callbackData || "-";

    return ctx.reply(
      `User ID: ${userId}\n` +
        `Chat ID: ${chatId}\n` +
        `Update Type: ${updateType}\n` +
        `Args Count: ${argsCount}\n` +
        `Ada Button: ${hasAnyButton}\n` +
        `Button Ditekan: ${pressed}`
    );
  },
};
