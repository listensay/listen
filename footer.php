<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<footer id="footer" class="mdui-typo">
  <p>&copy; <?php echo date('Y'); ?> <a
      href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.</p>
  <div>
    <?php $this->options->footer() ?>
  </div>
</footer>
</div>
</div>
</div>

<style>
<?php $this->options->styles() ?>
</style>

<script src="<?php $this->options->themeUrl('/static/js/pjax.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('/static/js/nprogress.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('/static/js/fancybox.js'); ?>"></script>
<script>
$(document).pjax('a[href^="<?php Helper::options()->siteUrl()?>"]:not(a[target="_blank"], a[no-pjax])', {
  container: '.mmui-article-list',
  fragment: '.mmui-article-list',
  timeout: 8000
})
<?php $this->options->javascriptcode() ?>
</script>

<script type="module" src="<?php $this->options->themeUrl('/static/js/app.js'); ?>"></script>
<script>
$(document)
  .on('pjax:send', function() {
    //加载动画效果开始
    NProgress.start();
    ajaxNext()
    // ajaxcomments()
  }).on('pjax:complete', function() {
    //加载动画效果结束
    NProgress.done();
    // ajaxcomments()
    ajaxNext()
  }).on('pjax:end', function() {
    // pjax结束时运行代码
    $('.mmui-user-card .menu').fadeOut()
    $('.header-comment-content').fadeOut()
    // ajaxcomments()
  })
</script>

<?php $this->footer(); ?>
</body>

</html>