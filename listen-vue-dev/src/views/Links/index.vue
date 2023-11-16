<script setup>
import { useArticleDetailAPI } from '@/api/detail'
import { useMainStore } from '@/store/main'
import { useLinksStore } from '@/store/module/links'
import { storeToRefs } from 'pinia'

const mainStore = useMainStore()
const { link } = storeToRefs(mainStore)
console.log(link.value[0].cid)

const articleDetailAPI = useArticleDetailAPI()

try {
  articleDetailAPI.getArticleDetail(link.value[0].cid).then((res) => {
    console.log(res)
  })
} catch (error) {
  console.log(error)
}

const linksStore = useLinksStore()
linksStore.fetchGetLinks()
const { links } = storeToRefs(linksStore)
</script>

<template>
  <div class="links p-8">
    <!-- component -->
    <div
      class="relative flex h-full w-full flex-col bg-clip-border shadow-3xl shadow-shadow-500"
    >
      <div class="mb-8 w-full">
        <h4 class="text-xl font-bold text-navy-700">邻居们</h4>
        <p class="mt-2 text-base text-gray-600">这是我的友情链接呀</p>
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
