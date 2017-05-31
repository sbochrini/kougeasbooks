<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use  yii\helpers\Url;
use yii\web\UrlManager;

?>
<!--<div class="list-item">
    <div>
        <?php
/*        //if ($model->bk_image_web_filename!='')
        // echo '<a href="'.Url::toRoute(["site/bookview",'id' => $model->bk_id]).'"><img src="'.Yii::$app->homeUrl. 'img/'.$model->bk_image_web_filename.'" width="50px" height="auto"></a>'; else echo '<a href="#">no image</a>';
        */?>
        <div class="title"><?/*= Html::encode($model->bk_title) */?></div>
    </div>
</div>-->



    <!-- img -->
<!--    <div class="img">-->
       <!-- --><?php
/*        if ($model->bk_image_web_filename!='')
            echo '<a href="'.Url::toRoute(["site/bookview",'id' => $model->bk_id]).'"><img src="'.Yii::$app->homeUrl. 'img/'.$model->bk_image_web_filename.'"></a>'; else echo '<a href="#">'.Yii::$app->homeUrl.'pictures/no_image.png'.'</a>';
        */?>
   <!-- </div>-->
    <!-- data -->
    <!--<div class="block">
        <p class="title"><?/*= Html::encode($model->bk_title)*/?></p>
        <p class="theme">
            <span class="other">Other</span>
            <span class="group1">Group 1</span>
        </p>
    </div>-->
    <form>
        <label>items per page: </label>
        <select>
            <option>5</option>
            <option>10</option>
            <option>15</option>
        </select>
    </form>

    <!-- navigation holder -->
    <div class="holder"></div>

    <!-- item container -->
    <ul id="itemContainer">
            <?php
            foreach($books as $book):
                    if ($book->bk_image_web_filename!='')
                     echo '<li style="display: inline-block;"><a href="'.Url::toRoute(["site/bookview",'id' => $book->bk_id]).'"><img src="'.Yii::$app->homeUrl. 'img/'.$book->bk_image_web_filename.'"></a><div class="title">'.Html::encode($book->bk_title).'</div></li>'; else echo '<li style="display: inline-block"><img src="'.Yii::$app->homeUrl.'pictures/no_image.png"><div class="title">'.Html::encode($book->bk_title).'</div></li>';
                    ?>

        <?php endforeach; ?>

    </ul>

</div>

<!-- no results found
<div class="jplist-no-results">
    <p>No results found</p>
</div>-->