<?php
/**
 * Typecho 个人圈子风格主题
 *
 * @package listen-vue
 * @author 星期四
 * @version 0.0.5
 * @link http://blog.200205.net
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?> <!doctype html><html lang=""><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"> <?php $this->header(); ?> <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0"><link rel="icon" href="/usr/themes/listen-vue/favicon.ico"><title> <?php $this->archiveTitle([
          'category' => _t('分类 %s 下的文章'),
          'search' => _t('包含关键字 %s 的文章'),
          'tag' => _t('标签 %s 下的文章'),
          'author' => _t('%s 发布的文章')
      ], '', ' - '); ?> <?php $this->options->title(); ?> </title><script defer="defer" src="/usr/themes/listen-vue/js/chunk-vendors.bf7cb383.js"></script><script defer="defer" src="/usr/themes/listen-vue/js/index.c88a097b.js"></script><link href="/usr/themes/listen-vue/css/chunk-vendors.67a2fae0.css" rel="stylesheet"><link href="/usr/themes/listen-vue/css/index.65e26a02.css" rel="stylesheet"></head><body><noscript><strong>We're sorry but listen-vue-dev doesn't work properly without JavaScript enabled. Please enable it to continue.</strong></noscript><div id="app"></div></body></html>