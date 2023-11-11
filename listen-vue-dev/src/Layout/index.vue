<script setup>
import { useHomeStore } from '@/store/module/home'
const homeStore = useHomeStore()
homeStore.fetchGetWebSit()
</script>

<template>
  <div class="layout my-4">
    <div class="w-[650px] mx-auto rounded-md overflow-hidden">
      <app-header></app-header>
      <router-view></router-view>
    </div>
  </div>
</template>

<style lang="less" scoped></style>
