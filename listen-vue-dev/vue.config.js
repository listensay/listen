const { defineConfig } = require('@vue/cli-service')
const theme = require('./theme.config')

module.exports = defineConfig({
  transpileDependencies: true,
  outputDir: `../${theme.name}`,
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
  }
})
