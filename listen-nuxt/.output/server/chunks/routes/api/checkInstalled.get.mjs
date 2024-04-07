import { d as defineEventHandler } from '../../runtime.mjs';
import fs from 'fs';
import { s as successHandle } from '../../_/serverUtils.mjs';
import 'node:http';
import 'node:https';
import 'path';
import 'node:fs';
import 'node:url';
import 'mrmime';
import 'node:fs/promises';
import '@prisma/client';

const dirPath = "./public/installed";
const checkInstalled_get = defineEventHandler(async (event) => {
  let state;
  try {
    const stats = await fs.promises.stat(dirPath);
    if (stats.isDirectory()) {
      state = true;
    } else {
      state = false;
    }
  } catch (err) {
    state = false;
  }
  return successHandle({ isInstall: state });
});

export { checkInstalled_get as default };
//# sourceMappingURL=checkInstalled.get.mjs.map
