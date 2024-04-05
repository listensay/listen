<script setup>
const r = await useRequest('/api/checkInstalled')
const state = ref(!r.data.isInstall)

const route = useRoute()

if(state.value && route.path !== '/install') {
  navigateTo('install')
}
</script>

<template>
  <div class="default">
    <slot />
  </div>
</template>

<style lang="less" scoped></style>
