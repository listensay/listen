<script setup>
import { useHomeStore } from '@/store/module/home'
import { storeToRefs } from 'pinia'

const homeStore = useHomeStore()
const { website } = storeToRefs(homeStore)
</script>

<template>
  <div class="app-header">
    <div class="relative">
      <div class="h-[260px] relative">
        <div class="bg">
          <img
            :src="website.bannerUrl"
            class="max-w-full w-full h-[260px] object-cover"
            alt="bg"
          />
        </div>

        <div class="absolute right-6 -bottom-5 flex z-30">
          <div class="name m-4 text-white text-xl">{{ website.nickname }}</div>
          <img
            :src="website.logoUrl"
            width="75"
            class="rounded shadow"
            alt="avatar"
          />
        </div>
      </div>
      <div class="mt-10 mx-8 text-right text-sm text-gray-500">
        {{ website.userdesc }}
      </div>
    </div>
  </div>
</template>

<style lang="less" scoped>
.app-header {
  .name {
    text-shadow: 0 0 1px #000000a8;
  }
  .bg {
    &::after {
      content: '';
      position: absolute;
      z-index: 9;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(
        to top,
        rgba(0, 0, 0, 0.17) 0,
        #8c8c8c5c 100%
      );
    }
  }
}
</style>
