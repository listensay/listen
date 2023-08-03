<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<main class="mmui-article-list">
    <div class="list">
        <div class="item">
        <?php if ($this->have()): ?>
            <?php while ($this->next()): ?>
                <article class="article-cart">
                    <div class="layout-left">
                        <img src="<?php $this->options->logoUrl() ?>" alt="<?php $this->options->title() ?>"/>
                    </div>
                    <div class="layout-right mdui-typo">
                        <div class="author">
                            <a href="<?php $this->author->permalink(); ?>"
                               class="name"><?php $this->author(); ?></a>
                        </div>
                        <div class="article-content">
                            <?php $this->excerpt(300, '...'); ?>
                        </div>
                        <?php if ($this->fields->articleTitle == 1) { ?>
                            <div class="mdui-ripple">
                                <a class="title" href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
                            </div>
                        <?php } ?>
                        <div class="footer">
                            <div class="time"><?php $this->date(); ?></div>
                            <div class="option"><i class="mdui-icon material-icons">more_horiz</i></div>
                        </div>
                        <div class="article-comment">
                            <?php articleComment( $this->cid ) ?>
                        </div>
                    </div>
                </article>
            <?php endwhile; ?>
        <?php else: ?>
            <article class="post">
                <h2 class="post-title"><?php _e('没有找到内容'); ?></h2>
            </article>
        <?php endif; ?>

        <?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
        </div>
    </div>
</main><!-- end #main -->

<?php $this->need('footer.php'); ?>
