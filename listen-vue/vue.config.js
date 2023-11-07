const { defineConfig } = require('@vue/cli-service')
const { VantResolver } = require('@vant/auto-import-resolver')
const ComponentsPlugin = require('unplugin-vue-components/webpack')

module.exports = defineConfig({
  transpileDependencies: true,
  publicPath: './',
  configureWebpack: {
    plugins: [
      ComponentsPlugin({
        resolvers: [VantResolver()]
      })
    ]
  }
})
