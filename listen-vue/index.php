<?php

/**
 * 这是 Typecho 0.9 系统的一套默认皮肤
 * 
 * @package Yuna
 * @author moz
 * @version 1.0
 * @link https://www.npmrundev.com
 */

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>hello-world</title>
  <link rel="shortcut icon" href="<?php $this->options->themeUrl('favicon.ico'); ?>" type="image/x-icon">
  <link rel="stylesheet" href="<?php $this->options->themeUrl(''); ?>">
</head>

<body>
  <noscript>
    <strong>We're sorry but hello-world doesn't work properly without JavaScript
      enabled. Please enable it to continue.</strong>
  </noscript>
  <div id="app"></div>
</body>
<script src="https://cdn.bootcss.com/vue/2.6.10/vue.min.js"></script>
<script src="https://cdn.bootcss.com/vue-router/3.1.3/vue-router.min.js"></script>
<script src="<?php $this->options->themeUrl('listen-vue.js?60147041b3108fb0232b'); ?>"></script>

</html>