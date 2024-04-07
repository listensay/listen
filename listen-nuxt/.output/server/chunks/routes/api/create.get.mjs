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

const create_get = defineEventHandler(async (event) => {
  const files = fs.readdirSync(".");
  return successHandle({ files });
});

export { create_get as default };
//# sourceMappingURL=create.get.mjs.map
