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

$this->params['breadcrumbs'][] = $category->cat_name;
?>
<div id="booklist" class="book-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div id="demo" class="box jplist" style="margin: 20px 0 50px 0">

        <!-- ios button: show/hide panel -->
        <div class="jplist-ios-button">
            <i class="glyphicon glyphicon-sort"></i>
            jPList Actions
        </div>

        <!-- panel -->
        <div class="jplist-panel box panel-top">

            <!-- items per page dropdown -->
            <div
                class="jplist-drop-down"
                data-control-type="items-per-page-drop-down"
                data-control-name="paging"
                data-control-action="paging">

                <ul>
                    <li><span data-number="3"> 3 per page </span></li>
                    <li><span data-number="5"> 5 per page </span></li>
                    <li><span data-number="10" data-default="true"> 10 per page </span></li>
                    <li><span data-number="all"> View All </span></li>
                </ul>
            </div>

            <!-- sort dropdown -->
            <div
                class="jplist-drop-down"
                data-control-type="sort-drop-down"
                data-control-name="sort"
                data-control-action="sort"
                data-datetime-format="{month}/{day}/{year}"> <!-- {year}, {month}, {day}, {hour}, {min}, {sec} -->

                <ul>
                    <li><span data-path="default">Sort by</span></li>
                    <li><span data-path=".title" data-order="asc" data-type="text">Title A-Z</span></li>
                    <li><span data-path=".title" data-order="desc" data-type="text">Title Z-A</span></li>
                </ul>
            </div>

            <!-- filter by title -->
            <div class="text-filter-box">

                <i class="glyphicon glyphicon-search  jplist-icon"></i>

                <!--[if lt IE 10]>
                <div class="jplist-label">Filter by Title:</div>
                <![endif]-->

                <input
                    data-path=".title"
                    type="text"
                    value=""
                    placeholder="Filter by Title"
                    data-control-type="textbox"
                    data-control-name="title-filter"
                    data-control-action="filter"
                />
            </div>

            <!-- pagination results -->
            <div
                class="jplist-label"
                data-type="Page {current} of {pages}"
                data-control-type="pagination-info"
                data-control-name="paging"
                data-control-action="paging">
            </div>

            <!-- pagination control -->
            <div
                class="jplist-pagination"
                data-control-type="pagination"
                data-control-name="paging"
                data-control-action="paging">
            </div>

        </div>
<!--    <div class="list box text-shadow">-->
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'options' => [
                'tag' => 'div',
                'class' => 'list box text-shadow',
                'id' => 'table-bookspercat',
            ],
            'layout' => "{summary}\n{items}\n{pager}",
            'itemView' => '_bookslistpercat',
            'pager' => [
                'firstPageLabel' => 'first',
                'lastPageLabel' => 'last',
                'nextPageLabel' => 'next',
                'prevPageLabel' => 'previous',
                'maxButtonCount' => 3,
            ],
        ]);
        ?>
<!--    </div>-->

</div>


