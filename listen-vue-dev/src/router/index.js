import { createRouter, createWebHashHistory } from 'vue-router'
import { useHomeStore } from '@/store/module/home'
import { useMainStore } from '@/store/main'

const routes = [
  {
    path: '/',
    name: 'Layout',
    component: () => import('@/Layout'),
    children: [
      {
        path: '/',
        name: 'Home',
        component: () => import('@/views/Home')
      }
    ]
  }
]

const router = createRouter({
  history: createWebHashHistory(process.env.BASE_URL),
  routes
})

router.beforeEach(async (to, from, next) => {
  try {
    const homeStore = useHomeStore()
    const mainStore = useMainStore()

    await homeStore.fetchGetWebSit()
    await mainStore.fetchGetPages()
  } catch (error) {
    console.log(error)
  }

  next()
})

export default router
