import { createApp } from 'vue'
import App from './App.vue'
import router from './router'

router.beforeEach((to, from, next) => {
  /* 路由发生变化修改页面title */
  if (to.meta.title) {
    document.title = to.meta.title
  }
  next()
})

createApp(App).use(router).mount('#app')
