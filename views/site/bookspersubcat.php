<?php
/**
 * Created by PhpStorm.
 * User: Voula
 * Date: 20/4/2017
 * Time: 2:52 μμ
 */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);


    echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_bookslistpersubcat',
    ]);
    ?>
</div>
