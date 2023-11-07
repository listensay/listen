<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form)
{
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text(
        'logoUrl',
        null,
        null,
        '朋友圈头像地址',
        '默认：/usr/themes/listen/static/images/tx.jpg'
    );
    $form->addInput($logoUrl);

    $nickname = new Typecho_Widget_Helper_Form_Element_Text(
        'nickname',
        null,
        null,
        '昵称',
        '比如: 星期四'
    );
    $form->addInput($nickname);

    $userdesc = new Typecho_Widget_Helper_Form_Element_Text(
        'userdesc',
        null,
        null,
        '个性签名',
        '比如: 每个人都有一片属于自己的森林'
    );
    $form->addInput($userdesc);

    $bannerUrl = new Typecho_Widget_Helper_Form_Element_Text(
        'bannerUrl',
        null,
        null,
        '用户背景图url',
        '默认：/usr/themes/listen/static/images/pic1.jpeg'
    );
    $form->addInput($bannerUrl);

    $themeWidth = new Typecho_Widget_Helper_Form_Element_Text(
        'themeWidth',
        null,
        null,
        '主题宽度',
        '默认宽度：600, 默认是px单位，所以不要要输入单位'
    );
    $form->addInput($themeWidth);

    $footer = new Typecho_Widget_Helper_Form_Element_Textarea(
        'footer',
        null,
        null,
        '自定义底部'
    );
    $form->addInput($footer);

    $styles = new Typecho_Widget_Helper_Form_Element_Textarea(
        'styles',
        null,
        null,
        '自定义CSS'
    );
    $form->addInput($styles);

    $javascriptcode = new Typecho_Widget_Helper_Form_Element_Textarea(
        'javascriptcode',
        null,
        null,
        '自定义JavaScript'
    );
    $form->addInput($javascriptcode);
}

function themeFields($layout) {
    // 文章style
    $articleType= new Typecho_Widget_Helper_Form_Element_Select('articleType',array(
        'say' => '默认样式（文章+标题）',
        'sayTitleImg' => '九宫格样式',
    ), '0','文章类型','文章Style');
    $layout->addItem($articleType);

    // 文章title
    $articleTitle = new Typecho_Widget_Helper_Form_Element_Select('articleTitle', array(
        1 => '显示',
        0 => '隐藏',
    ), 1,
        '文章是否显示title',
        '开启后在文章描述后面加一个文章标题')
    ;
    $layout->addItem($articleTitle);

    $banner = new Typecho_Widget_Helper_Form_Element_Text('banner', NULL, NULL,_t('文章头图'), _t('输入一个图片 url，作为缩略图显示在文章列表，没有则不显示'));
    $layout->addItem($banner);

}

//评论添加回复@标记
function get_commentReply_at($coid)
{
    $db   = Typecho_Db::get();
    $prow = $db->fetchRow($db->select('parent')->from('table.comments')
        ->where('coid = ? AND status = ?', $coid, 'approved'));
    $parent = $prow['parent'];
    if ($parent != "0") {
        $arow = $db->fetchRow($db->select('author')->from('table.comments')
            ->where('coid = ? AND status = ?', $parent, 'approved'));
        $author = $arow['author'];
        $href   = '@' . $author . ': ';
        return $href;
    }
}

/**
 * 获取文章图片
 * https://www.typecho.wiki/1770.html
 */
function get_postthumb($thumbThis)
{
    preg_match_all( "/<[img|IMG].*?src=[\'|\"](.*?)[\'|\"].*?[\/]?>/", $thumbThis->content, $matches );  //通过正则式获取图片地址
    if(isset($matches[1][0])){
        return $matches[1];
    }
}

// 获取评论信息
function articleComment($article_id) {
    $db = Typecho_Db::get();
    $query= $db->select('author','text','url', 'coid')->from('table.comments')->where('cid = ?', $article_id)->limit(6);
    $result = $db->fetchAll($query);

    $query= $db->select('author','text','url')->from('table.comments')->where('cid = ?', $article_id);
    $counter = $db->fetchAll($query);

    if (sizeof($counter) != '0') {
        echo '<div class="comment-item" style="border-bottom: 1px solid #e1e1e1;"> 共有<a>'. sizeof($counter) .'</a>条评论 </div>';
    }

    foreach ($result as $val){
        echo '
        <div class="comment-item">
            <a href="' . $val['url'] . '" target="_black">' . $val['author'] . '</a>： <span class="f-thide">'. get_commentReply_at($val['coid']) .' ' . $val['text'] . '</span>
        </div>';
    }
}
