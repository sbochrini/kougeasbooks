<?php
/**
 * Created by PhpStorm.
 * User: Voula
 * Date: 20/4/2017
 * Time: 2:52 μμ
 */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->params['breadcrumbs'][] = ['label' => $subcategory->subcatCat['cat_name'], 'url' => ['bookspercat','id'=>$subcategory->subcat_cat_id]];
$this->params['breadcrumbs'][] = $subcategory->subcat_name;
?>
<div id="booklist" class="book-index">
    <div class="row">
        <div class="col-sm-12">
            <div class="features_items"><!--features_items-->
                <h2 class="title text-center"><?php echo $subcategory->subcat_name; ?></h2>
                <div class="box">
                    <div class="center">
                        <div id="demo" class="box jplist" style="margin: 0px 0px 50px 0px">

                            <!-- ios button: show/hide panel -->
                            <div class="jplist-ios-button">
                                <i class="fa fa-sort"></i>
                                Φίλτρα αναζήτησης
                            </div>


                            <!-- panel -->
                            <div class="jplist-panel box panel-top" style="margin: 0px 0px 0px 15px">
                                <div class="row">

                                    <!-- back button button -->
                                    <!--<button
                                            type="button"
                                            data-control-type="back-button"
                                            data-control-name="back-button"
                                            data-control-action="back-button">
                                        <i class="fa fa-arrow-left"></i> Πίσω
                                    </button>-->

                                    <!-- reset button -->
                                    <!--<button
                                            type="button"
                                            class="back-button"
                                            data-control-type="reset"
                                            data-control-name="reset"
                                            data-control-action="reset">
                                        <i class="fa fa-undo"></i> Αρχικές ρυθμίσεις
                                    </button>-->


                                    <!-- sort dropdown -->
                                    <div
                                            class="jplist-drop-down"
                                            data-control-type="sort-drop-down"
                                            data-control-name="sort"
                                            data-control-action="sort"
                                            data-datetime-format="{year}"> <!-- {year}, {month}, {day}, {hour}, {min}, {sec} -->

                                        <ul>
                                            <li><span data-path=".title" data-order="asc" data-type="text" data-default="true"><i class="fa fa-sort-alpha-asc"></i>  Τίτλος</span></li>
                                            <li><span data-path=".title" data-order="desc" data-type="text"><i class="fa fa-sort-alpha-desc"></i>  Τίτλος</span></li>
                                            <li><span data-path=".author" data-order="asc" data-type="text"><i class="fa fa-sort-alpha-asc"></i>  Συγγραφέας</span></li>
                                            <li><span data-path=".author" data-order="desc" data-type="text"><i class="fa fa-sort-alpha-desc"></i>  Συγγραφέας</span></li>
                                            <!--
                                            <li><span data-path=".publisher" data-order="asc" data-type="text"><i class="fa fa-sort-alpha-asc"></i>  Εκδότης</span></li>
                                            <li><span data-path=".publisher" data-order="desc" data-type="text"><i class="fa fa-sort-alpha-desc"></i>  Εκδότης</span></li>
                                            -->
                                            <li><span data-path=".year" data-order="asc" data-type="number"><i class="fa fa-sort-numeric-asc"></i> Χρονολογία</span></li>
                                            <li><span data-path=".year" data-order="desc" data-type="number"><i class="fa fa-sort-numeric-desc"></i> Χρονολογία</span></li>
                                            <li><span data-path=".price" data-order="asc" data-type="number"><i class="fa fa-sort-amount-asc"></i>  Τιμή</span></li>
                                            <li><span data-path=".price" data-order="desc" data-type="number"><i class="fa fa-sort-amount-desc"></i>  Τιμή</span></li>
                                        </ul>
                                    </div>


                                    <!-- jQuery UI range slider -->
                                    <!-- priceSlider and priceValues are user function defined in jQuery.fn.jplist.settings -->
                                    <!--div
                                            class="jplist-range-slider"
                                            data-control-type="range-slider"
                                            data-control-name="range-slider-price"
                                            data-control-action="filter"
                                            data-path=".price .val"
                                            data-slider-func="priceSlider"
                                            data-setvalues-func="priceValues">

                                        <div class="value" data-type="prev-value"></div>
                                        <div class="ui-slider" data-type="ui-slider"></div>
                                        <div class="value" data-type="next-value"></div>
                                    </div-->
                                    <!--/div>

                                    <div class="row"-->

                                    <!-- filter by book title -->
                                    <div class="text-filter-box">

                                        <i class="fa fa-search  jplist-icon"></i>

                                        <!--[if lt IE 10]>
                                        <div class="jplist-label">Filter by Title:</div>
                                        <![endif]-->

                                        <input
                                                data-path=".title"
                                                type="text"
                                                value=""
                                                placeholder="Τίτλος"
                                                data-control-type="textbox"
                                                data-control-name="title-filter"
                                                data-control-action="filter"
                                        />
                                    </div>

                                    <!-- filter by book author -->
                                    <div class="text-filter-box">

                                        <i class="fa fa-search  jplist-icon"></i>

                                        <!--[if lt IE 10]>
                                        <div class="jplist-label">Filter by Description:</div>
                                        <![endif]-->

                                        <input
                                                data-path=".author"
                                                type="text"
                                                value=""
                                                placeholder="Συγγραφέας"
                                                data-control-type="textbox"
                                                data-control-name="author-filter"
                                                data-control-action="filter"
                                        />
                                    </div>

                                    <!-- filter by publisher -->
                                    <!--div class="text-filter-box">

                                        <i class="fa fa-search  jplist-icon"></i>

                                        <input
                                                data-path=".publisher"
                                                type="text"
                                                value=""
                                                placeholder="Φίλτρο με Εκδότη"
                                                data-control-type="textbox"
                                                data-control-name="publisher-filter"
                                                data-control-action="filter"
                                        />
                                    </div-->

                                    <!-- views -->

                                    <div
                                            class="jplist-views"
                                            data-control-type="views"
                                            data-control-name="views"
                                            data-control-action="views"
                                            data-default="jplist-grid-view">
                                    </div>
                                </div>

                                <div class="row">

                                    <!-- items per page dropdown -->
                                    <div
                                            class="jplist-drop-down"
                                            data-control-type="items-per-page-drop-down"
                                            data-control-name="paging"
                                            data-control-action="paging">

                                        <ul>
                                            <!-- <li><span data-number="6"> 6 ανά σελίδα </span></li>-->
                                            <li><span data-number="12"> 12 ανά σελίδα </span></li>
                                            <li><span data-number="16" data-default="true"> 16 ανά σελίδα </span></li>
                                            <li><span data-number="24"> 24 ανά σελίδα </span></li>
                                            <li><span data-number="32"> 32 ανά σελίδα </span></li>
                                            <li><span data-number="all"> Προβολή όλων </span></li>
                                        </ul>
                                    </div>

                                    <!-- pagination results -->
                                    <div
                                            class="jplist-label"
                                            data-type="Σελίδα {current} από {pages}"
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
                            </div>
                            <div class="list box text-shadow">
                                <?php
                                foreach ($books as $book):
                                    echo '<div class="list-item box">';
                                    echo '<div class="product-image-wrapper">';
                                    echo '<div class="single-products">';
                                    echo '<div class="productinfo text-center">';
                                    echo '<div class="img">';
                                    echo '<a href='.\yii\helpers\Url::to(['bkdetails','id' => $book->bk_id, 'bc'=>2]).' title="">';
                                    $path=Yii::$app->basePath. '/web/img/' . $book->bk_image_web_filename;
                                    if (is_file($path)) {
                                        echo '<img src="' . Yii::$app->homeUrl.'img/'.$book->bk_image_web_filename.'" alt="" title=""/>';
                                    }else{
                                        echo '<img src="'.Yii::$app->homeUrl. 'pictures/no_image.png" alt="" >';
                                    }
                                    echo '</a>';
                                    echo '</div>';
                                    echo '<div class="block">';
                                    //echo '<h2>'.$book->bk_price.'<i class="fa fa-eur" aria-hidden="true"></i></h2>';
                                    echo '<p class="title">'.$book->bk_title.'</p>';
                                    //echo '</p>';
                                    // echo ' <div class="choose-no-border-publisher"><p>
                                    // <span class="header book-author"><strong>Συγγραφέας: </strong></span>
                                    // <span class="author">'.$book->bkAuthor['auth_name'].'</span>
                                    // </p>
                                    // <p>
                                    // <span class="header book-publisher"><strong>Εκδότης: </strong></span>
                                    // <span class="publisher">'.$book->bk_publisher.'</span>
                                    // </p>
                                    // <p>
                                    // <span class="header book-publisher"><strong>Έτος: </strong></span>
                                    // <span class="year">'.$book->bk_pb_year.'</span>
                                    // </p>
                                    // </div>
                                    // <p>';
                                    echo ' <div class="choose-no-border-publisher">
											<p>
												<span class="header book-publisher"><strong>Έτος: </strong></span>
												<span class="year">'.$book->bk_pb_year.'</span>
											</p>
											<p style="height:34px">
												<span class="header book-author"><strong>Συγγραφέας: </strong></span>
												<span class="author">'.$book->bkAuthor['auth_name'].'</span>
											</p>
										</div>
										<p>';


                                    if(is_null($book->bk_price) || $book->bk_price==""){
                                        $bk_price="-";
                                        $available='<h4><span class="label label-danger" role="alert"><small>Μη διαθέσιμο</small></span><h4>';
                                    }else{
                                        $bk_price=$book->bk_price;
                                        $available='<h4><span class="label label-success" role="alert"> <small>Άμεσα διαθέσιμο <i class="fa fa-paper-plane-o" aria-hidden="true"></i></small></span><h4>';
                                    }
                                    echo '<div class="choose-no-border-price">
										'.$available.'';
                                    echo '</div></div>';
                                    // echo '<a href="#" class="btn btn-default add-to-cart" style="margin-bottom:0px;"><i class="fa fa-shopping-cart"></i>Λεπτομέρειες</a>';
                                    echo '</div>';
                                    /*echo '<div class="product-overlay">';
                                    echo '<div class="overlay-content">';
                                    echo '<h2>'.$book->bk_price.'<i class="fa fa-eur" aria-hidden="true"></i></h2>';
                                    echo '<p>'.$book->bk_title.'</p>';
                                    echo '<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Λεπτομέριες</a>';
                                    echo '</div>';
                                    echo '</div>';*/
                                    echo '</div>';


                                    echo '<div class="choose">';
                                    echo '<ul class="nav nav-pills nav-justified" style="background-color:#EEEDED">';
                                    echo '<li>'.Html::a('<i class="fa fa-info-circle fa-2x"></i>', ['bkdetails', 'id' => $book->bk_id, 'bc'=>2]).'</li>';
                                    echo '<li class="choose-no-border-price"><span class="header book-price"></span>
											<span class="price"><span class="val">'.$bk_price.'</span> &euro;</span></li>';
                                    echo '<li><a id="'.$book->bk_id.'" data-toggle="modal" href="#userorderModal"><i class="fa fa-shopping-bag fa-2x"></i></a></li>';
                                    echo '</ul>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';

                                endforeach;
                                ?>
                            </div> <!-- list box text-shadow -->
                            <div class="box jplist-no-results text-shadow align-center">
                                </br>
                                </br>
                                <p>Δεν βρέθηκαν αποτελέσματα με αυτά τα κριτήρια</p>
                                </br>
                            </div>

                            <!-- panel -->
                            <div class="jplist-panel box panel-bottom">

                                <!-- items per page dropdown
                                <div
                                        class="jplist-drop-down"
                                        data-control-type="items-per-page-drop-down"
                                        data-control-name="paging"
                                        data-control-action="paging"
                                        data-control-animate-to-top="true">

                                    <ul>
                                        <li><span data-number="6"> 6 ανά σελίδα </span></li>
                                        <li><span data-number="12"> 12 ανά σελίδα </span></li>
                                        <li><span data-number="18" data-default="true"> 18 ανά σελίδα </span></li>
                                        <li><span data-number="24"> 24 ανά σελίδα </span></li>
                                        <li><span data-number="30"> 30 ανά σελίδα </span></li>
                                        <li><span data-number="all"> Προβολή όλων </span></li>
                                    </ul>
                                </div>
                                -->

                                <!-- pagination results -->
                                <div
                                        class="jplist-label"
                                        data-type="{start} - {end} από {all}"
                                        data-control-type="pagination-info"
                                        data-control-name="paging"
                                        data-control-action="paging">
                                </div>

                                <!-- pagination -->
                                <div
                                        class="jplist-pagination"
                                        data-control-animate-to-top="true"
                                        data-control-type="pagination"
                                        data-control-name="paging"
                                        data-control-action="paging">
                                </div>
                            </div>
                        </div>
                    </div><!--center-->
                </div> <!--box-->
            </div><!--features_items-->
        </div>
    </div>
    <!--</div>-->


