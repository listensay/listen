import { d as defineEventHandler } from '../../runtime.mjs';
import { u as usePrisma, s as successHandle } from '../../_/serverUtils.mjs';
import 'node:http';
import 'node:https';
import 'fs';
import 'path';
import 'node:fs';
import 'node:url';
import 'mrmime';
import 'node:fs/promises';
import '@prisma/client';

const test_get = defineEventHandler(async (event) => {
  const result = await usePrisma().user.findMany();
  return successHandle(result);
});

export { test_get as default };
//# sourceMappingURL=test.get.mjs.map
