jQuery(document).ready(function () {
    function menu() {

        // 宽度计算
        let width = 0
        let result = $('.mmui-user-card>.menu>.menu-list .item').each(function (index, item) {
            width += $(item).text().trim().length * 20
        })
        $('.mmui-user-card>.menu>.menu-list').width(width)

        let timer = null
        // 进入active 或者退出 active
        $('#menu-active').hover(function () {
            $('.mmui-user-card .menu').show()
        }, function () {
            timer = setTimeout(function () {
                $('.mmui-user-card .menu').hide()
            }, 1500)
        })


        $('.mmui-user-card .menu').on('mouseenter', function () {
            // $('.mmui-user-card .menu').show()
            console.log(123)
            clearTimeout(timer)
        })

        $('.mmui-user-card .menu').on('mouseleave', function () {
            $('.mmui-user-card .menu').hide()
        })
    }
    menu()

    $(document)
        .on('pjax:send', function () {
            //加载动画效果开始
            NProgress.start();
            ajaxcomments()

        }).on('pjax:complete', function () {
            //加载动画效果结束
            NProgress.done();
            ajaxcomments()
        }).on('pjax:end', function () {
            // pjax结束时运行代码
            $('.mmui-user-card .menu').fadeOut()
            ajaxcomments()

        })
})