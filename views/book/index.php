<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use \yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Κατάλογος Βιβλίων';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-header">
       <div class="row">
           <div class="col-md-6"><h3><?= Html::encode($this->title) ?></h3></div>
            <?php echo '<div class="col-md-6"><div class="pull-right"> <h3>'.Html::a('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Προσθήκη νέου βιβλίου', ['create'], ['class' => 'btn btn-info']).'</h3></div></div>'; ?>
       </div>
</div>
<?php
//echo '<div class="row"><h3>'.Html::encode($this->title).'</h3>';
/*echo '<div class="pull-right">';
echo '<p>'.Html::a('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Προσθήκη νέου βιβλίου', ['create'], ['class' => 'btn btn-info']).'</p>';
echo '</div></div>';*/

//echo '<ul class="nav nav-pills nav-justified">';

echo '<div class="row cat_checkboxes">';
    echo '<div class="col-sm-3">';
        $form = ActiveForm::begin([
                'options'=>['enctype'=>'multipart/form-data'],
                'id' => 'update_booklist_form',
                'method'=>'get'
                //'name'=>'book_form'
            ]);
           /* if(is_null($checked_cats)){
                echo $form->field($cat, 'cat_id')->checkboxList($cat_items,['separator' => '<br>']);
            }else{
                $cat->cat_id=$checked_cats;
                echo $form->field($cat, 'cat_id')->checkboxList($cat_items,['separator' => '<br>']);
            }*/

            echo '<div class="form-group field-bookcategory-cat_id">';
            echo '<label class="control-label">Κατηγορίες</label>';
           // echo '<input name="BookCategory[cat_id]" value="" type="hidden">';
            echo '<div id="bookcategory-cat_id">';
            foreach($cats as $category):
                $checked="";
                if(!is_null($checked_cats) && in_array($category->cat_id, $checked_cats)){
                    $checked="checked";
                }
                echo '<label><input id="cat_'.$category->cat_id.'" name="BookCategory[cat_id][]" value="'.$category->cat_id.'" type="checkbox" '.$checked.'> '.$category->cat_name.'</label><br>';
                if(!is_null($checked_cats)){
                    if($category->cat_subcat==1 && in_array($category->cat_id, $checked_cats)){
                        echo '<div id="checkboxes_'.$category->cat_id.'" class="div_subcat_checkboxes">';
                        echo '<div class=" field-book-bk_subcat_id">';//$html.= '<label class="control-label">Ομαδοποίηση</label>'; form-group
                       // echo '<input name="Book[bk_subcat_id]" value="" type="hidden">';
                        echo '<div id="book-bk_subcat_id">';
                        foreach($category->subcategories as $subcategory ):
                            $subcat_checked="";
                            if(!is_null($checked_subcats) && in_array($subcategory->subcat_id, $checked_subcats)){
                                $subcat_checked="checked";
                            }
                            echo '<label><input id="subcat_'.$subcategory->subcat_id.'" name="Book[bk_subcat_id][]" value="'.$subcategory->subcat_id.'" type="checkbox" '.$subcat_checked.'> '.$subcategory->subcat_name.'</label><br>';
                        endforeach;
                        echo '</div>';
                        echo '<div class="help-block"></div>';
                        echo '</div>';
                        echo '</div>';
                    }
                }
            endforeach;
            echo '</div>'; //bookcategory-cat_id
            echo '<div class="help-block"></div>';
            echo '</div>'; //field-bookcategory-cat_id


            /*echo '<div class="form-group field-book-bk_grouping">';
            echo '<label class="control-label">Ομαδοποίηση</label>';
            echo '<input name="Book[bk_grouping]" value="" type="hidden">';
            echo '<div id="book-bk_grouping">';
                foreach($bk_grouping_items as $bk_grouping_item):
                    $checked="";
                    if(!is_null($checked_groupings) && in_array($bk_grouping_item->bk_grouping, $checked_groupings)){
                        $checked="checked";
                    }
                    echo '<label><input id="'.$bk_grouping_item->bk_cat_id.'" name="Book[bk_grouping][]" value="'.$bk_grouping_item->bk_grouping.'" type="checkbox"'.$checked.'> '.$bk_grouping_item->bk_grouping.'</label><br>';
                endforeach;
            echo '</div>'; //d="book-bk_grouping"
            echo '<div class="help-block"></div>';
            echo '</div>'; //field-book-bk_grouping*/

            echo '<div class="col-sm-5"><button type="reset" class="btn btn-danger" onClick="window.location.href =\''.Url::toRoute('book/index').'\'">Εκκαθάριση</button></div>';
            echo '<div class="col-sm-5">'.Html::submitButton('Ανανέωση', ['class' =>  'btn btn-info', 'id'=>'update_booklist']).'</div>';
        ActiveForm::end();

