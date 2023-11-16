<script setup>
import { useMainStore } from './store/main'

const mainStore = useMainStore()
mainStore.fetchGetPages()
</script>

<template>
  <div>
    <router-view />
  </div>
</template>

<style lang="less"></style>
