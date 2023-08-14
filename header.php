<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<!DOCTYPE HTML>
<html class="scroll-smooth">

<head>
  <meta charset="<?php $this->options->charset(); ?>">
  <meta name="renderer" content="webkit">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title><?php $this->archiveTitle([
            'category' => _t('分类 %s 下的文章'),
            'search' => _t('包含关键字 %s 的文章'),
            'tag' => _t('标签 %s 下的文章'),
            'author' => _t('%s 发布的文章')
        ], '', ' - '); ?><?php $this->options->title(); ?></title>

  <!-- 使用url函数转换相关路径 -->
  <link rel="stylesheet" href="<?php $this->options->themeUrl('/static/css/style.css'); ?>">
  <!-- 基础CSS -->
  <link rel="stylesheet" href="<?php $this->options->themeUrl('/static/css/base.css'); ?>">
  <!-- 公共CSS -->
  <link rel="stylesheet" href="<?php $this->options->themeUrl('/static/css/common.css'); ?>">
  <!-- 媒体查询CSS -->
  <link rel="stylesheet" href="<?php $this->options->themeUrl('/static/css/media.css'); ?>">
  <!-- 其他CSS -->
  <link rel="stylesheet" href="<?php $this->options->themeUrl('/static/css/nprogress.css'); ?>">
  <link rel="stylesheet" href="<?php $this->options->themeUrl('/static/css/fancybox.css'); ?>">
  <script src="<?php $this->options->themeUrl('/static/js/jquery.js'); ?>"></script>

  <!-- 通过自有函数输出HTML头部信息 -->
  <?php $this->header(); ?>
</head>

<body class="bg-white">

  <div class="container mx-auto">
    <style>
    .mmui {
      width: <?php $this->options->themeWidth() ?>
    }


    .mmui .header-bar {
      width: <?php $this->options->themeWidth() ?>
    }

    @media (max-width: 720px) {
      .mmui {
        width: 100%;
        margin: 0;
      }
    }
    </style>
    <div id="app" class="mmui shadow-md">
      <!-- 状态栏 -->
      <div class="mmui-conainer">
        <div class="header-container">
          <header class="header-bar">
            <div class="layout">
              <div class="left">
                <!-- 菜单 -->
                <!-- <a href="javascript:;" id="menu-active">
                  <span class="iconfont" style="font-size: 28px;">&#xe668;</span>
                </a> -->

                <?php
                  // 是首页
                  if(!$this->is('index')):
                ?>
                <a href="<?php $this->options->siteUrl(); ?>" class="item back">
                  <span class="iconfont" style="font-size: 20px;">&#xe60b; </span>
                </a>
                <?php endif; ?>

              </div>
              <div class="right">
                <a href="<?php $this->options->siteUrl(); ?>links.html" class="item">
                  <span class="iconfont" style="
                      font-size: 24px;
                      position: relative;
                  "></span>
                </a>
                <a href="javascript:;" class="item header-comment">
                  <span class="iconfont">&#xe607;</span>
                </a>
                <!-- <span class="iconfont">&#xe695;</span> -->
              </div>
            </div>
            <!-- 评论 -->
            <div class="header-comment-content">
              <div class="head">消息</div>
              <ul class="list">
                <?php $this->widget('Widget_Comments_Recent','ignoreAuthor=true')->to($comments); ?>
                <?php $i = 0;
                while ($i++ != 10 && $comments->next()): 
            ?>
                <li class="item">
                  <a class="item-content" href="<?php $comments->permalink(); ?>">
                    <div class="avatar">
                      <?php
                    $email = $comments->mail;
                    if(preg_match('|^[1-9]\d{4,10}@qq\.com$|i',$email)){
                        $qqnumber = explode("@",$email);
                        $avatar = '//q.qlogo.cn/g?b=qq&nk=' . $qqnumber[0]. '&s=100';
                        $avatar2x = '//q.qlogo.cn/g?b=qq&nk=' . $qqnumber[0]. '&s=160';
                    }else{
                        $avatar = 'https://gravatar.loli.net/avatar/' . md5(strtolower($comments->mail)) . '?s=80&r=X&d=mm';
                        $avatar2x = 'https://gravatar.loli.net/avatar/' . md5(strtolower($comments->mail)) . '?s=160&r=X&d=mm';
                    }
                    echo '<img src=' . $avatar . '>';
                  ?>
                    </div>
                    <div class="content">
                      <div class="title"><?php $comments->author(false); ?></div>
                      <div class="message f-thide">
                        <span>
                          <?php
                          echo get_commentReply_at($comments->coid);
                      ?>
                          <!-- 评论@ -->
                          <?php $cos = preg_replace('#</?[p|P][^>]*>#', '', $comments->content); echo $cos; ?>
                          <!-- 评论内容 -->
                        </span>
                      </div>
                    </div>
                  </a>
                </li>
                <?php endwhile; ?>
              </ul>
            </div>
          </header>

          <section class="mmui-user-card">
            <!-- <nav class="menu  overflow-x-auto" style="display: none">
              <ul class="menu-list">
                <li class="item">
                  <a href="<?php $this->options->siteUrl(); ?>">首页</a>
                </li>
                <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                <?php while($pages->next()): ?>
                <li class="item">
                  <a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>">
                    <?php $pages->title(); ?>
                  </a>
                </li>
                <?php endwhile; ?>
              </ul>
            </nav> -->
            <div class="mmui-bg" style="background-image: url(<?php $this->options->bannerUrl() ?>);">
              <div class="user">
                <div class="user-info">
                  <h2 class="name"><?php $this->options->nickname() ?></h2>
                  <a class="mdui-ripple" href="<?php $this->options->siteUrl(); ?>archives.html">
                    <img class="mdui-hoverable" src="<?php $this->options->logoUrl() ?>"
                      alt="<?php $this->options->title() ?>" />
                  </a>
                </div>
                <p class="desc"><?php $this->options->userdesc() ?></p>
              </div>
            </div>
          </section>
        </div>