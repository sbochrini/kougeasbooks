<?php
use yii\widgets\ActiveForm;
use app\components\CategoryWidget;
use yii\helpers\Html;
use yii\web\View;

/* @var $this yii\web\View */

/*$this->title = 'Κουγέας';*/
$this->params['breadcrumbs'][] = $this->title;

?>
<!--<div class="site-index">-->
<div class="row">
    <div class="col-sm-12">
    <section id="slider"><!--slider-->
        <!--<div class="container">
            <div class="row">-->
        <div class="col-sm-12">
            <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#slider-carousel" data-slide-to="1"></li>
                    <li data-target="#slider-carousel" data-slide-to="2"></li>
                </ol>

                <div class="carousel-inner" >
                    <div class=" item active" style="padding-left: 60px;">
                        <div class="col-sm-6" >
                            <h1 style="margin-top:25%"><span><i>Καλώς ορίσατε στο ηλεκτρονικό μας παλαιοβιβλιοπωλείο.</i></span></h1>
                           <!-- <h2> </h2>-->
                            <!--button type="button" class="btn btn-default get">Get it now</button-->
                        </div>
                        <div class="col-sm-6">
                            <img src="<?php echo Yii::$app->homeUrl; ?>pictures/kougeas_1.jpg" class="girl img-responsive" style="height:327px; width: 450px; padding:10px;" alt="" />
                            <!--img src="<?php echo Yii::$app->homeUrl; ?>pictures/pricing.png"  class="pricing" alt="" /-->

                        </div>
                    </div>
                    <div class="item" style="padding-left: 60px;">
                        <div class="col-sm-6">
                            <!--<h1 style="margin-top:0px"><span>Βιβλιοπωλείο Κουγέας</span></h1>-->
                            <h1 style="margin-top:20%"><span><i>Κοντά σας από το 1967.</i></span></h1>

                            <!--button type="button" class="btn btn-default get">Get it now</button-->                        </div>
                        <div class="col-sm-6">
                            <img src="<?php echo Yii::$app->homeUrl; ?>pictures/kougeas_2.jpg" class="girl img-responsive" style="height:327px; width: 450px; padding:10px;" alt="" />
                            <!--img src="<?php echo Yii::$app->homeUrl; ?>pictures/pricing.png"  class="pricing" alt="" /-->
                        </div>
                    </div>

                    <div class="item" style="padding-left: 60px;">
                        <div class="col-sm-6">
                            <!--<h1 style="margin-top:0px"><span>Βιβλιοπωλείο Κουγέας</span></h1>-->
                            <h1>
                                <span><i>Στα ράφια μας θα βρείτε παλαιά, σπάνια βιβλία και παλαιότυπα.</i></span>
                            </h1>
                            <!--button type="button" class="btn btn-default get">Get it now</button-->                        </div>
                        <div class="col-sm-6">
                            <img src="<?php echo Yii::$app->homeUrl; ?>pictures/kougeas_3.jpg" class="girl img-responsive" style="height:327px; width: 450px; padding:10px;" alt="" />
                            <!--img src="<?php echo Yii::$app->homeUrl; ?>pictures/pricing.png"  class="pricing" alt="" /-->
                        </div>
                    </div>

                </div>

                <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
            <!-- </div>
         </div>-->
        </div>
    </section><!--/slider-->
</div>
</div>
<div class="row">
    <div  id="text-div" >
        <p><i><span>Καλώς ορίσατε στο Ηλεκτρονικό μας Βιβλιοπωλείο.</span> <br>
            Το Παλαιοβιβλιοπωλείο μας λειτουργεί από το 1967 στο Μοναστηράκι. Αρχικά από τον ιδρυτή του Βασίλειο Ι. Κουγέα στην οδό Άστιγγος 6 και από το 1990 από τον Ιωάννη Β. Κουγέα στην οδό Άστιγγος 21 & Θησείου. Από φέτος με τη συμπλήρωση 50 χρόνων ζωής, μπαίνει σε λειτουργία και Ηλεκτρονικό Βιβλιοπωλείο το οποίο θα εμπλουτίζεται σταδιακά, με στόχο σε σύντομο χρονικό διάστημα να γεμίσουν τα "ράφια" του.
            Ιδιαίτερο  βάρος δίνεται στις παλαιές και σπάνιες εκδόσεις, κυρίως ελληνικών βιβλίων. Οι κύριοι τομείς δραστηριότητας αφορούν στην Ιστορία, Τοπική Ιστορία, Λαογραφία, Ελληνική Λογοτεχνία, Παιδική Λογοτεχνία, Περιοδικά, Σπάνια Σχολικά Βιβλία, Εικονογραφημένες εκδόσεις και επιλεγμένα βιβλία σε πολλούς άλλους τομείς, όπως Τέχνη, Θέατρο, Ημερολόγια, Λευκώματα κλπ.<br>
            Ευχόμαστε να απολαύσετε το ταξίδι της αναζήτησης στο μαγικό κόσμο των βιβλίων.  Θα χαρούμε να σας εξυπηρετήσουμε.<br>
                <span>Ιωάννης  Κουγέας  &  Συνεργάτες</span>
            </i></p>
    </div>
