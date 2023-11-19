<script setup>
import { defineProps, ref } from 'vue'
import { formatTimestamp } from '@/utils/articleHandle'

defineProps({
  cid: { type: String, default: -1 },
  date: { type: Object, default: () => {} }
})

const showPopover = ref(false)
const commentState = ref(false)

const actions = [
  { text: '点赞', icon: 'like-o' },
  { text: '评论', icon: 'chat-o' }
]

const onSelect = (action) => {
  console.log(action)
  if (action.text === '评论' || action.text === '取消评论') {
    commentState.value = !commentState.value
    commentState.value ? (action.text = '取消评论') : (action.text = '评论')
  }
}
</script>

<template>
  <div class="article-footer">
    <!-- 文章时间和点赞 -->
    <div class="flex justify-between items-center">
      <div class="text-gray-500 text-sm">
        {{ formatTimestamp(date.timeStamp) }}
      </div>
      <div>
        <van-popover
          v-model:show="showPopover"
          :actions="actions"
          actions-direction="horizontal"
          placement="left"
          @select="onSelect"
        >
          <template #reference>
            <div
              class="flex w-9 justify-evenly bg-slate-100 p-1 py-2 rounded cursor-pointer"
            >
              <div class="w-1 h-1 bg-sky-600 rounded-full"></div>
              <div class="w-1 h-1 bg-sky-600 rounded-full"></div>
            </div>
          </template>
        </van-popover>
      </div>
    </div>
    <!-- 文章评论列表 -->
    <ArticleComments :cid="cid" :commentState="commentState"></ArticleComments>
  </div>
</template>

<style lang="less" scoped></style>
