const { defineConfig } = require('@vue/cli-service')
const theme = require('./theme.config')
const { VantResolver } = require('@vant/auto-import-resolver')
const ComponentsPlugin = require('unplugin-vue-components/webpack')

module.exports = defineConfig({
  transpileDependencies: true,
  outputDir: `../${theme.name}`,
  devServer: {
    proxy: {
      '/api': {
        target: 'http://127.0.0.1:1234', // 要跨域的域名
        changeOrigin: true, // 是否开启跨域
        pathRewrite: {
          //重写路径
          '^/api': '/api' // 这种接口配置出来     http://XX.XX.XX.XX:8083/api/login
        }
      }
    }
  },
  publicPath:
    process.env.NODE_ENV === 'production' ? `/usr/themes/${theme.name}/` : '/',

  pages: {
    index: {
      entry: './src/main.js',
      template:
        process.env.NODE_ENV === 'production'
          ? './public/template.html'
          : './public/index.html',
      filename:
        process.env.NODE_ENV === 'production' ? 'index.php' : 'index.html'
    }
  },
  configureWebpack: {
    plugins: [
      ComponentsPlugin({
        resolvers: [VantResolver()]
      }),
      require('unplugin-auto-import/webpack')({
        imports: ['vue'],
        eslintrc: {
          enabled: true,
          filepath: './.eslintrc-auto-import.json',
          globalsPropValue: true
        },
        dts: './src/auto-import.d.ts'
      })
    ]
  }
})
