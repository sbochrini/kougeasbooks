<?php
/**
 * Created by PhpStorm.
 * User: Voula
 * Date: 20/4/2017
 * Time: 2:52 μμ
 */

use yii\helpers\Html;

$this->params['breadcrumbs'][] = $subcategory->subcat_name;
?>
<div id="booklist" class="book-index">

    <!-- <h1><?/*= Html::encode($this->title) */?></h1>
    --><?php /* echo $this->render('_bookslistpercat',[
        'category'=>$category,
        'books' => $books,
        'dataProvider'=>$dataProvider,
    ]); */?>

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
                                jPList Actions
                            </div>


                            <!-- panel -->
                            <div class="jplist-panel box panel-top" style="margin: 0px 0px 0px 15px">
                                <div class="row">

                                    <!-- back button button -->
                                    <button
                                            type="button"
                                            data-control-type="back-button"
                                            data-control-name="back-button"
                                            data-control-action="back-button">
                                        <i class="fa fa-arrow-left"></i> Πίσω
                                    </button>

                                    <!-- reset button -->
                                    <button
                                            type="button"
                                            class="back-button"
                                            data-control-type="reset"
                                            data-control-name="reset"
                                            data-control-action="reset">
                                        <i class="fa fa-undo"></i> Αρχικές ρυθμίσεις
                                    </button>


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
                                            <li><span data-path=".publisher" data-order="asc" data-type="text"><i class="fa fa-sort-alpha-asc"></i>  Εκδότης</span></li>
                                            <li><span data-path=".publisher" data-order="desc" data-type="text"><i class="fa fa-sort-alpha-desc"></i>  Εκδότης</span></li>
                                            <li><span data-path=".year" data-order="asc" data-type="number"><i class="fa fa-sort-amount-asc"></i> Χρονολογία</span></li>
                                            <li><span data-path=".year" data-order="desc" data-type="number"><i class="fa fa-sort-amount-desc"></i> Χρονολογία</span></li>
                                            <li><span data-path=".price" data-order="asc" data-type="number"><i class="fa fa-sort-amount-asc"></i>  Τιμή</span></li>
                                            <li><span data-path=".price" data-order="desc" data-type="number"><i class="fa fa-sort-amount-desc"></i>  Τιμή</span></li>
                                        </ul>
                                    </div>


                                    <!-- jQuery UI range slider -->
                                    <!-- priceSlider and priceValues are user function defined in jQuery.fn.jplist.settings -->
                                    <div
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
                                    </div>
                                </div>

                                <div class="row">

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
                                                placeholder="Φίλτρο με τίτλο"
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
                                                placeholder="Φίλτρο με Συγγραφέα"
                                                data-control-type="textbox"
                                                data-control-name="author-filter"
                                                data-control-action="filter"
                                        />
                                    </div>

                                    <!-- filter by publisher -->
                                    <div class="text-filter-box">

                                        <i class="fa fa-search  jplist-icon"></i>

                                        <!--[if lt IE 10]>
                                        <div class="jplist-label">Filter by Description:</div>
                                        <![endif]-->

                                        <input
                                                data-path=".publisher"
                                                type="text"
                                                value=""
                                                placeholder="Φίλτρο με Εκδότη"
                                                data-control-type="textbox"
                                                data-control-name="publisher-filter"
                                                data-control-action="filter"
                                        />
                                    </div>

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
                                foreach ($books as $book):
                                    echo '<div class="list-item box">';
                                    echo '<div class="product-image-wrapper">';
                                    echo '<div class="single-products">';
                                    echo '<div class="productinfo text-center">';
                                    echo '<div class="img">';
                                    echo '<a href=# title="">';
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
                                    //echo '<a href="https://en.wikipedia.org/wiki/GAZ-M20_Pobeda" title="">'.$book->bk_price.' &euro;</a>';
                                    echo '</p>';
                                    echo ' <p>
											<span class="header book-author">Συγγραφέας: </span>
											<span class="author">'.$book->bkAuthor['auth_name'].'</span>
										</p>
										<p>
											<span class="header book-publisher">Εκδότης: </span>
											<span class="publisher">'.$book->bk_publisher.'</span>
										</p>
										<p>';
                                    if(is_null($book->bk_price) || $book->bk_price==""){
                                        $bk_price="-";
                                        $available='<h4><span class="label label-danger" role="alert">Μη διαθέσιμο</span><h4>';
                                    }else{
                                        $bk_price=$book->bk_price;
                                        $available='<h4><span class="label label-success" role="alert"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Άμεσα διαθέσιμο</span><h4>';
                                    }
                                    echo '<span class="header book-price"></span>
											<span class="price"><span class="val"><h2 style="margin-top:0px;">'.$bk_price.'</span> <i class="fa fa-eur" aria-hidden="true"></i></h2></span>
										</p><p>'.$available.'</p>';
                                    echo '</div>';
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
                                    echo '<ul class="nav nav-pills nav-justified">';
                                    //echo '<li><a href="#"><i class="fa fa-search-plus"></i>Λεπτομέρειες</a></li>';
                                    echo '<li>'.Html::a('<i class="fa fa-search-plus"></i>Λεπτομέρειες', ['bkdetails', 'id' => $book->bk_id]).'</li>';
                                    echo '<li><a id="'.$book->bk_id.'" data-toggle="modal" href="#userorderModal"><i class="fa fa-shopping-cart"></i>Παραγγελία</a></li>';
                                    //echo '<li><a href="#"><i class="fa fa-shopping-cart"></i>Άμεση Παραγγελία</a></li>';
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

    <!-- Modal -->
    <div class="modal fade" id="userorderModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!--modal-content -->
            </div>
        </div>
    </div>


</div>