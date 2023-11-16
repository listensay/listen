import service from '@/utils/request'

export const useMainAPI = () => {
  return {
    getPages: () => {
      return service.get('/pages')
    }
  }
}
