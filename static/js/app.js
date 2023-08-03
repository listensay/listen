jQuery(document).ready(function () {
    //ajax评论
    var ajaxcomments = function(){
        var
            $body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $('html') : $('body')) : $('html,body');
        var
            comments_order = 'DESC',
            comment_list   = '.comment-list',
            comments       = '.noticom',
            comment_reply  = '.comment-reply-link',
            comment_form   = '#commentform',
            respond        = '#comments-ajax',
            textarea       = '#comment',
            submit_btn     = '#submit',
            new_id = '', parent_id = '';

        click_bind();
        /* 开始提交 */
        $(comment_form).submit(function() {
            /* 初始化评论框 */
            $('.comment-respond textarea').css({"border":"2px  solid #DDE6EA"});
            $('.commenttext').css({"border":"2px  solid #DDE6EA"});
            $("#submit").val("提交中...");
            if($('#comment-author-info').length>0){
                /*格式整理*/
                var authorValue = $('#author').val().replace(/(^\s*)|(\s*$)/g, "");
                var mailValue = $('#mail').val().replace(/(^\s*)|(\s*$)/g, "");
                var urlValue = $('#url').val().replace(/(^\s*)|(\s*$)/g, "");
                var textValue = $(comment_form).find(textarea).val().replace(/(^\s*)|(\s*$)/g, "");
                /* 预检 */
                var errorNum = 0;
                if(authorValue == ""){
                    errorNum++;
                    $('#author').css({"border":"2px dashed #ff6c6c"});
                }
                if(mailValue == ""){
                    errorNum++;
                    $('#mail').css({"border":"2px dashed #ff6c6c"});
                }
                if(urlValue != ""){
                    if(urlValue.indexOf('https://') == -1 && urlValue.indexOf('http://') == -1){
                        errorNum++;
                        $('#url').css({"border":"2px dashed #ff6c6c"});
                    }
                }
                if(textValue == ""){
                    errorNum++;
                    $('.comment-respond textarea').css({"border":"2px dashed #ff6c6c"});
                }
                if(errorNum != 0){
                    $("#comment-author-info").show();
                    $("#toggle-comment-info").html("[ 隐藏 ] ↑");
                    setTimeout(function(){ $("#submit").val("再次提交"); }, 500);
                    return false;
                }
            }
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: $(this).serializeArray(),async: true,
                error: function(date) {
                    $("#submit").val("提交失败");
                    let msg = $(".container", date.responseText).prevObject[7].innerHTML.replace(/\s*/g,"");
                    $(document).ready(function(){
                        $.alert("提示",msg);
                    });
                    setTimeout(function(){ $("#submit").val("再次提交"); }, 1000);
                    return false;
                },
                success: function(data) { //成功取到数据
                    try {
                        new_id = $(comment_list, data).html().match(/id=\"?comment-\d+/g).join().match(/\d+/g).sort(function(a, b) {
                            return a - b
                        }).pop(); // TODO：找新 id，如果在第二页评论的话，找到的ID是有问题的！

                        if ($('.page-navigator .prev').length && parent_id == ""){
                            new_id = '';
                            var dd=$(".prev a").attr("href");//获取上页地址
                            $(".prev a").attr("href",""); //将地址清空
                            dd=dd.replace(/comment-page-(.*?)#comments/, "comment-page-1#comments");//将获取的地址页码改为1
                            $(".prev a").attr("href",dd); //将地址放回去
                            $('.prev a').get(0).click(); //点击这个超链接
                        }//判断当前评论列表是否在第一页,并且只会在母评论时候才会生效

                        //插入评论内容到当前页面
                        if (parent_id) {
                            data = $('#li-comment-' + new_id, data).hide(); // 取新评论
                            if ($('#' + parent_id).find(".children").length <= 0) {
                                $('#' + parent_id).append("<div class='children'><ol class='comment-list'></ol></div>");
                            }
                            if (new_id)//new_id不为空的时候才会插入
                                $('#' + parent_id + " .children .comment-list").prepend(data);
                            parent_id = '';
                        } else {
                            data = $('#li-comment-' + new_id, data).hide(); // 取新评论
                            //console.log('该评论为母评论');
                            if (!$(comment_list).length) //如果一条评论也没有的话
                                $(respond).append('<ol class="comment-list"></ol>'); // 加 ol
                            $(comment_list).prepend(data);
                        }
                        setTimeout(function(){ $("#submit").val("提交成功"); }, 2000);
                        $('#li-comment-' + new_id).fadeIn(); // 显示
                        var num;
                        $(comments).length ? (num = parseInt($(comments).text().match(/\d+/)), $(comments).html($(comments).html().replace(num, num + 1))) : 0;
                        // 评论数加一
                        TypechoComment.cancelReply();
                        $(textarea).html('');$(textarea).val('');
                        $(comment_reply + ' #cancel-comment-reply-link').unbind('click');
                        click_bind(); // 新评论绑定
                        if (new_id){
                            $body.animate({scrollTop: $('#li-comment-' + new_id).offset().top - 200}, 900);
                        }else{
                            $body.animate({scrollTop: $('#comments').offset().top - 200}, 900);
                        }
                        setTimeout(function(){ $("#submit").val("发表评论"); }, 3000);
                    } catch(e) {
                        //alert('评论ajax错误!请截图并联系主题制作者！\n\n' + e);
                        window.location.reload();
                    }
                } // end success()
            }); // end ajax()
            return false;
        }); // end $(comment_form).submit()

        function click_bind() { // 绑定
            $(comment_reply).click(function() { // 回复
                parent_id = $(this).parent().parent().parent().attr("id");
                $(textarea).focus();
            });
            $('#cancel-comment-reply-link').click(function() { // 取消
                parent_id = '';
            });
        }

    }
    ajaxcomments()

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