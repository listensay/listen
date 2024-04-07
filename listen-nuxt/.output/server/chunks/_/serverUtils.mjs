import { PrismaClient } from '@prisma/client';

function successHandle(data, message = "success", code = 200) {
  return {
    code,
    data,
    message,
    success: true
  };
}
function usePrisma() {
  const prisma = new PrismaClient();
  return prisma;
}

export { successHandle as s, usePrisma as u };
//# sourceMappingURL=serverUtils.mjs.map
