<template>
  <div class="layout">
    <div class="md:w-[580px] mx-auto bg-white min-h-[100vh] sm:w-full">
      <app-header></app-header>
      <router-view v-slot="{ Component }">
        <transition name="page" mode="out-in">
          <component :is="Component" />
        </transition>
      </router-view>
      <app-footer></app-footer>
    </div>
  </div>
</template>

<style scoped>
.page-enter-active,
.page-leave-active {
  transition: all 0.4s;
}
.page-enter-from,
.page-leave-to {
  opacity: 0;
  filter: blur(1rem);
}
</style>
