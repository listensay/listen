<script setup>
import { defineProps, ref } from 'vue'
import { useHomeStore } from '@/store/module/home'

const props = defineProps({
  cid: { type: String, default: -1 }
})

const homeStore = useHomeStore()
const comments = ref('')

const getComments = async (cid) => {
  comments.value = await homeStore.fetchGetCommentsList(cid)
}

getComments(props.cid)
</script>

<template>
  <div class="article-comments">
    <div class="bg-zinc-100 my-4 mb-2 px-3" v-if="cid !== '-1'">
      <div
        class="flex text-sm py-2"
        v-for="comment in comments"
        :key="comment.coid"
      >
        <div class="flex-shrink-0 text-blue-900">
          <a :href="comment?.url" target="_blank" v-if="comment?.url !== null">
            {{ comment?.author }}
          </a>
          <div v-else>
            {{ comment?.author }}
          </div>
        </div>
        <div>：</div>
        <div
          class="flex-1 overflow-hidden break-words text-wrap"
          style="text-wrap: wrap"
        >
          {{ comment?.text }}
        </div>
      </div>
    </div>
  </div>
</template>

<style lang="less" scoped></style>
