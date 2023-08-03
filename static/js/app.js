jQuery(document).ready(function () {
    function menu() {
        let width = 0
        let result = $('.mmui-user-card>.menu>.menu-list .item').each(function (index, item) {
            width += $(item).text().trim().length * 20
        })
        $('.mmui-user-card>.menu>.menu-list').width(width)

        $('#menu-active').click(function () {
            $('.mmui-user-card .menu').animate({
                opacity:'toggle'
            })
        })
    }
    menu()

    $(document)
        .on('pjax:send',function() {
            //加载动画效果开始
            NProgress.start();
            ajaxcomments()

        }).on('pjax:complete',function() {
            //加载动画效果结束
            NProgress.done();
            ajaxcomments()
        }).on('pjax:end', function () {
            // pjax结束时运行代码
            $('.mmui-user-card .menu').fadeOut()
            ajaxcomments()

    })
})