$hidden_cats=(!is_null($checked_cats))?implode(",",$checked_cats):"";
//$hidden_groupings=(!is_null($checked_groupings))?implode(",",$checked_groupings):"";
$hidden_subcats=(!is_null($checked_subcats))?implode(",",$checked_subcats):"";

    echo '</div>'; //col-sm-3
    echo '<div class="col-sm-9">';
    //$visible=($category->cat_subcat==1)?true:false;
    echo  GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'filterUrl' =>['index','BookSearch[bk_cat_id]' => $hidden_cats,'BookSearch[bk_subcat_id]'=>$hidden_subcats],
        'summary' => "Εμφάνιση {begin} - {end} από {totalCount} βιβλία",
        'emptyText' => 'Δεν υπάρχουν αποτελεσματα!',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'image',
                //'contentOptions'=>['class'=>"img-rounded"],
                'format' => 'raw',
                'value' => function ($model) {
                    if ($model->bk_image_web_filename!='')
                        return '<img class="img-rounded" src="'.Yii::$app->homeUrl. 'img/'.$model->bk_image_web_filename.'" width="50px" height="auto">'; else return '<img src="'.Yii::$app->homeUrl. 'pictures/no_image.jpg" width="50px" height="auto">';
                },
            ],
            [
                'attribute' => 'bk_title',
                'value' => 'bk_title',
                'contentOptions'=>['style'=>'width: 40%;'],
                'filterInputOptions' => [
                    'id' => 'bk_filter_input',
                    'class'=>"form-control",
                ]
            ],
            [
                'label'=>'Συγγραφέας',
                'attribute' => 'author_name',
                'format' => 'html',
                //'value' => 'bkAuthor.auth_name',
                'value' =>function ($model) {
                    if (!is_null($model->bk_author_id)){
                        return $model->bkAuthor['auth_name'];
                    }else{
                        return '<span class="not-set">Δεν έχει οριστεί</span>';
                    }
                },
                'filterInputOptions' => [
                    'id' => 'bk_filter_input',
                    'class'=>"form-control",
                ],
            ],
            [
                'label'=>'Κατηγορία',
                'attribute' => 'bk_cat_id',
                'value' => 'bk_cat_id',
                'filterInputOptions' => [
                    'class'=>"form-control",
                    'id' => 'bk_filter_input',
                    'value'=>$hidden_cats,
                ],

            ],

            [
                'label'=>'Υποκατηγορία',
                'attribute' => 'bkSubcat.subcat_name',
                'format' => 'html',
                'value' =>function ($model) {
                    if (!is_null($model->bk_subcat_id)){
                        return $model->bkSubcat['subcat_name'];
                    }else{
                        return '<span class="not-set">Δεν έχει οριστεί</span>';
                    }
                },
            ],
            [
                'label'=>'Ομαδοποίηση',
                'attribute' => 'bk_grouping',
                'format' => 'html',
                'value' =>function ($model) {
                    if (!is_null($model->bk_grouping)){
                        return $model->bk_grouping;
                    }else{
                        return '<span class="not-set">Δεν έχει οριστεί</span>';
                    }
                },
            ],
            [
                'label'=>'Τιμή',
                'attribute' => 'bk_price',
                'format' => 'html',
                'value' =>function ($model) {
                    if (!is_null($model->bk_price)){
                        return $model->bk_price;
                    }else{
                        return '<span class="not-set">Μη διαθέσιμο</span>';
                    }
                },
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {favorite}',
                'buttons' => [
                    'delete' => function($url, $model){
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->bk_id], [
                            'class' => '',
                            'data' => [
                                'confirm' => 'Ειστε σίγουρος ότι θέλετε να διαγράψετε το βιλίο: '.$model->bk_title.';',
                                'method' => 'post',
                            ],
                        ]);
                    },
                    'favorite' => function ($url, $model, $key) {
                        if($model->bk_favorite==0){
                            return Html::tag('a','<i class="fa fa-heart-o fa-lg" aria-hidden="true"></i>', ['update', 'id'=>$model->bk_id]);
                        }elseif ($model->bk_favorite==1){
                            return Html::tag('a','<i class="fa fa-heart fa-lg" aria-hidden="true"></i>', ['update', 'id'=>$model->bk_id]);
                        }

                    },
                ],
            ],

        ],
        'tableOptions' => ['class' => 'table table-hover table-striped table-bordered'],
    ]);

    echo '<form id="hidden_form" method="get">';
        echo '<input class="form-control" name="BookSearch[bk_cat_id]" type="hidden" value="'.$hidden_cats.'">';
        echo '<input class="form-control" name="BookSearch[bk_grouping]" type="hidden" value="'.$hidden_subcats.'">';
    echo '</form>';
    echo '</div>'; //col-sm-9
echo '</div>'; //row
?>
<div class="div_sucat_checkboxes"> </div>