</div>

<?php if (Yii::$app->session->hasFlash('indexsuccess')): ?>
    <div class="modal fade" id="userindexorderModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content"><div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Φόρμα παραγγελίας</h4>
                </div><div class="modal-body">
                    <div class="alert alert-success alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <h4><i class="icon fa fa-check"></i> Saved!</h4>
                        <?= Yii::$app->session->getFlash('indexsuccess') ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" style="border-radius: 0; margin-top: 16px">Κλείσιμο</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (Yii::$app->session->hasFlash('indexfail')): ?>
    <div class="modal fade" id="userindexorderModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content"><div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Φόρμα παραγγελίας</h4>
                </div><div class="modal-body">
                    <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <h4><i class="icon fa fa-exclamation-triangle"></i> Σφάλμα!</h4>
                        <?= Yii::$app->session->getFlash('indexfail') ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" style="border-radius: 0; margin-top: 16px">Κλείσιμο</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<!-- Modal -->
<div class="modal fade" id="userorderModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Φόρμα παραγγελίας</h4>
            </div>
            <?php $form = ActiveForm::begin(
                [
                    'id' => 'usr_index_order_form',
                    'action'=> ['site/usrindexorder'],
                    'method' => 'post',
                ]); ?>
            <div class="modal-body">
                <!--modal-body -->

            </div>
            <?php ActiveForm::end();?>
        </div>
    </div>
</div>