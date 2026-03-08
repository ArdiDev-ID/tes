"use strict";

function createButtonManager() {
  const actionStore = new Map();
  let sequence = 0;

  function normalizeButtonPair(pair) {
    if (!Array.isArray(pair) || pair.length < 2) {
      throw new TypeError(
        "Format button harus [label, callback] atau [label, callback, { edit: true }]"
      );
    }

    const [label, callbackValue, options = {}] = pair;
    const id = String(++sequence);

    actionStore.set(id, {
      callback: String(callbackValue),
      edit: Boolean(options.edit),
      editText:
        typeof options.text === "string" && options.text.trim()
          ? options.text.trim()
          : null,
    });

    return {
      text: String(label),
      callback_data: `btn:${id}`,
    };
  }

  function button(...pairs) {
    const inline_keyboard = pairs.map((pair) => [normalizeButtonPair(pair)]);

    return {
      reply_markup: {
        inline_keyboard,
      },
    };
  }

  async function sendMessage(ctx, text, ...pairs) {
    return ctx.reply(text, button(...pairs));
  }

  async function sendPhoto(ctx, photo, caption, ...pairs) {
    return ctx.replyWithPhoto(photo, {
      caption,
      ...button(...pairs),
    });
  }

  function resolveAction(rawData) {
    if (!rawData || !rawData.startsWith("btn:")) {
      return null;
    }

    const id = rawData.slice(4);
    const action = actionStore.get(id);
    if (!action) return null;

    return action;
  }

  return {
    button,
    sendMessage,
    sendPhoto,
    resolveAction,
  };
}

module.exports = {
  createButtonManager,
};
