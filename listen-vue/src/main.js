import Vue from "vue";
import App from "./app.vue";
import router from "./router";
import "./assets/less/common.less";

router.beforeEach((to, from, next) => {
  /* 路由发生变化修改页面title */
  if (to.meta.title) {
    document.title = to.meta.title;
  }
  next();
});

new Vue({
  router,
  render: h => h(App)
}).$mount("#app");
