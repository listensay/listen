import { useMainAPI } from '@/api/main'
import { defineStore } from 'pinia'
const mainStore = useMainAPI()
export const useMainStore = defineStore('useMainStore', {
  state: () => ({
    pages: [],
    about: '',
    link: '',
    archives: ''
  }),
  actions: {
    async fetchGetPages() {
      const result = await mainStore.getPages()
      this.pages = result.data.dataSet

      this.about = this.pages.filter((item) => item.slug === 'about')
      this.link = this.pages.filter((item) => item.slug === 'links')
      this.archives = this.pages.filter((item) => item.slug === 'archives')
    }
  }
})
