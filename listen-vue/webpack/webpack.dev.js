const merge = require("webpack-merge");
const common = require("./webpack.common.js");
const path = require("path");
const HtmlWebpackPlugin = require("html-webpack-plugin");

// 载入主题配置
const THEME = require("../themeConfig");

module.exports = merge(common, {
  mode: "development",
  watch: true,
  output: {
    path: path.resolve(__dirname, `../../${THEME.name}`),
    filename: `${THEME.name}.js`
  },
  module: {
    rules: [
      {
        test: /\.(css|less)$/,
        use: ["style-loader", "css-loader", "less-loader"]
      }
    ]
  },
  plugins: [
    new HtmlWebpackPlugin({
      filename: "index.php",
      template: path.join(__dirname, "../public/index.php"),
      inject: false,
      favicon: path.join(__dirname, `../public/favicon.ico`),
      hash: true
    })
  ]
});
