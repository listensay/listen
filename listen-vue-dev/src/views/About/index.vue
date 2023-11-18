<script setup>
import { useArticleDetailAPI } from '@/api/detail'
import { useMainStore } from '@/store/main'
import { storeToRefs } from 'pinia'
import { ref } from 'vue'
const mainStore = useMainStore()
const { about } = storeToRefs(mainStore)

const articleDetailAPI = useArticleDetailAPI()

const article = ref('')

;(async function () {
  try {
    await articleDetailAPI.getArticleDetail(about.value[0].cid).then((res) => {
      article.value = res.data
    })
  } catch (error) {
    console.log(error)
  }
})()
</script>

<template>
  <div class="about">
    <div class="p-8">
      <h1 class="text-xl font-bold text-navy-700">{{ article.title }}</h1>
      <div class="prose" v-html="article.text"></div>
    </div>
  </div>
</template>

<style lang="less" scoped></style>
