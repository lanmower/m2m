<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use m2m\assets\AppAsset;
use m2m\widgets\Alert;
use yii\base\View;
use almagest\gong\widgets\WidgetList;
use polymer\widgets\CoreScaffold;
use polymer\widgets\CoreHeaderPanel;
use polymer\widgets\CoreMenu;
use polymer\widgets\CoreItem;
use polymer\widgets\CoreToolbar;
use almagest\gong\components\DynamicRecord;
use almagest\gong\widgets\FileUploader;

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
    <?php
				CoreScaffold::begin ( [ 
						'tool' => FileUploader::widget ( [ 
								'name' => 'DynamicRecord[file][]',
								'url' => [ 
										'' 
								],
								'gallery' => false,
								'id' => 'uploader',
								'fieldOptions' => [ 
										'accept' => 'image/*' 
								],
								'clientOptions' => [ 
										'maxFileSize' => 4294967296,
										'autoUpload' => true,
										'sequentialUploads' => true 
								],
								'clientEvents' => [
										// 'fileuploaddone' => 'function(e, data) {
										// console.log(e);
										// console.log(data);
										// }',
										'fileuploadfail' => 'function(e, data) {
                                    console.log(e);
                                    console.log(data);
                                }' 
								] 
						] ),
						'_contents' => $content 
				] );
				CoreHeaderPanel::begin ();
				echo CoreToolbar::widget ( [ ] );
				CoreMenu::begin ();
				echo CoreItem::widget ( [ 
						'icon' => 'home',
						'label' => 'Home',
						'url' => '/' 
				] );
				$controllers = DynamicRecord::forTable ( 'backend_controller' )->find ()->all();
				foreach ( $controllers as $controller ) {
					if ($controller->menu_link) {
						echo CoreItem::widget ( [ 
								'icon' => $controller->icon,
								'label' => \yii\helpers\Inflector::titleize ( basename ( $controller->path ) ),
								'url' => $controller->path . '/' . $controller->menu_link 
						] );
					}
				}
				CoreMenu::end ();
				CoreHeaderPanel::end ();
				
				CoreScaffold::end ();
				?>
	<?php $this->endBody()?>
</body>
</html>
<?php $this->endPage()?>
