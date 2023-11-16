<?php

if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form)
{
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text(
        'logoUrl',
        null,
        null,
        '朋友圈头像地址'
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
        '用户背景图url'
    );
    $form->addInput($bannerUrl);
}

function themeFields($layout) {
    // 文章收缩
    $hiddenLine = new Typecho_Widget_Helper_Form_Element_Select('hiddenLine', array(
        0 => '隐藏',
        1 => '显示',
    ), 0,
        '是否显示文章收缩',
        '开启后在文章一部分内容开始收缩')
    ;
    $layout->addItem($hiddenLine);

    // 朋友圈九宫格模式
    $articleStyle = new Typecho_Widget_Helper_Form_Element_Select('articleStyle', array(
        'basic' => '普通文章风格',
        'imgGrid' => '朋友圈风格 (适合有图片的文章)'
    ), 'basic',
        '文章风格',
        '首页文章的样式风格')
    ;
    $layout->addItem($articleStyle);
}
