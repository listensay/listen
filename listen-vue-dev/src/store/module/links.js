import { useLinksAPI } from '@/api/links'
import { defineStore } from 'pinia'
const linksAPI = useLinksAPI()

export const useLinksStore = defineStore('useLinksStore', {
  state: () => ({
    links: {}
  }),
  actions: {
    async fetchGetLinks() {
      const result = await linksAPI.getLinks()
      this.links = result.data
    }
  }
})
