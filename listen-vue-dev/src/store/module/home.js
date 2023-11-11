import { defineStore } from 'pinia'
import { useHomeAPI } from '@/api/home'
const homeAPI = useHomeAPI()

export const useHomeStore = defineStore('useHomeStre', {
  state: () => ({
    website: '',
    homeArticleList: ''
  }),
  actions: {
    async fetchGetWebSit() {
      try {
        const result = await homeAPI.getWebSite()
        this.website = result.data[0].value
      } catch (error) {
        console.log(error)
      }
    },
    async fetchGetArticleList() {
      try {
        const result = await homeAPI.getArtilceList()
        this.homeArticleList = result.data.dataSet
      } catch (error) {
        console.log(error)
      }
    }
  }
})
