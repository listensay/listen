<script setup>
import { ref } from 'vue'
import { storeToRefs } from 'pinia'
import { useHomeStore } from '@/store/module/home'
import { regexImg, basicText, regexText } from '@/utils/articleHandle'

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
        <!-- {{ item.title }} -->
        <div class="flex">
          <div class="w-12 mr-4 flex-shrink-0">
            <img
              class="w-12 rounded"
              :src="item?.categories[0].description"
              :alt="item?.categories[0].name"
            />
          </div>
          <div class="flex-1 pb-4 border-b-[1px] border-zinc-150 truncate">
            <div class="text-[#5b6b92] mb-1">
              {{ item?.categories[0].name }}
            </div>

            <!-- 九宫格文章图片 -->
            <template v-if="item.fields.articleStyle?.value === 'imgGrid'">
              <div class="relative">
                <!-- 文章收缩 -->
                <template v-if="item.fields.hiddenLine?.value === '1'">
                  <TextOverflow class="content">
                    <div
                      v-html="regexText(item?.digest)"
                      class="prose-sm"
                    ></div>
                  </TextOverflow>
                </template>

                <template v-else>
                  <div v-html="regexText(item?.digest)" class="prose-sm"></div>
                </template>
              </div>
              <!-- 图片 -->
              <Fancybox
                :options="{
                  Carousel: {
                    infinite: false
                  }
                }"
              >
                <div class="pic my-4 grid grid-cols-3 gap-2">
                  <div
                    v-for="imgUrl in regexImg(item?.digest)"
                    :key="imgUrl"
                    class="relative w-full pt-[100%]"
                  >
                    <a data-fancybox="gallery" :href="imgUrl">
                      <img
                        :src="imgUrl"
                        class="top-0 absolute h-full object-cover"
                      />
                    </a>
                  </div>
                </div>
              </Fancybox>
            </template>

            <template v-else>
              <div class="relative">
                <!-- 文章收缩 -->
                <template v-if="item?.fields?.hiddenLine?.value === '1'">
                  <TextOverflow class="content">
                    <div class="prose-sm">
                      <Fancybox
                        :options="{
                          Carousel: {
                            infinite: false
                          }
                        }"
                      >
                        <div v-html="basicText(item?.digest)"></div>
                      </Fancybox>
                    </div>
                  </TextOverflow>
                </template>

                <template v-else>
                  <div class="prose prose-sm">
                    <Fancybox
                      :options="{
                        Carousel: {
                          infinite: false
                        }
                      }"
                    >
                      <div
                        v-html="basicText(item?.digest)"
                        class="first:p:mt-0"
                      ></div>
                    </Fancybox>
                  </div>
                </template>
              </div>
            </template>
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
