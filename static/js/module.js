import './jquery.js';
/**
 * Header 导航栏
 */
export function menu() {
  // 宽度计算
  let width = 0
  let result = $('.mmui-user-card>.menu>.menu-list .item').each(function (index, item) {
    width += $(item).text().trim().length * 20
  })
  $('.mmui-user-card>.menu>.menu-list').width(width)

  let timer = null
  $('#menu-active').hover(function () {
    $('.mmui-user-card .menu').fadeIn()
  }, function () {
    timer = setTimeout(function () {
      $('.mmui-user-card .menu').fadeOut()
    }, 1000)
  })

  $('.mmui-user-card .menu').on('mouseenter', function () {
    clearTimeout(timer)
  })

  $('.mmui-user-card .menu').on('mouseleave', function () {
    $('.mmui-user-card .menu').fadeOut()
  })
}

/**
 * Function Source
 * https://www.jinjun.top/135.html
 */
export function ajaxNext() {
  $('.next').click(function () {
    let $this = $(this);
    $this.addClass('loading').text('正在努力加载'); //给a标签加载一个loading的class属性，用来添加加载效果
    var href = $this.attr('href'); //获取下一页的链接地址
    if (href != undefined) { //如果地址存在
      $.ajax({ //发起ajax请求
        url: href,
        //请求的地址就是下一页的链接
        type: 'get',
        //请求类型是get
        error: function (request) {
          //如果发生错误怎么处理
        },
        success: function (data) { //请求成功
          $this.removeClass('loading').text('查看更多'); //移除loading属性

          var $res = $(data).find('.mmui-article-list .list .item'); //从数据中挑出文章数据，请根据实际情况更改

          $('.mmui-article-list .list').append($res.fadeIn(500)); //将数据加载加进posts-loop的标签中。

          var newhref = $(data).find('.next').attr('href'); //找出新的下一页链接

          if (newhref != undefined) {
            $('.next').attr('href', newhref);
          } else {
            $('.next').remove(); //如果没有下一页了，隐藏
          }
        }
      });
    }
    return false;
  });
}

/**
 * Header 导航栏最新评论打开关闭功能
 */
export function headerComment() {
  $('.header-comment').on('click', function () {
    $('.header-comment-content').fadeToggle()
  })
}

/**
 *  更多按钮功能 TODO
 */
export function more() {
  // 节流锁
  let lock = true

  // $('.option .article-info').css({ 'display': 'none' })
  $('.option').on('click', '.option-more', function () {

    // 拿到兄弟元素
    $(this).siblings().toggleClass('active')
    // $(this).next().fadeIn()

    if (!lock) return

    // if ($(this).next().attr('class') === 'article-info') {
    //   $(this).next().addClass('active')
    //   $(this).next().fadeIn()
    // } else {
    //   $(this).next().removeClass('active')
    //   $(this).next().fadeOut()
    // }

    lock = false
    setTimeout(() => {
      lock = true
    }, 500)
  })
}