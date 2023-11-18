import { defineStore } from 'pinia'
import { useHomeAPI } from '@/api/home'
const homeAPI = useHomeAPI()

export const useHomeStore = defineStore('useHomeStre', {
  state: () => ({
    website: '',
    homeArticleList: [],
    pages: null
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
    async fetchGetArticleList(page = 1) {
      try {
        const result = await homeAPI.getArtilceList(page)
        this.homeArticleList.push(...result.data.dataSet)
        this.pages = result.data.pages
      } catch (error) {
        console.log(error)
      }
    },
    async fetchGetCommentsList(cid) {
      try {
        const result = await homeAPI.getArticleComments(cid)
        return result.data.dataSet
      } catch (error) {
        console.log(error)
      }
    }
  }
})
