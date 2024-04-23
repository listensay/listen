<script setup>
import { defineProps } from 'vue'
import { basicText } from '@/utils/articleHandle'

defineProps({
  item: {
    type: Object,
    default: () => {}
  }
})
</script>

<template>
  <div class="article-style-base">
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
            <div v-html="basicText(item?.digest)" class="first:p:mt-0"></div>
          </Fancybox>
        </div>
      </template>
    </div>
  </div>
</template>

<style lang="less" scoped></style>
