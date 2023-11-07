// 主题配置
module.exports = {
  // 主题名称
  name: "listen-vue",
  // 打包上线的版本管理
  ver: "1.0",
  server: {
    // 后端Restful插件接口基础地址，如果开启伪静态，修改为'/'
    url: "/",
    // axios请求超时时间
    timeout: 8000
  }
};
