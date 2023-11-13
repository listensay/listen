<script setup>
import { storeToRefs } from 'pinia'
import { useHomeStore } from '@/store/module/home'
import { ref, onMounted } from 'vue'

const homeStore = useHomeStore()
const { homeArticleList, pages } = storeToRefs(homeStore)

const currentPage = ref(0)
const loading = ref(false)
const finished = ref(false)

const onLoad = async () => {
  // 异步更新数据
  if (!finished.value) {
    await homeStore.fetchGetArticleList(++currentPage.value)
  }

  // 加载状态结束
  loading.value = false

  console.log(currentPage.value, pages.value)

  // 数据全部加载完成
  if (currentPage.value === pages.value) {
    finished.value = true
  }
}

// TODO
onMounted(() => {
  console.log(document.querySelector('.contRef'))
})
</script>

<template>
  <div class="home bg-white p-8 py-6 pb-16">
    <ul>
      <van-list
        v-model:loading="loading"
        :finished="finished"
        finished-text="没有更多了"
        offset="0"
        @load="onLoad"
      >
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
            <div class="flex-1 border-b-[1px] border-zinc-150">
              <div class="text-[#5b6b92] mb-1">
                {{ item.categories[0].name }}
              </div>

              <div class="relative">
                <TextOverflow class="content" ref="contRef">
                  <div v-html="item.digest" class="prose lg:prose-sm"></div>
                </TextOverflow>
              </div>
            </div>
          </div>
        </li>
      </van-list>
    </ul>
  </div>
</template>

<style lang="less" scoped>
.content {
  width: 100%;
}
</style>
