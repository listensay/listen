<template>
  <div id="app">
    <div>
      <h2>1.使用tp-cli</h2>
      <h2>2.阿里iconfont</h2>
      <p>
        <i class="iconfont">&#xe673;</i>
      </p>
    </div>
    <h2>3.路由演示</h2>
    <p>
      <router-link to="/foo">Go to Foo1</router-link>
      <router-link to="/bar">Go to Bar2</router-link>
    </p>
    <router-view></router-view>
    <h2>4.css预编译器</h2>
    <p>推荐使用less</p>
    <h2>5.请求typecho后端接口</h2>
    <p>{{dataFromApi}}</p>
  </div>
</template>

<script>
import { getPages } from "./server";
export default {
  data() {
    return {
      axiosGetData: "",
      dataFromApi: []
    };
  },
  mounted() {
    getPages().then(res => {
      this.dataFromApi = res;
    });
  }
};
</script>

<style lang="less" scoped>
.btn {
  background: #3385ff;
  color: #fff;
  font-size: 12px;
  padding: 2px 4px;
  cursor: pointer;
  &:hover {
    opacity: 0.8;
  }
}
</style>