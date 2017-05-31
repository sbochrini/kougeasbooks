<?php
/**
 * Created by PhpStorm.
 * User: Voula
 * Date: 20/4/2017
 * Time: 2:52 μμ
 */

use yii\helpers\Html;
use yii\widgets\ListView;

/*use app\assets\BooklistAsset;
BooklistAsset::register($this);*/

/* @var $this yii\web\View */
/* @var $searchModel app\models\BookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->params['breadcrumbs'][] = $category->cat_name;
?>
<div id="booklist" class="book-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_bookslistpercat',[
        'category'=>$category,
        'books' => $books,
        'dataProvider'=>$dataProvider,
    ]); ?>

</div>