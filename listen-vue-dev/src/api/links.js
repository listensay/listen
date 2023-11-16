import service from '@/utils/request'

export const useLinksAPI = () => {
  return {
    getLinks() {
      return service({ url: '/links', method: 'get' })
    }
  }
}
