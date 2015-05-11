<?php
use almagest\gong\widgets\PostCard;
use almagest\gong\widgets\PostList;
use yii\helpers\Url;
/* @var $this yii\web\View */
$this->title = 'Media';

echo PostList::widget(['url'=>Url::to(['gong/site/post'])]);
?>
