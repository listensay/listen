const { merge } = require('webpack-merge')
const common = require('./webpack.common.js')
const path = require('path')
const MiniCssExtractPlugin = require('mini-css-extract-plugin')
const OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin')
const TerserJSPlugin = require('terser-webpack-plugin')
const HtmlWebpackPlugin = require('html-webpack-plugin')

// 载入主题配置
const THEME = require('../themeConfig')

module.exports = merge(common, {
  mode: 'production',
  output: {
    path: path.resolve(__dirname, `../../${THEME.name}/${THEME.ver}/`),
    filename: `${THEME.name}.${THEME.ver}.min.js`
  },
  optimization: {
    minimizer: [
      new TerserJSPlugin({}),
      new OptimizeCssAssetsPlugin({})
    ],
    minimize: true
  },
  module: {
    rules: [
      {
        test: /\.(css|less)$/,
        use: [MiniCssExtractPlugin.loader, 'css-loader', 'less-loader']
      }
    ]
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: `${THEME.name}.${THEME.ver}.min.css`
    }),
    new HtmlWebpackPlugin({
      filename: 'index.php',
      template: path.join(__dirname, '../public/index.php'),
      minify: {
        removeComments: true,
        collapseWhitespace: true,
        minifyCSS: true
      },
      favicon: path.join(__dirname, '../public/favicon.ico'),
      inject: false
    })
  ]
})
