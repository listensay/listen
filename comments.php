<?php function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            //如果是文章作者的评论添加 .comment-by-author 样式
            $commentClass .= 'comment-by-author';
        } else {
            //如果是评论作者的添加 .comment-by-user 样式
            $commentClass .= 'comment-by-user';
        }
    }
    //评论层数大于0为子级，否则是父级
    $commentLevelClass = $comments->_levels > 0 ? ' comment-child' : ' comment-parent';
    $depth = $comments->levels +1;
    //判断博主头像
        $email = $comments->mail;
        //判断邮箱类型选取头像地址
        if(preg_match('|^[1-9]\d{4,10}@qq\.com$|i',$email)){
            $qqnumber = explode("@",$email);
            $avatar = '//q.qlogo.cn/g?b=qq&nk=' . $qqnumber[0]. '&s=100';
            $avatar2x = '//q.qlogo.cn/g?b=qq&nk=' . $qqnumber[0]. '&s=160';
        }else{
            $avatar = 'https://gravatar.loli.net/avatar/' . md5(strtolower($comments->mail)) . '?s=80&r=X&d=mm';
            $avatar2x = 'https://gravatar.loli.net/avatar/' . md5(strtolower($comments->mail)) . '?s=160&r=X&d=mm';
        }
    ?>
<li class="comment <?php $comments->alt('comment-odd', 'comment-even');?> depth-<?php echo $depth ?>"
  id="li-<?php $comments->theId(); ?>">
  <div id="<?php $comments->theId(); ?>" class="comment_body contents">
    <section class="commeta">
      <div class="left">

        <div class="author">
          <img alt="<?php $comments->author(false); ?>" src="<?php echo $avatar ?>" class="avatar" />
          <div class="info">
            <div>
              <a href="<?php $comments->url(); ?>">
                <?php $comments->author(false); ?>
              </a>
            </div>
            <time class="time" datetime="<?php $comments->date('Y-m-d'); ?>"><?php $comments->date('Y年m月d日'); ?></time>
          </div>
        </div>
      </div>
      <div class="right">
        <a rel='nofollow' class='comment-reply-link' href='<?php $comments->responseUrl(); ?>'
          onclick="return TypechoComment.reply('<?php $comments->theId(); ?>', <?php $comments->coid();?>);"
          aria-label='回复给<?php $comments->author(false); ?>'>回复</a>
      </div>
    </section>
    <div class="body">
      <p>
        <?php
                        echo get_commentReply_at($comments->coid);
                    ?>
        <!-- 评论@ -->
        <?php $cos = preg_replace('#</?[p|P][^>]*>#','',$comments->content);echo $cos;?>
        <!-- 评论内容 -->
      </p>
    </div>
  </div>
  <?php if ($comments->children){ ?>
  <!-- 嵌套评论代码 -->
  <div class="children">
    <?php $comments->threadedComments($options); ?>
  </div>
  <?php } ?>
</li>
<?php } ?>

<section id="comments" class="comments">
  <!-- 输出评论信息 -->
  <div class="comments-main">
    <!--        <h3 id="comments-list-title">Comments --><?php //$this->commentsNum(_t('NOTHING'), _t('<span class="noticom">1</span>条评论'), _t('<span class="noticom">%d</span>条评论')); ?>
    <!-- </h3>-->
    <!-- 评论内容 -->
    <div id="comments-content">
      <?php $this->comments()->to($comments); ?>
      <?php $comments->listComments(); ?>
    </div>
    <?php if ($comments->have()): ?>
    <!-- 评论翻页 -->
    <nav id="comments-navi">
      <?php $comments->pageNav('←','→','1','...'); ?>
    </nav>
    <?php endif; ?>
    <!--评论框-->
    <!-- 判断设置是否允许对当前文章进行评论 -->
    <?php if($this->allow('comment')): ?>
    <div id="respond_box">
      <div id="<?php $this->respondId(); ?>" class="comment-respond">

        <!-- 输入表单开始 -->
        <form action="<?php $this->commentUrl() ?>" method="post" id="commentform" class="mdui-container-fluid">
          <div class="cancel-comment-reply">
            <?php $comments->cancelReply(); ?>
          </div>
          <!-- 如果当前用户已经登录 -->
          <?php if ($this->user->hasLogin()): ?>
          <p><?php $this->user->screenName(); ?> <a href="<?php $this->options->logoutUrl(); ?>" title="退出">退出</a></p>
          <!-- 若当前用户未登录 -->
          <?php else: ?>
          <div class="row">
            <div class="textfield">
              <input class="textfield-input" type="text" name="author" id="author"
                value="<?php $this->remember('author'); ?>" placeholder="Name" required>
            </div>
            <div class="textfield">
              <input class="textfield-input" type="mail" name="mail" id="mail" placeholder="Email"
                value="<?php $this->remember('mail'); ?>" required>
            </div>
            <div class="textfield">
              <input class="textfield-input" type="text" name="url" id="url" placeholder="Url"
                value="<?php $this->remember('url'); ?>">
            </div>
          </div>
          <?php endif; ?>
          <div class="row">
            <div class="textfield textfield-textarea">
              <textarea name="text" id="comment" class="OwO-textarea textfield-input" rows="4" placeholder="说点什么呗 QAQ"
                style="resize: none"></textarea>
            </div>
          </div>

          <div class="row">
            <button class="btn">发表评论</button>
            <input type='hidden' name='comment_post_ID' value='58' id='comment_post_ID' />
            <input type='hidden' name='comment_parent' id='comment_parent' value='0' />
            <!--表情-->
            <div class="OwO"></div>
            <script type="text/javascript" src="<?php echo theurl; ?>js/OwO.js" defer="defer"></script>

          </div>
        </form>
        <?php else: ?>
        <style>
        .comment-reply-link {
          display: none !important;
        }
        </style>
        <section class="author-profile">
          <p><i class="iconfont">&#xe61a;</i>该文章已经关闭评论</p>
        </section>
        <?php endif; ?>
        <div class="clear"></div>
      </div>
    </div>
  </div>
</section>