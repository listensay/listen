<script setup>
import { defineProps, ref, reactive } from 'vue'
import { useHomeStore } from '@/store/module/home'

const props = defineProps({
  cid: { type: String, default: -1 },
  commentState: { type: Boolean, default: false }
})

const homeStore = useHomeStore()
const comments = ref('')

const getComments = async (cid) => {
  comments.value = await homeStore.fetchGetCommentsList(cid)
}

getComments(props.cid)
// 信息
const message = ref('')
// 用户评论信息
const userinfo = reactive({
  nickename: '',
  email: '',
  url: ''
})

const commentHandle = () => {}
</script>

<template>
  <div class="article-comments">
    <!-- 评论列表 -->
    <template v-if="comments.length !== 0 || commentState">
      <div class="bg-zinc-100 my-4 mb-2 px-3 p-2 rounded">
        <!-- 评论框 -->
        <div class="bg-zinc-100 my-2 rounded" v-show="commentState">
          <div class="p-2 box-border bg-white rounded h-full text-sm">
            <div class="flex">
              <van-field v-model="userinfo.nickename" placeholder="昵称" />
              <van-field v-model="userinfo.email" placeholder="邮箱" />
              <van-field v-model="userinfo.url" placeholder="url" />
            </div>

            <van-field
              v-model="message"
              rows="2"
              autosize
              type="textarea"
              placeholder="评论"
              class="h-full"
            />
            <div class="m-1 mx-4 flex justify-end">
              <van-button type="success" size="small" @click="commentHandle"
                >评论</van-button
              >
            </div>
          </div>
        </div>
        <!-- 评论列表 -->
        <div
          class="flex text-sm py-2"
          v-for="comment in comments"
          :key="comment.coid"
        >
          <div class="flex-shrink-0 text-blue-900">
            <a
              :href="comment?.url"
              target="_blank"
              v-if="comment?.url !== null"
            >
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
    </template>
  </div>
</template>

<style lang="less" scoped></style>