</div>
<div class="row" style="margin-top:20px">
    <div class="col-sm-3">
        <div class="left-sidebar">
            <h2>ΚΑΤΗΓΟΡΙΕΣ</h2>
            <?= CategoryWidget::widget() ?>
        </div>
    </div>
    <div class="col-sm-9">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">ΟΙ ΕΠΙΛΟΓΕΣ ΜΑΣ</h2>
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

                                    <!--button type="button" class="jplist-view jplist-grid-view" data-type="jplist-grid-view"></button>
                                    <button type="button" class="jplist-view jplist-list-view" data-type="jplist-list-view"></button>
                                    <button type="button" class="jplist-view jplist-thumbs-view" data-type="jplist-thumbs-view"></button-->
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
                            foreach ($fav_books as $fav_book):
                                echo '<div class="list-item box">';
                                echo '<div class="product-image-wrapper">';
                                echo '<div class="single-products">';
                                echo '<div class="productinfo text-center">';
                                echo '<div class="img">';
                                echo '<a  href='.\yii\helpers\Url::to(['bkdetails','id' => $fav_book->bk_id]).' title="'.$fav_book->bk_title.'">';
                                $path=Yii::$app->basePath. '/web/img/' . $fav_book->bk_image_web_filename;
                                if (is_file($path)) {
                                    echo '<img class="img-thumbnail hvr-grow-shadow" src="' . Yii::$app->homeUrl.'img/'.$fav_book->bk_image_web_filename.'" alt="" title="'.$fav_book->bk_title.'"/>';
                                }else{
                                    echo '<img src="'.Yii::$app->homeUrl. 'pictures/no_image.jpg" alt="" title="'.$fav_book->bk_title.'" >';
                                }
                                echo '</a>';
                                echo '</div>';
                                echo '<div class="block">';
                                //echo '<h2>'.$fav_book->bk_price.'<i class="fa fa-eur" aria-hidden="true"></i></h2>';
                                echo '<p class="title" title="'.$fav_book->bk_title.'">'.$fav_book->bk_title.'</p>';
								echo ' <div class="choose-no-border-publisher">
											<p class="p_hover">
												<span class="header book-publisher"><strong>Έτος: </strong></span>
												<span class="year">'.$fav_book->bk_pb_year.'</span>
											</p>
											<p class="p_hover" style="height:34px">
												<span class="header book-author"><strong>Συγγραφέας: </strong></span>
												<span class="author">'.$fav_book->bkAuthor['auth_name'].'</span>
											</p>
										</div>
										<p>';
										
										
                                if(is_null($fav_book->bk_price) || $fav_book->bk_price==""){
                                    $bk_price="-";
                                    $disabled="disabled";
                                    $href="";
                                    $available='<h4><span class="label label-danger" role="alert"><small>Μη διαθέσιμο</small></span><h4>';
                                }else{
                                    $disabled="";
                                    $href="userorderModal";
                                    $bk_price=$fav_book->bk_price;
                                    $available='<h4><span class="label label-success" role="alert"> <small>Άμεσα διαθέσιμο <i class="fa fa-paper-plane-o" aria-hidden="true"></i></small></span><h4>';
                                }
								echo '<div class="choose-no-border-price">
										'.$available.'';
                                echo '</div></div>';
                               // echo '<a href="#" class="btn btn-default add-to-cart" style="margin-bottom:0px;"><i class="fa fa-shopping-cart"></i>Λεπτομέρειες</a>';
                                echo '</div>';
                                /*echo '<div class="product-overlay">';
                                echo '<div class="overlay-content">';
                                echo '<h2>'.$fav_book->bk_price.'<i class="fa fa-eur" aria-hidden="true"></i></h2>';
                                echo '<p>'.$fav_book->bk_title.'</p>';
                                echo '<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Λεπτομέριες</a>';
                                echo '</div>';
                                echo '</div>';*/
                                echo '</div>';


                                echo '<div class="choose">';
                                echo '<ul class="nav nav-pills nav-justified">';
                                echo '<li>'.Html::a('<i class="fa fa-info-circle fa-2x"></i>', ['bkdetails', 'id' => $fav_book->bk_id]).'</li>';
								echo '<li class="choose-no-border-price"><span class="header book-price"></span>
											<span class="price"><span class="val">'.$bk_price.'</span> &euro;</span></li>';
                                echo '<li class="'.$disabled.'"><a id="'.$fav_book->bk_id.'" data-toggle="modal" href="#'.$href.'" data-backdrop="static"><i class="fa fa-shopping-bag fa-2x"></i></a></li>';
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
<?php if (Yii::$app->session->hasFlash('indexsuccess')): ?>
    <div class="modal fade" id="userindexorderModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content"><div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Επιβεβαίωση παραγγελίας</h4>
                </div><div class="modal-body">
                    <div class="alert alert-success alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <h4><i class="icon fa fa-check"></i> Η παραγγελία σας ολοκληρώθηκε!</h4>
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
                    <h4 class="modal-title" id="myModalLabel">Επιβεβαίωση παραγγελίας</h4>
                </div><div class="modal-body">
                    <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <h4><i class="icon fa fa-exclamation-triangle"></i> Παρουσιάστηκε κάποιο πρόβλημα!</h4>
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
            <span class="row col-sm-12">
                <div class="pull-right" style="padding-top:10px;padding-right:10px;padding-bottom:10px;font-size:12px"><i>Τα πεδία με <span style="display: inline;color:red;">*</span> είναι υποχρεωτικά.</i></div>
            </span>
           <?php $form = ActiveForm::begin(
            [
                'id' => 'usr_index_order_form',
                'action'=> ['site/usrindexorder'],
                'method' => 'post',
            ]); ?>
            <div class="modal-body">
                <!--modal-body -->

                <span>
                    <div class="row">
                        <div class="col-sm-6">
                        <?=$form->field($order, 'usr_name')->textInput(['maxlength' => true,'style' => 'width: 100%'])?>
                        </div>
                        <div class="col-sm-6">
                            <?=$form->field($order, 'usr_surname')->textInput(['maxlength' => true, 'style' => 'width: 100%']) ?>
                        </div>
                    </div>
                </span>
                <span>
                    <div class="row">
                        <div class="col-sm-6">
                            <?=$form->field($order, 'usr_phone')->textInput(['maxlength' => true, 'style' => 'width: 100%'])?>
                        </div>
                        <div class="col-sm-6">
                            <?=$form->field($order, 'usr_email')->textInput(['maxlength' => true, 'style' => 'width: 100%'])?>
                        </div>
                    </div>
                </span>
                <span class="row">
                     <div class="row">
                        <div class="col-sm-6">
                            <?=$form->field($order, 'usr_address')->textInput(['maxlength' => true, 'style' => 'width: 100%'])?>
                        </div>
                        <div class="col-sm-4">
                            <?=$form->field($order, 'usr_city')->textInput(['maxlength' => true, 'style' => 'width: 100%'])?>
                        </div>
                        <div class="col-sm-2">
                            <?=$form->field($order, 'usr_pcode')->textInput(['maxlength' => true, 'style' => 'width: 100%'])?>
                        </div>
                     </div>
                </span>
                <span class="row">
                    <div class="row">
                        <div class="col-sm-12" style="padding-right: 15px; padding-left: 15px;">
                            <?=$form->field($order, 'order_comment')->textArea(['maxlength' => true])->label('Σχόλιο')?>
                        </div>
                    </div>
                </span>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" style="border-radius: 0; margin-top: 16px">Κλείσιμο</button>
                    <button id="index_usrorder_submit" type="submit" class="btn btn-primary" >Αποστολή</button>
                </div>
            </div>
            <?php ActiveForm::end();?>
        </div>
    </div>
</div>

<?php
$this->registerJs(
    '$(".help-block").css("font-size", "12px");',
    View::POS_READY
);
?>

