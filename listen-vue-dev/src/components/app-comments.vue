<script setup>
import service from '@/utils/request'
import { reactive, defineProps, defineEmits } from 'vue'

const props = defineProps({
  cid: { type: String, default: -1 },
  isReply: { type: Boolean, default: false },
  replyID: { type: String, default: '' }
})

const emit = defineEmits(['cancelReply', 'comment'])

// 用户评论信息
const userinfo = reactive({
  cid: props.cid,
  author: '',
  mail: '',
  text: '',
  url: '',
  token: '',
  parent: null
})

if (props.isReply) {
  // eslint-disable-next-line vue/no-setup-props-destructure
  userinfo.parent = props.replyID
}

function reset() {
  userinfo.author = ''
  userinfo.mail = ''
  userinfo.text = ''
  userinfo.url = ''
  userinfo.token = ''
  emit('comment')
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

  if (!props.isReply) {
    await service({
      url: '/comment',
      method: 'post',
      headers: {
        'Content-Type': 'application/json'
      },
      data: JSON.stringify({
        ...userinfo
      })
    }).then(async () => {
      reset()
    })

    return
  }

  await service({
    url: '/comment',
    method: 'post',
    headers: {
      'Content-Type': 'application/json'
    },
    data: JSON.stringify({
      ...userinfo
    })
  }).then(async () => {
    reset()
  })
}

function cancel() {
  emit('cancelReply', false)
}
</script>

<template>
  <div class="app-comments">
    <van-form @submit="commentHandle">
      <div class="flex">
        <van-field
          v-model="userinfo.author"
          placeholder="昵称"
          :rules="[{ required: true, message: '请填写昵称' }]"
        />
        <van-field
          v-model="userinfo.mail"
          placeholder="邮箱"
          :rules="[{ required: true, message: '请填写邮箱' }]"
        />
        <van-field v-model="userinfo.url" placeholder="url" />
      </div>

      <van-field
        v-model="userinfo.text"
        rows="2"
        autosize
        type="textarea"
        placeholder="评论"
        class="h-full"
        :rules="[{ required: true, message: '请填写评论' }]"
      />
      <div class="m-1 flex justify-end items-center">
        <div class="mr-2">
          <div class="text-sm cursor-pointer" @click="cancel">取消</div>
        </div>
        <van-button type="success" size="small" native-type="submit"
          >评论</van-button
        >
      </div>
    </van-form>
  </div>
</template>

<style lang="less" scoped></style>
