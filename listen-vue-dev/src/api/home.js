import service from '@/utils/request'

export const useHomeAPI = () => {
  return {
    getWebSite() {
      return service({ url: '/themeOption', method: 'get' })
    }
  }
}
