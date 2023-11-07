<?php
/**
 * 朋友圈主题啦！
 *
 * @package Typecho 朋友圈主题
 * @author 星期四
 * @version 2.1.0
 * @link http://blog.200205.net
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>listen-blog</title>
  <link rel="shortcut icon" href="<?php $this->options->themeUrl('<%= htmlWebpackPlugin.files.favicon %>'); ?>" type="image/x-icon">
  <link rel="stylesheet" href="<?php $this->options->themeUrl('<%= htmlWebpackPlugin.files.css %>'); ?>">
</head>

<body>
  <noscript>
    <strong>We're sorry but hello-world doesn't work properly without JavaScript
      enabled. Please enable it to continue.</strong>
  </noscript>
  <div id="app"></div>
</body>

<script src="<?php $this->options->themeUrl('<%= htmlWebpackPlugin.files.chunks.main.entry %>'); ?>"></script>

</html>