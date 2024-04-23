<script setup>
import { defineProps } from 'vue'
import { regexImg, regexText } from '@/utils/articleHandle'

defineProps({
  item: {
    type: Object,
    default: () => {}
  }
})
</script>

<template>
  <div class="article-style">
    <div class="relative">
      <!-- 文章收缩 -->
      <template v-if="item.fields.hiddenLine?.value === '1'">
        <TextOverflow class="content">
          <div v-html="regexText(item?.digest)" class="prose-sm"></div>
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
            <img :src="imgUrl" class="top-0 absolute h-full object-cover" />
          </a>
        </div>
      </div>
    </Fancybox>
  </div>
</template>

<style lang="less" scoped></style>
