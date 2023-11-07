import Vue from "vue";
import VueRouter from "vue-router";

const Foo = { template: "<div>foo</div>" };
const Bar = { template: "<div>bar</div>" };

Vue.use(VueRouter);

const routes = [
  {
    path: "/foo",
    component: Foo,
    meta: {
      title: "Foo Page"
    }
  },
  {
    path: "/bar",
    component: Bar,
    meta: {
      title: "Bar Page"
    }
  }
];

const router = new VueRouter({
  routes
});

export default router;
