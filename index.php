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
$this->need('header.php');
?>
<main class="mmui-article-list">
    <div class="list">
        <?php while ($this->next()): ?>
            <div class="item">
                <?php if ($this->fields->articleType === 'say') { ?>
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
                                <?php
                                    $pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i';
                                    $replacement = '<a href="$1" data-fancybox="gallery" /><img src="$1" alt="' . $this->title . '"></a>';
                                    $content = preg_replace($pattern, $replacement, $this->content);

                                    $explode = explode('<!--more-->', $content);
                                    echo $explode[0];
                                ?>
                            </div>
                            <div class="article-tag"><?php $this->tags(' ', true); ?></div>
                            <?php if ($this->fields->articleTitle == 1) { ?>
                                <div class="mdui-ripple">
                                    <div class="article-blog-basics">
                                        <?php
                                        if($this->fields->banner) {?>
                                            <img src="<?php $this->fields->banner(); ?>">
                                        <?php } ?>
                                        <a class="title" href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="footer">
                                <div class="time"><?php $this->date(); ?></div>
                            </div>
                            <div class="article-comment">
                                <?php articleComment( $this->cid ) ?>
                            </div>
                        </div>
                    </article>
                <?php } ?>

                <?php if ($this->fields->articleType === 'sayTitleImg') { ?>
                <!-- 没想清楚这么设计这个样式                    -->
                <?php } ?>

            </div>
        <?php endwhile; ?>
        <?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
    </div>
</main>
<?php //$this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
