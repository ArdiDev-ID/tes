"use strict";

function serializeTelegramUpdate(ctx, options = {}) {
  const safeDate = (value) => {
    if (!value) return null;
    const date = value instanceof Date ? value : new Date(value);
    return Number.isNaN(date.getTime()) ? null : date.toISOString();
  };

  const pickDefined = (object) =>
    Object.fromEntries(
      Object.entries(object).filter(([, value]) => value !== undefined)
    );

  const toArray = (value) => (Array.isArray(value) ? value : []);

  const serializeUser = (user) => {
    if (!user) return null;
    return pickDefined({
      id: user.id,
      isBot: user.is_bot,
      firstName: user.first_name,
      lastName: user.last_name,
      username: user.username,
      languageCode: user.language_code,
    });
  };

  const serializeChat = (chat) => {
    if (!chat) return null;
    return pickDefined({
      id: chat.id,
      type: chat.type,
      title: chat.title,
      username: chat.username,
      firstName: chat.first_name,
      lastName: chat.last_name,
      bio: chat.bio,
      description: chat.description,
      inviteLink: chat.invite_link,
      hasProtectedContent: chat.has_protected_content,
    });
  };

  const serializeEntities = (entities = []) =>
    toArray(entities).map((entity) =>
      pickDefined({
        type: entity.type,
        offset: entity.offset,
        length: entity.length,
        url: entity.url,
        language: entity.language,
        customEmojiId: entity.custom_emoji_id,
        user: serializeUser(entity.user),
      })
    );

  const serializeFileMeta = (file) => {
    if (!file) return null;
    return pickDefined({
      fileId: file.file_id,
      fileUniqueId: file.file_unique_id,
      fileSize: file.file_size,
      width: file.width,
      height: file.height,
      duration: file.duration,
      fileName: file.file_name,
      mimeType: file.mime_type,
      thumbnail: serializeFileMeta(file.thumbnail),
    });
  };

  const serializeInlineButton = (button) => {
    if (!button) return null;
    return pickDefined({
      text: button.text,
      callbackData: button.callback_data,
      url: button.url,
      webApp: button.web_app,
      loginUrl: button.login_url,
      switchInlineQuery: button.switch_inline_query,
      switchInlineQueryCurrentChat: button.switch_inline_query_current_chat,
      switchInlineQueryChosenChat: button.switch_inline_query_chosen_chat,
      callbackGame: button.callback_game,
      pay: button.pay,
    });
  };

  const serializeKeyboardButton = (button) => {
    if (!button) return null;
    if (typeof button === "string") return { text: button };
    return pickDefined({
      text: button.text,
      requestContact: button.request_contact,
      requestLocation: button.request_location,
      requestPoll: button.request_poll,
      webApp: button.web_app,
      requestUsers: button.request_users,
      requestChat: button.request_chat,
    });
  };

  const serializeReplyMarkup = (replyMarkup) => {
    if (!replyMarkup) return null;
    const inlineKeyboard = toArray(replyMarkup.inline_keyboard).map((row) =>
      toArray(row).map(serializeInlineButton)
    );
    const keyboard = toArray(replyMarkup.keyboard).map((row) =>
      toArray(row).map(serializeKeyboardButton)
    );
    const inlineButtonsFlat = inlineKeyboard.flat().filter(Boolean);
    const keyboardButtonsFlat = keyboard.flat().filter(Boolean);

    return {
      hasInlineKeyboard: inlineButtonsFlat.length > 0,
      hasKeyboard: keyboardButtonsFlat.length > 0,
      inlineKeyboard,
      keyboard,
      inlineButtonsFlat,
      keyboardButtonsFlat,
      removeKeyboard: Boolean(replyMarkup.remove_keyboard),
      forceReply: Boolean(replyMarkup.force_reply),
      selective: Boolean(replyMarkup.selective),
      oneTimeKeyboard: Boolean(replyMarkup.one_time_keyboard),
      resizeKeyboard: Boolean(replyMarkup.resize_keyboard),
      inputFieldPlaceholder: replyMarkup.input_field_placeholder || null,
    };
  };

  const parseCommand = (messageText, forcedCommandName) => {
    const text = (messageText || "").trim();
    if (!text.startsWith("/")) {
      return {
        raw: text,
        name: forcedCommandName || null,
        args: [],
        argsText: "",
        hasBotMention: false,
        botMention: null,
      };
    }

    const [head = "", ...tail] = text.split(/\s+/);
    const [nameFromMessage, botMention = null] = head.slice(1).split("@");

    return {
      raw: text,
      name: forcedCommandName || nameFromMessage || null,
      args: tail,
      argsText: tail.join(" "),
      hasBotMention: Boolean(botMention),
      botMention,
    };
  };

  const serializeMessage = (message) => {
    if (!message) return null;

    return pickDefined({
      messageId: message.message_id,
      messageThreadId: message.message_thread_id,
      date: safeDate(message.date),
      editDate: safeDate(message.edit_date),
      text: message.text || message.caption || "",
      caption: message.caption,
      hasText: Boolean(message.text),
      hasCaption: Boolean(message.caption),
      entities: serializeEntities(message.entities),
      captionEntities: serializeEntities(message.caption_entities),
      from: serializeUser(message.from),
      senderChat: serializeChat(message.sender_chat),
      authorSignature: message.author_signature,
      isAutomaticForward: message.is_automatic_forward,
      hasProtectedContent: message.has_protected_content,
      mediaGroupId: message.media_group_id,
      connectedWebsite: message.connected_website,
      replyToMessageId: message.reply_to_message?.message_id,
      forwardFrom: serializeUser(message.forward_from),
      forwardFromChat: serializeChat(message.forward_from_chat),
      forwardDate: safeDate(message.forward_date),
      viaBot: serializeUser(message.via_bot),
      replyMarkup: serializeReplyMarkup(message.reply_markup),
      photo: toArray(message.photo).map(serializeFileMeta),
      video: serializeFileMeta(message.video),
      videoNote: serializeFileMeta(message.video_note),
      animation: serializeFileMeta(message.animation),
      audio: serializeFileMeta(message.audio),
      voice: serializeFileMeta(message.voice),
      document: serializeFileMeta(message.document),
      sticker: serializeFileMeta(message.sticker),
      location: message.location
        ? pickDefined({
            latitude: message.location.latitude,
            longitude: message.location.longitude,
            horizontalAccuracy: message.location.horizontal_accuracy,
            livePeriod: message.location.live_period,
          })
        : null,
      contact: message.contact
        ? pickDefined({
            phoneNumber: message.contact.phone_number,
            firstName: message.contact.first_name,
            lastName: message.contact.last_name,
            userId: message.contact.user_id,
            vcard: message.contact.vcard,
          })
        : null,
      poll: message.poll
        ? pickDefined({
            id: message.poll.id,
            question: message.poll.question,
            type: message.poll.type,
            allowsMultipleAnswers: message.poll.allows_multiple_answers,
            isClosed: message.poll.is_closed,
          })
        : null,
    });
  };

  const serializeCallbackQuery = (callbackQuery) => {
    if (!callbackQuery) return null;
    return pickDefined({
      id: callbackQuery.id,
      chatInstance: callbackQuery.chat_instance,
      from: serializeUser(callbackQuery.from),
      data: callbackQuery.data,
      gameShortName: callbackQuery.game_short_name,
      inlineMessageId: callbackQuery.inline_message_id,
      message: serializeMessage(callbackQuery.message),
    });
  };

  const update = ctx.update || {};
  const message =
    ctx.message || ctx.editedMessage || ctx.channelPost || ctx.editedChannelPost || null;

  const serializedMessage = serializeMessage(message);
  const serializedCallbackQuery = serializeCallbackQuery(ctx.callbackQuery);

  const inlineButtons =
    serializedCallbackQuery?.message?.replyMarkup?.inlineButtonsFlat ||
    serializedMessage?.replyMarkup?.inlineButtonsFlat ||
    [];

  const matchedInline = inlineButtons.find(
    (button) => button.callbackData === serializedCallbackQuery?.data
  );

  return {
    meta: {
      updateId: update.update_id ?? null,
      updateType: ctx.updateType ?? null,
      receivedAt: new Date().toISOString(),
      isEdited: Boolean(ctx.editedMessage || ctx.editedChannelPost),
    },
    chat: serializeChat(ctx.chat),
    from: serializeUser(ctx.from),
    message: serializedMessage,
    callbackQuery: serializedCallbackQuery,
    command: parseCommand(message?.text || "", options.commandName),
    buttons: {
      replyMarkup: serializedMessage?.replyMarkup || null,
      pressed: serializedCallbackQuery?.data
        ? {
            source: "callback_query",
            callbackData: serializedCallbackQuery.data,
            matchedInlineButton: matchedInline || null,
            pressedText: matchedInline?.text || null,
            callbackQueryId: ctx.callbackQuery?.id || null,
          }
        : null,
      hasAnyButton: Boolean(
        serializedMessage?.replyMarkup?.hasInlineKeyboard ||
          serializedMessage?.replyMarkup?.hasKeyboard ||
          serializedCallbackQuery?.data
      ),
    },
    rawUpdate: update,
  };
}

module.exports = {
  serializeTelegramUpdate,
};
