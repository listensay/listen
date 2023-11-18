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

  // 数据全部加载完成
  if (currentPage.value === pages.value) {
    finished.value = true
  }
}

// 正则图片
const regexImg = (html) => {
  let urls = []
  let matches = html.matchAll(/<img[^>]+src="([^">]+)"/g)

  for (let match of matches) {
    urls.push(match[1])
  }

  return urls
}

// 正则文章
const regexText = (html) => {
  // Remove img tags
  let str = html.replace(/<img[^>]*>/g, '')

  // Remove br tags
  str = str.replace(/<br\s*\/?>/g, '')

  // Remove empty p tags
  return str.replace(/<p>\s*<\/p>/g, '')
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
      <div v-for="item in homeArticleList" :key="item.cid" class="mb-8">
        <!-- {{ item.title }} -->
        <div class="flex">
          <div class="w-12 mr-4 flex-shrink-0">
            <img
              class="w-12 rounded"
              :src="item.categories[0].description"
              :alt="item.categories[0].name"
            />
          </div>
          <div class="flex-1 pb-4 border-b-[1px] border-zinc-150 truncate">
            <div class="text-[#5b6b92] mb-1">
              {{ item.categories[0].name }}
            </div>

            <!-- 九宫格文章图片 -->
            <template v-if="item.fields.articleStyle.value === 'imgGrid'">
              <div class="relative">
                <!-- 文章收缩 -->
                <template v-if="item.fields.hiddenLine.value === '1'">
                  <TextOverflow class="content">
                    <div
                      v-html="regexText(item.digest)"
                      class="prose lg:prose-sm"
                    ></div>
                  </TextOverflow>
                </template>

                <template v-else>
                  <div
                    v-html="regexText(item.digest)"
                    class="prose lg:prose-sm"
                  ></div>
                </template>
              </div>
              <!-- 图片 -->
              <div class="pic my-4 grid grid-cols-3 gap-2">
                <div
                  v-for="imgUrl in regexImg(item.digest)"
                  :key="imgUrl"
                  class="relative w-full pt-[100%]"
                >
                  <img
                    :src="imgUrl"
                    class="top-0 absolute h-full object-cover"
                  />
                </div>
              </div>
            </template>

            <template v-else>
              <div class="relative">
                <!-- 文章收缩 -->
                <template v-if="item.fields.hiddenLine.value === '1'">
                  <TextOverflow class="content" ref="contRef">
                    <div class="prose lg:prose-sm">
                      <div v-html="item.digest"></div>
                    </div>
                  </TextOverflow>
                </template>

                <template v-else>
                  <div class="prose xs:prose-xs">
                    <div v-html="item.digest" class="first:p:mt-0"></div>
                  </div>
                </template>
              </div>
            </template>
          </div>
        </div>
      </div>
    </van-list>
  </div>
</template>

<style lang="less" scoped>
.pic {
  img {
    @apply absolute top-0;
  }
}
</style>
