<script setup>
import { ref } from 'vue'
const isShowMore = ref(false)

const handleHideMoreClick = () => {
  isShowMore.value = false
}

const handleShowMoreClick = () => {
  isShowMore.value = true
}
</script>

<template>
  <div :class="{ 'overflow-hidden mb-14': !isShowMore }">
    <slot></slot>
    <button
      v-if="isShowMore"
      class="block link my-4"
      @click="handleHideMoreClick"
    >
      收起
    </button>
    <span v-else class="show-more-btn" @click="handleShowMoreClick">
      <button class="link">展开</button>
    </span>
  </div>
</template>

<style>
.overflow-hidden {
  overflow: hidden;
  line-height: 40px;
  /* 设置为行高的整倍数，此处显示两行: 2 * 20px */
  max-height: 80px;
}

.show-more-btn {
  position: absolute;
  display: block;
  bottom: -45px;
  text-align: right;
  left: 0;
}

.link {
  color: #409eff;
  cursor: pointer;
}
</style>
