<script setup>
import { defineProps, ref } from 'vue'
import { formatTimestamp } from '@/utils/articleHandle'
import service from '@/utils/request'
import { showToast } from 'vant'
import 'vant/es/toast/style'
import Cookies from 'js-cookie'
import { useHomeStore } from '@/store/module/home'
import { useMainStore } from '@/store/main'

const props = defineProps({
  cid: { type: String, default: -1 },
  date: { type: Object, default: () => {} },
  article: { type: Object, default: () => {} }
})

const showPopover = ref(false)
const commentState = ref(false)

const actions = [
  { text: '点赞', icon: 'like-o' },
  { text: '评论', icon: 'chat-o' }
]

const likes = JSON.parse(Cookies.get('likes') || '[]')
likes.indexOf(Number(props.cid)) != -1
  ? (actions[0].text = '取消点赞')
  : (actions[0].text = '点赞')

const selfLike = ref(props.article.likes)

const onSelect = async (action) => {
  if (action.text === '评论' || action.text === '取消评论') {
    commentState.value = !commentState.value
    commentState.value ? (action.text = '取消评论') : (action.text = '评论')
  } else if (action.text === '点赞' || action.text === '取消点赞') {
    if (likes.indexOf(Number(props.cid)) == -1) {
      service({
        url: '/like',
        method: 'post',
        data: { cid: props.cid, likeState: true }
      }).then(() => {
        showToast({
          message: '(。ゝω・)ﾉ☆',
          icon: 'like-o'
        })
        likes.push(Number(props.cid))
        Cookies.set('likes', JSON.stringify(likes))
        action.text = '取消点赞'
        selfLike.value++
      })
    } else {
      service({
        url: '/like',
        method: 'post',
        data: { cid: props.cid, likeState: false }
      }).then(() => {
        showToast({
          message: '(╥_╥)',
          icon: 'like-o'
        })

        likes.splice(likes.indexOf(Number(props.cid)), 1)
        Cookies.set('likes', JSON.stringify(likes))
        action.text = '点赞'
        selfLike.value--
      })
    }
  }
}

const homeStore = useHomeStore()
const mainStore = useMainStore()
const comments = ref('')

// 获取评论列表
async function getComments(cid) {
  comments.value = await homeStore.fetchGetCommentsList(cid)
}

getComments(props.cid)

// 回复评论
function reply(index) {
  mainStore.commentActive = index
}

// 取消回复评论
function cancelReply() {
  mainStore.commentActive = null
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
    <!-- 文章点赞数量 -->
    <template v-if="selfLike > 0">
      <div class="bg-zinc-100 my-4 mb-2 px-3 p-2 text-sm rounded">
        <div class="flex-shrink-0 text-blue-900">
          <van-icon name="like-o" /> {{ selfLike }} 访客
        </div>
      </div>
    </template>
    <!-- 文章评论列表 -->
    <div class="article-comments">
      <!-- 评论列表 -->
      <template v-if="comments.length !== 0 || commentState">
        <div class="bg-zinc-100 my-4 mb-2 px-3 p-2 rounded">
          <!-- 评论框 -->
          <div class="bg-zinc-100 my-2 rounded" v-show="commentState">
            <div class="p-2 box-border bg-white rounded h-full text-sm">
              <app-comments
                :cid="cid"
                @comment="getComments(cid)"
              ></app-comments>
            </div>
          </div>
          <!-- 评论列表 -->
          <div v-for="comment in comments" :key="comment.coid">
            <!-- 嵌套评论 -->
            <Comment
              :comment="comment"
              :cid="cid"
              @reply="reply(comment.coid)"
              @parentComments="cancelReply"
              @refresh="getComments(cid)"
            />
            <template v-if="mainStore.commentActive === comment.coid">
              <app-comments
                :cid="cid"
                @comment="getComments(cid)"
                @cancelReply="cancelReply"
                :isReply="true"
                :replyID="comment.coid"
              ></app-comments>
            </template>
          </div>
        </div>
      </template>
    </div>
  </div>
</template>

<style lang="less" scoped></style>
