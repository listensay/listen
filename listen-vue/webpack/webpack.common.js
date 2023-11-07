const path = require('path')
const { VueLoaderPlugin } = require('vue-loader')

// 载入主题配置
const THEME = require('../themeConfig')

// 公共webpack配置
module.exports = {
  stats: {
    modules: false,
    children: false,
    chunks: false,
    chunkModules: false
  },
  entry: path.join(__dirname, '../src/main.js'),
  module: {
    rules: [
      {
        test: /\.vue$/,
        loader: 'vue-loader'
      },
      {
        test: /\.js$/,
        loader: 'babel-loader'
      },
      {
        test: /\.(png|jpg|gif|jpeg)$/,
        use: [
          {
            loader: 'url-loader',
            options: {
              esModule: false,
              limit: true
            }
          }
        ]
      }
    ]
  },
  plugins: [new VueLoaderPlugin()],
  // cdn
  externals: {
    vue: 'Vue',
    'vue-router': 'VueRouter'
  }
}
