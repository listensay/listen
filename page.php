<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<main class="mmui-article-list">
    <div class="list">
        <div>
            <h1 class="post-title" itemprop="name headline"><?php $this->title() ?></h1>
            <div class="post-content mdui-typo">
                <?php $this->content(); ?>
            </div>
        </div>
        <?php $this->need('comments.php'); ?>
    </div>
</main>

<?php $this->need('footer.php'); ?>
