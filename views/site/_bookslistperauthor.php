<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use  yii\helpers\Url;
use yii\web\UrlManager;

?>
    <?php
    /*foreach($all_authors as $all_author):*/
    if(is_object($model)){
        echo '<li>'.Html::a($model->auth_name, ['booksperauthor', 'auth_id' => $model->auth_id]).'</li>';
    }else{
        echo '<li>'.Html::a($model['auth_name'], ['booksperauthor', 'auth_id' => $model['auth_id']]).'</li>';
    }

    /*endforeach;*/
    ?>
