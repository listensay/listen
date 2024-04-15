<script setup>
import { defineProps, ref, reactive, watch } from 'vue'
import { useHomeStore } from '@/store/module/home'
import service from '@/utils/request'

const props = defineProps({
  cid: { type: String, default: -1 },
  commentState: { type: Boolean, default: false }
})

const homeStore = useHomeStore()
const comments = ref('')

// 获取评论列表
const getComments = async (cid) => {
  comments.value = await homeStore.fetchGetCommentsList(cid)
}

getComments(props.cid)
// 用户评论信息
const userinfo = reactive({
  cid: props.cid,
  author: '',
  mail: '',
  text: '',
  url: '',
  token: ''
})

function reset() {
  userinfo.author = ''
  userinfo.mail = ''
  userinfo.text = ''
  userinfo.url = ''
  userinfo.token = ''
  homeStore.commentState = false
}

// 发表评论处理函数
const commentHandle = async () => {
  // 获取评论Token
  await service({
    url: '/post',
    method: 'get',
    params: {
      cid: userinfo.cid
    }
  }).then(async (res) => {
    userinfo.token = res.data.csrfToken
  })

  await service({
    url: '/comment',
    method: 'post',
    headers: {
      'Content-Type': 'application/json'
    },
    data: JSON.stringify({
      ...userinfo
    })
  }).then(async (res) => {
    console.log(res)
    await getComments(props.cid)
    // 评论成功后重置输入框内容
    reset()
  })
}

const currentComment = ref(null)

// 回复处理
function reply(comment, index) {
  // console.log(comment)
  currentComment.value = index
}

// 取消回复
function cancelReply() {
  currentComment.value = null
}

watch(
  () => props.commentState,
  () => {
    cancelReply()
  }
)
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
              <van-field v-model="userinfo.author" placeholder="昵称" />
              <van-field v-model="userinfo.mail" placeholder="邮箱" />
              <van-field v-model="userinfo.url" placeholder="url" />
            </div>

            <van-field
              v-model="userinfo.text"
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
          v-for="(comment, index) in comments"
          :key="comment.coid"
          @click="reply(comment, index)"
        >
          <div class="flex text-sm py-2 cursor-pointer">
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
          <div v-if="currentComment === index && !commentState">
            <div class="myPanel">
              <div class="bg-zinc-100 my-2 rounded">
                <div class="p-2 box-border bg-white rounded h-full text-sm">
                  <div class="flex">
                    <van-field v-model="userinfo.author" placeholder="昵称" />
                    <van-field v-model="userinfo.mail" placeholder="邮箱" />
                    <van-field v-model="userinfo.url" placeholder="url" />
                  </div>

                  <van-field
                    v-model="userinfo.text"
                    rows="2"
                    autosize
                    type="textarea"
                    placeholder="评论"
                    class="h-full"
                  />
                  <div class="m-1 mx-4 flex justify-end">
                    <van-button
                      type="success"
                      size="small"
                      @click="commentHandle"
                      >评论</van-button
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <button @click="cancelReply">cancel</button>
      </div>
    </template>
  </div>
</template>

<style lang="less" scoped></style>
