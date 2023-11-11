<script setup>
import { storeToRefs } from 'pinia'
import { useHomeStore } from '@/store/module/home'
const homeStore = useHomeStore()
homeStore.fetchGetArticleList()
const { homeArticleList } = storeToRefs(homeStore)
</script>

<template>
  <div class="home bg-white p-8 py-6">
    <ul>
      <li v-for="item in homeArticleList" :key="item.cid" class="mb-8">
        <!-- {{ item.title }} -->
        <div class="flex">
          <div class="w-12 mr-4">
            <img
              class="w-12 rounded"
              :src="item.categories[0].description"
              :alt="item.categories[0].name"
            />
          </div>
          <div class="flex-1 border-b-[1px] pb-8 border-zinc-150">
            <div class="text-[#5b6b92] mb-1">{{ item.categories[0].name }}</div>
            <div v-html="item.digest" class="prose lg:prose-sm"></div>
          </div>
        </div>
      </li>
    </ul>
  </div>
</template>

<style lang="less" scoped></style>
