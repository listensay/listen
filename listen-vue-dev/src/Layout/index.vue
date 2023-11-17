<script setup>
import { useHomeStore } from '@/store/module/home'

const homeStore = useHomeStore()
homeStore.fetchGetWebSit()
</script>

<template>
  <div class="layout">
    <div class="md:w-[580px] mx-auto bg-white min-h-[100vh] sm:w-full">
      <app-header></app-header>
      <router-view></router-view>
      <app-footer></app-footer>
    </div>
  </div>
</template>

<style lang="less" scoped></style>
