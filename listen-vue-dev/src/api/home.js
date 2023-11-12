import service from '@/utils/request'

export const useHomeAPI = () => {
  return {
    getWebSite() {
      return service({ url: '/themeOption', method: 'get' })
    },
    getArtilceList(page) {
      return service({ url: '/posts', method: 'get', params: { page } })
    }
  }
}
