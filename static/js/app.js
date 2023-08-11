import { menu, ajaxNext, headerComment } from "./module.js"
jQuery(document).ready(function () {

  menu()
  ajaxNext()
  headerComment()

  $(document)
    .on('pjax:send', function () {
      //加载动画效果开始
      NProgress.start();
      ajaxNext()

      // ajaxcomments()
    }).on('pjax:complete', function () {
      //加载动画效果结束
      NProgress.done();
      // ajaxcomments()
      ajaxNext()
    }).on('pjax:end', function () {
      // pjax结束时运行代码
      $('.mmui-user-card .menu').fadeOut()
      $('.header-comment-content').fadeOut()
      // ajaxcomments()
    })
})