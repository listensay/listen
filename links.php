<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php
/**
 * 友情链接
 *
 * @package custom
 *
 */
$this->need('header.php');
?>

<main class="mmui-article-list">
    <div class="list">
        <div>
            <h1 class="post-title" itemprop="name headline"><?php $this->title() ?></h1>
            <div class="post-content">
                <?php $this->content(); ?>
                <ul class="links">
                    <?php
                    $mypattern = <<<eof
                    <a href="{url}" target="_blank" >
                        <li class="item">
                            <div class="mdui-list-item-avatar">
                              <img src="{image}"/>
                            </div>
                            <div class="mdui-list-item-content">
                              <div class="mdui-list-item-title">{name}</div>
                              <div class="mdui-list-item-text mdui-list-item-one-line">
                                <span class="mdui-text-color-theme-text">{description}</span>
                              </div>
                            </div>
                        </li>
                    </a>
eof;
                    Links_Plugin::output($mypattern, 0, "");
                    ?>
                </ul>
                <style>
                    .post-content .links a:hover {
                        text-decoration: none
                    }

                    .post-content .links {
                        margin: 0;
                        padding: 0;
                        list-style-type: none
                    }

                    .post-content .links .item {
                        display: flex;
                        align-items: center;
                        margin-bottom: 10px;
                        padding: 10px;
                        transition: 1.1s all;
                    }

                    .post-content .links .item:hover{
                        background-color: #fff3f3;
                        border-radius: 4px;
                    }

                    .post-content .links .item .mdui-list-item-avatar {
                        width: 48px;
                        margin-right: 10px
                    }

                    .post-content .links .item .mdui-list-item-avatar img{
                        width: 100%;
                        border-radius: 50%
                    }

                </style>
            </div>
        </div>
        <?php $this->need('comments.php'); ?>
    </div>
</main>


<?php $this->need('footer.php'); ?>

