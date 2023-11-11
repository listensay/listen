<script setup>
import { ref } from 'vue'
const active = ref(0)
</script>

<template>
  <div class="app-footer">
    <van-tabbar v-model="active">
      <van-tabbar-item icon="friends-o">朋友圈</van-tabbar-item>
      <van-tabbar-item icon="link-o">联系簿</van-tabbar-item>
      <van-tabbar-item icon="setting-o">归档</van-tabbar-item>
      <van-tabbar-item icon="chat-o" dot>标签</van-tabbar-item>
    </van-tabbar>
  </div>
</template>

<style lang="less" scoped>
.app-footer {
  :deep(.van-tabbar--fixed) {
    max-width: 650px;
    left: 0;
    right: 0;
    margin: auto;
  }
}
</style>
