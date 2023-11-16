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
  const regex = /<img\b[^>]*\bsrc\s*=\s*['"]([^'"]*)['"][^>]*>/g
  return html.match(regex)
}

// 正则文章
const regexText = (html) => {
  // Remove br and img tags
  let str = html.replace(/<\s*img[^>]*>|<\s*br[^>]*>/g, '')

  // Remove empty p tags
  return str.replace(/<\s*p[^>]*>\s*<\s*\/p[^>]*>/g, '')
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
            <div class="flex-1 pb-4 border-b-[1px] border-zinc-150">
              <div class="text-[#5b6b92] mb-1">
                {{ item.categories[0].name }}
              </div>

              <!-- 九宫格文章图片 -->
              <template v-if="item.fields.articleStyle.value === 'imgGrid'">
                <div class="relative">
                  <!-- 文章收缩 -->
                  <template v-if="item.fields.hiddenLine.value === '1'">
                    <TextOverflow class="content" ref="contRef">
                      <div v-html="item.digest" class="prose lg:prose-sm"></div>
                    </TextOverflow>
                  </template>

                  <template v-else>
                    <div
                      v-html="regexText(item.digest)"
                      class="prose lg:prose-sm"
                    ></div>
                  </template>

                  <div class="pic my-4 flex">
                    <div v-for="img in regexImg(item.digest)" :key="img">
                      <div v-html="img"></div>
                    </div>
                  </div>
                </div>
              </template>

              <template v-else>
                <div class="relative">
                  <!-- 文章收缩 -->
                  <template v-if="item.fields.hiddenLine.value === '1'">
                    <TextOverflow class="content" ref="contRef">
                      <div v-html="item.digest" class="prose lg:prose-sm"></div>
                    </TextOverflow>
                  </template>

                  <template v-else>
                    <div v-html="item.digest" class="prose lg:prose-sm"></div>
                  </template>
                </div>
              </template>
            </div>
          </div>
        </li>
      </van-list>
    </ul>
  </div>
</template>

<style lang="less" scoped></style>
