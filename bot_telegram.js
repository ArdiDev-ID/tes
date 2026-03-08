"use strict";

const { Telegraf } = require("telegraf");
const { loadPlugins, validatePlugin } = require("./lib/plugin-loader");
const { serializeTelegramUpdate } = require("./lib/serialize");
const { createButtonManager } = require("./lib/button-format");

function getTokenFromEnv() {
  const token = (process.env.TELEGRAM_BOT_TOKEN || "").trim();

  if (!token) {
    throw new Error(
      "TELEGRAM_BOT_TOKEN belum diset. Set env dulu, contoh: TELEGRAM_BOT_TOKEN=xxx"
    );
  }

  return token;
}

function buildBot(token) {
  const bot = new Telegraf(token);
  const plugins = loadPlugins();
  const buttonManager = createButtonManager();

  bot.use(async (ctx, next) => {
    ctx.button = (...pairs) => buttonManager.button(...pairs);
    ctx.sendMessage = (text, ...pairs) => buttonManager.sendMessage(ctx, text, ...pairs);
    ctx.sendPhoto = (photo, caption, ...pairs) =>
      buttonManager.sendPhoto(ctx, photo, caption, ...pairs);
    ctx.editpesan = (text, ...pairs) =>
      ctx.editMessageText(text, pairs.length ? ctx.button(...pairs) : undefined);

    return next();
  });

  for (const plugin of plugins) {
    validatePlugin(plugin);

    bot.command(plugin.name, async (ctx) => {
      const serialized = serializeTelegramUpdate(ctx, { commandName: plugin.name });

      return plugin.run({
        ctx,
        args: serialized.command.args,
        serialized,
        plugins,
      });
    });
  }

  // pembacaan button global + auto edit jika edit:true
  bot.on("callback_query", async (ctx) => {
    const action = buttonManager.resolveAction(ctx.callbackQuery?.data);

    if (!action) {
      await ctx.answerCbQuery("Button terbaca ✅");
      return;
    }

    if (action.edit) {
      const newText = action.editText || `Dipilih: ${action.callback}`;
      await ctx.editpesan(newText);
      await ctx.answerCbQuery("Pesan berhasil di-edit ✅");
      return;
    }

    await ctx.answerCbQuery("Button terbaca ✅");
    await ctx.reply(`Button dipilih: ${action.callback}`);
  });

  return { bot, plugins };
}

async function main() {
  const token = getTokenFromEnv();
  const { bot, plugins } = buildBot(token);

  await bot.launch();
  // eslint-disable-next-line no-console
  console.log(
    `Bot berjalan dengan ${plugins.length} command: ${plugins
      .map((plugin) => `/${plugin.name}`)
      .join(", ")}`
  );

  process.once("SIGINT", () => bot.stop("SIGINT"));
  process.once("SIGTERM", () => bot.stop("SIGTERM"));
}

main().catch((error) => {
  // eslint-disable-next-line no-console
  console.error("Gagal menjalankan bot:", error.message);
  process.exit(1);
});
