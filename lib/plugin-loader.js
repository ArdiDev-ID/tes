"use strict";

const fs = require("node:fs");
const path = require("node:path");

const PLUGINS_DIR = path.join(__dirname, "..", "plugins");

function validatePlugin(plugin) {
  if (!plugin || typeof plugin !== "object") {
    throw new TypeError("Plugin harus berupa object");
  }

  if (!plugin.name || typeof plugin.name !== "string") {
    throw new TypeError("Plugin wajib memiliki name (string)");
  }

  if (!/^[a-z0-9_]+$/i.test(plugin.name)) {
    throw new TypeError(
      `Nama plugin '${plugin.name}' tidak valid. Gunakan huruf/angka/underscore.`
    );
  }

  if (!plugin.description || typeof plugin.description !== "string") {
    throw new TypeError("Plugin wajib memiliki description (string)");
  }

  if (typeof plugin.run !== "function") {
    throw new TypeError("Plugin wajib memiliki run (function)");
  }
}

function loadPlugins() {
  const files = fs
    .readdirSync(PLUGINS_DIR)
    .filter((file) => file.endsWith(".js"))
    .filter((file) => !file.startsWith("_"))
    .filter((file) => file !== "index.js")
    .sort((a, b) => a.localeCompare(b));

  const plugins = files.map((file) => {
    const fullPath = path.join(PLUGINS_DIR, file);
    // eslint-disable-next-line global-require, import/no-dynamic-require
    const plugin = require(fullPath);
    validatePlugin(plugin);

    return {
      ...plugin,
      __file: file,
    };
  });

  const names = new Set();
  for (const plugin of plugins) {
    if (names.has(plugin.name)) {
      throw new Error(
        `Duplikat command '/${plugin.name}' terdeteksi (file: ${plugin.__file})`
      );
    }
    names.add(plugin.name);
  }

  return plugins;
}

module.exports = {
  loadPlugins,
  validatePlugin,
};
