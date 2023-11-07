import { createRouter, createWebHashHistory } from 'vue-router'

const routes = [
  {
    path: '/',
    name: 'Layout',
    component: () => import('@/Layout/index.vue'),
    redirect: '/index',
    children: [
      {
        path: '/index',
        name: 'Home',
        component: () => import('@/views/home/index.vue')
      }
    ]
  }
]

const router = createRouter({
  history: createWebHashHistory(process.env.BASE_URL),
  routes
})

export default router
