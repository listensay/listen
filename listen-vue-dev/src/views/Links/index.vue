<script setup>
import { useArticleDetailAPI } from '@/api/detail'
import { useMainStore } from '@/store/main'
import { useLinksStore } from '@/store/module/links'
import { storeToRefs } from 'pinia'
import { ref, onMounted } from 'vue'

const mainStore = useMainStore()
const { link } = storeToRefs(mainStore)

const articleDetailAPI = useArticleDetailAPI()
const article = ref('')

const linksStore = useLinksStore()

const { links } = storeToRefs(linksStore)

onMounted(() => {
  ;(async function () {
    await linksStore.fetchGetLinks()
  })()
  ;(async function () {
    try {
      await articleDetailAPI.getArticleDetail(link.value[0].cid).then((res) => {
        article.value = res.data
      })
    } catch (error) {
      console.log(error)
    }
  })()
})
</script>

<template>
  <div class="links p-8">
    <!-- component -->
    <div
      class="relative flex h-full w-full flex-col bg-clip-border shadow-3xl shadow-shadow-500"
    >
      <div class="mb-8 w-full">
        <h1 class="text-xl font-bold text-navy-700">{{ article.title }}</h1>
        <p class="mt-2 text-base text-gray-600 prose" v-html="article.text"></p>
      </div>
      <a
        :href="link.url"
        class="flex w-full items-center justify-between p-3 shadow-3xl shadow-shadow-500"
        v-for="link in links"
        :key="link.lid"
      >
        <div class="flex items-center">
          <div class="">
            <img
              class="h-[83px] w-[83px] rounded-lg"
              :src="link.image"
              :alt="link.name"
            />
          </div>
          <div class="ml-4">
            <p class="text-base font-medium text-navy-700">{{ link.name }}</p>
            <p class="mt-2 text-sm text-gray-600">{{ link.description }}</p>
          </div>
        </div>
      </a>
    </div>
  </div>
</template>

<style lang="less" scoped></style>
