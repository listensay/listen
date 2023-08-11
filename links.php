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
                        <span class="desc">{description}</span>
                        </div>
                    </div>
                </li>
            </a>
eof;
            Links_Plugin::output($mypattern, 0, "");
            ?>
        </ul>
      </div>
    </div>
    <?php $this->need('comments.php'); ?>
  </div>
</main>


<?php $this->need('footer.php'); ?>