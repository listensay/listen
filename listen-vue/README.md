# Yuna - typecho 主题开发脚手架

在`typecho`开发的三个月时间里，经过一些摸索实践，最终决定创造了`Yuna`，一个`typecho`主题开发脚手架，基于`vue`、`webpack`构建，对`typecho`主题由`ssr`服务器端渲染，改造成了`spa`应用，从而使得`typecho`主题开发、迭代版本、功能时，变得更加得心应手。

非常感谢`Moe`大佬、团队制作了`Restful`风格接口插件，让这个构建方案得以实现
[moefront/typecho-plugin-Restful](https://github.com/moefront/typecho-plugin-Restful)

## 快速开始

- 确保已经安装了`node`环境以及`npm`包管理工具

- 使用`git clone`命令、打包下载，将项目克移动到`typecho/usr/theme`目录中，执行`npm install`

- 下载并安装 [moefront/typecho-plugin-Restful](https://github.com/moefront/typecho-plugin-Restful) 插件，开启`typecho`后端`Restful`接口


> 如果依赖安装速度非常慢，推荐国内开发者为`npm`配置淘宝镜像、`cnpm`、当然`yarn`也是非常好的选择

## 结构

这是一个相对基础的`vue`、`webpack`构建主题开发前端方案，你可以在这基础之上，继续定制你需要的额外功能，比如替换`less`使用`sass`、`stylus`等，需要具备简单的`webpack`使用能力

```
├─public
│  ├─favicon.ico # 网站的favicon
│  └─index.php # typecho首页
├─src
│  ├─assets
│  │  ├─font # css字体，推荐使用iconfont
│  │  └─less # css样式文件，别问，less天下第一
│  ├─components # 存放vue组件
│  ├─router
│  │  ├─index.js # vue-router路由配置文件
│  ├─server
│  │  ├─index.js # typecho后端api
│  │  └─process.js # 接口数据清洗
│  ├─util
│  │  ├─index.js # 一些工具方法
│  │  ├─request.js # typecho后端api请求方法封装
│  │  └─service.js # axios的全局拦截、封装
│  ├─views # 存放视图模板
│  ├─main.js # vue.js入口文件
│  └─app.vue # 视图入口
└─webpack
```

## 开发、生产环境

脚手架通过`process.ENV`区分了`webpack`的开发环境、生产环境的配置，运行`npm run dev`之后，就可以专注主题开发了，只需要向开发`vue`项目那样，只不过由于`typecho`运行在本地的`apache`、`nginx`服务中，所以当代码发生变动，需要手动刷新浏览器才能看到变化

- 开发环境：当运行`npm run dev`时，`webpack`会在`typecho/usr/theme`文件夹中生成你的主题文件夹，并通过`loader`注入相关的`css、js`资源到`index.php`中

- 生产环境：当运行`npm run build`时，`webpack`会根据`themeConfig.js > ver`属性的`版本号`生产版本文件夹，并且将静态资源进行打包、压缩，注入到`index.php`中

```bash
# 在生产环境中创造主题，运行
npm run dev
# 打包主题上线，运行
npm run build
```

> 别忘了后台启用主题

## 版本管理

`themeConfig.js`中的`ver`属性，可以帮助你在创造不同版本的主题的时候，进行版本的管理，默认为`1.0`，如果你打算进行`1.0.1`版本的开发，那么就修改成`1.0.1`，在主题文件夹类就会生成`1.0`、`1.0.1`两个文件夹

> 当然你可以忽略它，使用`git`的进行分支、版本管理

## 缺点

致命缺点：对于一个博客站点而言，使用服务器端渲染的方案，对`SEO`是友好的，`SPA`方案应当受到摒弃，前提是你的博客文章非常优质，那么我并不推荐你使用`Yuna`进行主题开发。

但是从项目层面去考虑，作为一个小型的程序，`SPA`的体验非常优秀，并且使用`vue.js`取代`jQuery`不香吗？清晰的、可维护、易迭代的代码不香吗？

## 额外说明

- 图片压缩：脚手架默认使用了`Base64`压缩图片的方案

- 网站图标：`/public/favicon.ico`是由`HtmlWebpackPlugin`插件模板引擎自动注入到`index.php`中，所以如果你需要修改默认的`favicon.ico`，请替换你喜欢的`ico`文件

- 主题图片：在主题文件夹中，放入`screenshot.png`