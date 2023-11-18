<template>
  <div class="layout">
    <div class="md:w-[580px] mx-auto bg-white min-h-[100vh] sm:w-full">
      <app-header></app-header>
      <transition name="page">
        <keep-alive>
          <router-view />
        </keep-alive>
      </transition>
      <app-footer></app-footer>
    </div>
  </div>
</template>

<style lang="less" scoped>
.page-enter-active,
.page-leave-active {
  transition: all 0.4s;
}

.page-enter-from,
.page-leave-to {
  opacity: 0;
  filter: blur(1rem);
}

.page-enter-to,
.page-leave-from {
  opacity: 1;
  filter: blur(0);
}
</style>
