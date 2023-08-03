<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<footer id="footer" class="mdui-typo">
    <p>&copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>">星期四Blog</a>.</p>
    <div><a class="text hover-underline" href="https://icp.gov.moe/?keyword=200205" target="_blank">萌ICP备200205号</a>
    </div>
</footer>
</div>
</div>
</div>

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
<script src="<?php $this->options->themeUrl('/static/js/app.js'); ?>"></script>

<?php $this->footer(); ?>
</body>
</html>
