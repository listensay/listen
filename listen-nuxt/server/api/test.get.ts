export default defineEventHandler(async (event) => {

    // 查询用户数据
    const result = await usePrisma().user.findMany()

    return successHandle(result)
})