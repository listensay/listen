<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form)
{
    $logoUrl = new \Typecho\Widget\Helper\Form\Element\Text(
        'logoUrl',
        null,
        null,
        '朋友圈头像地址',
        '默认：/usr/themes/pyq/static/images/tx.jpg'
    );
    $form->addInput($logoUrl);
}

function themeFields($layout) {
    // 文章style
    $articleType= new Typecho_Widget_Helper_Form_Element_Select('articleType',array(
        'say' => '默认样式（文章+标题）',
        'sayTitleImg' => '文章+(title + 图文)',
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
            <a href="' . $val['url'] . '" target="_black">' . $val['author'] . '</a>&nbsp;&nbsp;<span>'. get_commentReply_at($val['coid']) .' ' . $val['text'] . '</span>
        </div>';
    }
}
