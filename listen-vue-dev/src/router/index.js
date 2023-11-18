import { createRouter, createWebHashHistory } from 'vue-router'
import { useHomeStore } from '@/store/module/home'
import { useMainStore } from '@/store/main'

const routes = [
  {
    path: '/',
    name: 'Layout',
    component: () => import('@/Layout'),
    redirect: '/home',
    children: [
      {
        path: '/home',
        name: 'Home',
        component: () => import('@/views/Home')
      },
      {
        path: '/links',
        name: 'Links',
        component: () => import('@/views/Links')
      },
      {
        path: '/about',
        name: 'About',
        component: () => import('@/views/About')
      }
    ]
  }
]

const router = createRouter({
  history: createWebHashHistory(process.env.BASE_URL),
  routes
})

router.beforeEach(async (to, from, next) => {
  const homeStore = useHomeStore()
  const mainStore = useMainStore()

  await homeStore.fetchGetWebSit()
  await mainStore.fetchGetPages()

  next()
})

export default router
