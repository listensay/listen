<script setup>
import { ref } from 'vue'
import { storeToRefs } from 'pinia'
import { useHomeStore } from '@/store/module/home'

const homeStore = useHomeStore()
const { homeArticleList, pages } = storeToRefs(homeStore)

// 文章列表
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

  // 数据全部加载完成
  if (currentPage.value === pages.value) {
    finished.value = true
  }
}
</script>

<template>
  <div class="home bg-white p-8 py-6 pb-16">
    <van-list
      v-model:loading="loading"
      :finished="finished"
      finished-text="没有更多了"
      offset="0"
      @load="onLoad"
    >
      <div v-for="item in homeArticleList" :key="item?.cid" class="mb-8">
        <div class="flex">
          <!-- 作者头像 -->
          <div class="w-12 mr-4 flex-shrink-0">
            <img
              class="w-12 h-12 rounded"
              :src="item?.categories[0].description"
              :alt="item?.categories[0].name"
            />
          </div>

          <div class="flex-1 pb-4 border-b-[1px] border-zinc-150 truncate">
            <!-- 分类名称 -->
            <div class="text-[#5b6b92] mb-1">
              {{ item?.categories[0].name }}
            </div>

            <!-- 九宫格文章图片 -->
            <template v-if="item.fields.articleStyle?.value === 'imgGrid'">
              <ArticleStyleImage :item="item"></ArticleStyleImage>
            </template>

            <!-- 普通文章风格 -->
            <template v-else>
              <ArticleStyleBase :item="item"></ArticleStyleBase>
            </template>

            <!-- 评论点赞 -->
            <ArticleFooter
              :cid="item?.cid"
              :date="item?.date"
              :article="item"
            />
          </div>
        </div>
      </div>
    </van-list>
  </div>
</template>

<style lang="less" scoped></style>
