<script setup>
import { ref } from 'vue'
const active = ref(0)
</script>

<template>
  <div class="app-footer">
    <van-tabbar v-model="active" class="max-[580px]:" route>
      <van-tabbar-item name="home" to="/home" icon="friends-o"
        >朋友圈</van-tabbar-item
      >
      <van-tabbar-item name="links" to="/links" icon="link-o"
        >联系簿</van-tabbar-item
      >
      <!-- <van-tabbar-item icon="setting-o">归档</van-tabbar-item> -->
      <van-tabbar-item to="/about" icon="user-circle-o">关于</van-tabbar-item>
    </van-tabbar>
  </div>
</template>
<style lang="less" scoped>
.app-footer {
  :deep(.van-tabbar--fixed) {
    position: fixed;
    max-width: 580px;
    left: 0;
    right: 0;
    margin: auto;
  }
}
</style>
