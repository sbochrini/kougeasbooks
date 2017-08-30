<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>
<div class="post">
    <h2><?= Html::encode($model->bk_title) ?></h2>
    <?php
    if ($model->bk_image_web_filename!='')
     echo '<img src="'.Yii::$app->homeUrl. 'img/'.$model->bk_image_web_filename.'" width="50px" height="auto">'; else echo 'no image';
    ?>
    <?= HtmlPurifier::process($model->bk_publisher) ?>
</div>