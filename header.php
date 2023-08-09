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
    <div id="app" class="mmui shadow-md" style="width: <?php $this->options->themeWidth() ?>px">
        <!-- 状态栏 -->
        <div class="mmui-conainer">
            <div class="header-container">
                <header class="header-bar">
                    <div class="layout">
                        <div class="left">
                            <a href="javascript:;"  id="menu-active"><span class="iconfont" style="font-size: 28px;">&#xe668;</span></a>
                        </div>
                        <div class="right">
                            <span class="iconfont">&#xe7e2;</span>
                            <span class="iconfont">&#xe695;</span>
                        </div>
                    </div>
                </header>
                <section class="mmui-user-card">
                    <nav class="menu  overflow-x-auto" style="display: none">
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
                    </nav>
                    <div class="mmui-bg" style="background-image: url(<?php $this->options->bannerUrl() ?>);">
                        <div class="user">
                            <div class="user-info">
                                <h2 class="name"><?php $this->options->nickname() ?></h2>
                                <a class="mdui-ripple" href="<?php $this->options->siteUrl(); ?>">
                                    <img class="mdui-hoverable" src="<?php $this->options->logoUrl() ?>"
                                         alt="<?php $this->options->title() ?>"/>
                                </a>
                            </div>
                            <p class="desc"><?php $this->options->userdesc() ?></p>
                        </div>
                    </div>
                </section>
            </div>
