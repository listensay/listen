<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<main class="mmui-article-list">
    <div class="list">
        <div>
            <div class="article-head">
                <?php
                if ($this->fields->banner) { ?>
                    <div class='banner' style='background-image: url(<?php $this->fields->banner(); ?>)'></div>
                <?php } ?>
                <div>
                    <h1 class="post-title" itemprop="name headline"><?php $this->title() ?></h1>
                    <ul class="post-meta">
                        <li>
                            <?php _e('作者: '); ?><a itemprop="name"
                                                     href="<?php $this->author->permalink(); ?>"
                                                     rel="author"><?php $this->author(); ?></a>
                        </li>
                        <li><?php _e('分类: '); ?><?php $this->category(','); ?></li>
                    </ul>
                </div>

            </div>
            <div class="post-content">
                <?php
                $pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i';
                $replacement = '<a href="$1" data-fancybox="gallery" /><img src="$1" alt="' . $this->title . '"></a>';
                $content = preg_replace($pattern, $replacement, $this->content);
                echo $content;
                ?>
            </div>
        </div>
        <?php $this->need('comments.php'); ?>

    </div>
</main>
<?php //$this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
