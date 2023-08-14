<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<main class="mmui-article-list">
  <div class="list">
    <?php while ($this->next()): ?>
    <div class="item">
      <?php if ($this->fields->articleType === 'say') { ?>
      <article class="article-cart">
        <div class="layout-left">
          <img src="<?php $this->options->logoUrl() ?>" alt="<?php $this->options->title() ?>" />
        </div>
        <div class="layout-right">
          <div class="author">
            <a href="JavaScript:;" class="name"><?php $this->author(); ?></a>
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
              <?php if($this->fields->banner) {?>
              <img src="<?php $this->fields->banner(); ?>">
              <?php } ?>
              <a class="title" href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
            </div>
          </div>
          <?php } ?>
          <div class="footer">
            <div class="time"><?php $this->date(); ?></div>
            <!-- TODO -->
            <!-- <div class="option">
                                    <a href="javascript:;" class="option-more">
                                     <i class="mdui-icon material-icons">··</i>
                                    </a>
                                   <div class="article-info">
                                       <div class="item">
                                            <i class="iconfont">&#xe663;</i>
                                            <span>1</span>
                                        </div>
                                       <div>|</div>
                                       <div class="item">
                                            <i class="iconfont">&#xe8b4;</i>
                                            <span>1</span>
                                        </div>
                                   </div>
                               </div> -->
          </div>
          <div class="article-comment">
            <?php articleComment( $this->cid ) ?>
          </div>
        </div>
      </article>
      <?php } ?>

      <?php if ($this->fields->articleType === 'sayTitleImg') { ?>
      <!-- TODO -->
      <article class="article-cart">
        <div class="layout-left">
          <img src="<?php $this->options->logoUrl() ?>" alt="<?php $this->options->title() ?>" />
        </div>
        <div class="layout-right">
          <div class="author">
            <a href="JavaScript:;" class="name"><?php $this->author(); ?></a>
          </div>
          <div class="article-content">
            <p><?php $this->excerpt(70, '...'); ?></p>
            <div class="article-content-pic">
              <?php 
                $array = get_postthumb($this);
                $length = count($array);

                if ($length === 2) {
                    $count = 0;
                    foreach ($array as $url) { 
                        echo '<a href="'.$url.'" class="article-content-pic-item" data-fancybox="gallery" style="width: 48.888%" /><img class="article-content-pic-item-photo" src="' .$url. '""></a>';
                        $count++;
                        if ($count >= 9) {
                            break;
                        }
                    }
                } else {
                    $count = 0;
                    foreach ($array as $url) { 
                        echo '<a href="'.$url.'" class="article-content-pic-item" data-fancybox="gallery" /><img class="article-content-pic-item-photo" src="' .$url. '""></a>';
                        $count++;
                        if ($count >= 9) {
                            break;  // 当计数器大于等于9时跳出循环
                        }
                    }
                }    
            ?>
            </div>
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
            <!-- TODO -->
            <!-- <div class="option">
                                    <a href="javascript:;" class="option-more">
                                     <i class="mdui-icon material-icons">··</i>
                                    </a>
                                   <div class="article-info">
                                       <div class="item">
                                            <i class="iconfont">&#xe663;</i>
                                            <span>1</span>
                                        </div>
                                       <div>|</div>
                                       <div class="item">
                                            <i class="iconfont">&#xe8b4;</i>
                                            <span>1</span>
                                        </div>
                                   </div>
                               </div> -->
          </div>
          <div class="article-comment">
            <?php articleComment( $this->cid ) ?>
          </div>
        </div>
      </article>
      <?php } ?>

    </div>
    <?php endwhile; ?>
  </div>
  <?php $this->pageLink('查看更多','next'); ?>

</main>

<?php $this->need('footer.php'); ?>