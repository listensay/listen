<script setup>
import { defineProps, defineEmits } from 'vue'
import { useMainStore } from '@/store/main'
const mainStore = useMainStore()

defineProps({
  comment: {
    type: Object,
    required: true
  },
  cid: {
    type: String,
    required: true
  },
  isChild: {
    type: Boolean,
    default: false
  },
  parentAuthor: {
    type: String,
    default: ''
  },
  parentUrl: {
    type: String,
    default: ''
  }
})

const emit = defineEmits(['reply', 'refresh'])

// 回复评论
function reply(index) {
  mainStore.commentActive = index
}

// 取消回复评论
function cancelReply() {
  mainStore.commentActive = null
}

// 回复父评论
function replyParentHandle() {
  emit('reply')
}

// 重新获取评论
function refreshComment() {
  emit('refresh')
}
</script>

<template>
  <div>
    <!-- 父级评论 -->
    <div
      class="flex text-sm py-2 cursor-pointer"
      @click.stop="replyParentHandle"
    >
      <div class="flex-shrink-0 text-blue-900">
        <a :href="comment?.url" target="_blank" v-if="comment?.url !== null">
          {{ comment?.author }}
        </a>
        <div v-else>{{ comment?.author }}</div>
      </div>
      <template v-if="isChild">
        <div class="mx-1">回复</div>
        <div class="flex-shrink-0 text-blue-900">
          <a :href="parentUrl" target="_blank" v-if="parentUrl !== null">
            {{ parentAuthor }}
          </a>
          <div v-else>{{ parentAuthor }}</div>
        </div>
        :
      </template>
      <template v-else>
        <div>：</div>
      </template>
      <div
        class="flex-1 overflow-hidden break-words text-wrap"
        style="text-wrap: wrap"
      >
        {{ comment?.text }}
      </div>
    </div>
    <!-- 子级评论 -->
    <div v-for="(childComment, index) in comment.children" :key="index">
      <div class="flex">
        <Comment
          :comment="childComment"
          @reply="reply(childComment.coid)"
          :cid="childComment.coid"
          :isChild="true"
          :parentAuthor="comment.author"
          :parentUrl="comment.url"
        />
      </div>
      <!-- 评论框 -->
      <template v-if="mainStore.commentActive === childComment.coid">
        <app-comments
          :cid="cid"
          @comment="refreshComment(cid)"
          @cancelReply="cancelReply"
          :isReply="true"
          :replyID="childComment.coid"
        />
      </template>
    </div>
  </div>
</template>
