import { defineStore } from 'pinia'
import { useHomeAPI } from '@/api/home'
const homeAPI = useHomeAPI()

export const useHomeStore = defineStore('useHomeStre', {
  state: () => ({
    website: ''
  }),
  actions: {
    async fetchGetWebSit() {
      try {
        const result = await homeAPI.getWebSite()
        this.website = result.data[0].value
      } catch (error) {
        console.log(error)
      }
    }
  }
})
