<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use m2m\assets\AppAsset;
use m2m\widgets\Alert;
use yii\base\View;
use almagest\gong\widgets\WidgetList;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register ( $this );
?>
<?php $this->beginPage()?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
<meta charset="<?= Yii::$app->charset ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags()?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head()?>
</head>
<body unresolved>
    <?php $this->beginBody()?>
<?php echo $content;?>

    <?php $this->endBody()?>
</body>
</html>
<?php $this->endPage()?>
