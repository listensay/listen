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
</script>
<script type="module" async src="<?php $this->options->themeUrl('/static/js/app.js'); ?>"></script>
<script>
<?php $this->options->javascriptcode() ?>
</script>


<?php $this->footer(); ?>
</body>

</html>