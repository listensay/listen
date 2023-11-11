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
