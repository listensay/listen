import service from '@/utils/request'

export const useArticleDetailAPI = () => {
  return {
    getArticleDetail: async (cid) => {
      return await service({ url: '/post', params: { cid } })
    }
  }
}
