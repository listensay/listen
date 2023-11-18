import service from '@/utils/request'

export const useHomeAPI = () => {
  return {
    // 获取主题设置
    getWebSite() {
      return service({ url: '/website', method: 'get' })
    },
    // 获取文章列表
    getArtilceList(page) {
      return service({ url: '/posts', method: 'get', params: { page } })
    },
    // 获取文章评论列表
    getArticleComments(cid) {
      return service({ url: '/comments', method: 'get', params: { cid } })
    }
  }
}
