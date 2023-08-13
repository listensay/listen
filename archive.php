<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php
/**
 * 文章归档
 *
 * @package custom
 */
$this->need('header.php'); ?>
<main class="mmui-article-list">
  <div class="list">
    <div>
      <h1 class="post-title" itemprop="name headline"><?php $this->title() ?></h1>
      <div class="post-content">
        <?php 
            function postAllImgs($archive) {
                $pattern = '/<img[^>]*src=["\']?([^"\'>]*)["\']?[^>]*>/i';
                preg_match_all($pattern, $archive->content, $matches);
                return $matches[1]; // 返回所有匹配项，是一个数组
            }
            function imagesNum($imgs) {
                if ($imgs >= 5) {
                    return 4;
                }
                return $imgs;
            }
        $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives);
            $year=0; $mon=0; $i=0; $j=0;
            $output = '<div class="archives">';
            while($archives->next()):
                $year_tmp = date('Y',$archives->created);
                $mon_tmp = date('m',$archives->created);
                $y=$year; $m=$mon;   
                if ($mon != $mon_tmp && $mon > 0) $output .= '</ul></li>';
                if ($year != $year_tmp && $year > 0) $output .= '</ul>';
                if ($year != $year_tmp) {   
                    $year = $year_tmp;   
                    $output .= '<h3 class="archives-year">'. $year .' 年</h3><ul class="archives-list">'; //输出年份   
                }
                if ($mon != $mon_tmp) {
                    $mon = $mon_tmp;
                    $output .= '<li class="archives-item"><ul class="archives-list">'; //输出月份   
                }
                $imgs = postAllImgs($archives);
                if(count($imgs) > 0){
                    // 文章有图片
                    $output .= '
                    <li class="archive-item">
                        <a href="'.$archives->permalink .'">
                            <div class="timer">
                                <span class="day">'.date('d',$archives->created).'</span><span class="month">'. $mon .'月</span>
                            </div>
                            <div class="photo">
                                <div class="photo-container photo-' .imagesNum(count($imgs)). '">';
                                    $i = 0;
                                    foreach($imgs as $img) {
                                        $i++;
                                        if($i >= 5) {
                                            break;
                                        }
                                        $output.='
                                            <div class="photo-item imgWrap">
                                                <img class="scale" src="'.$img.'" />
                                            </div>
                                        ';
                                    }
                                    $output .= '
                                </div>
                            </div>
                            <div class="info">
                                <p>'. mb_substr(strip_tags($archives->content), 0, 50, 'utf-8') .'...</p>
                                <span>共 '.count($imgs).' 张</span>
                            </div>
                            </a>
                        </li>
                    ';
                } else {
                    // 文章无图片
                        $output .='
                        <li class="archive-item">
                            <a href="'.$archives->permalink .'">
                                <div class="timer">
                                    <span class="day">'.date('d',$archives->created).'</span><span class="month">'. $mon .'月</span>
                                </div>
                                <div class="text">'. mb_substr(strip_tags($archives->content), 0, 50, 'utf-8') .'...</div>
                            </a>
                        </li>';
                    }
            endwhile;   
            $output .= '</ul></li></ul></div>';   
            echo $output;   
        ?>
      </div>
    </div>
    <?php $this->need('comments.php'); ?>
  </div>
</main>

<?php $this->need('footer.php'); ?>