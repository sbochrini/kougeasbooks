<?php

/* @var $this yii\web\View */

/*$this->title = 'Κουγέας';*/
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">
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

                <div class="carousel-inner">
                    <div class="item active">
                        <div class="col-sm-6">
                            <h1><span>E</span>-SHOPPER</h1>
                            <h2>Free E-Commerce Template</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                            <button type="button" class="btn btn-default get">Get it now</button>
                        </div>
                        <div class="col-sm-6">
                            <img src="<?php echo Yii::$app->request->baseUrl; ?>pictures/eshopper/home/girl1.jpg" class="girl img-responsive" alt="" />
                            <img src="<?php echo Yii::$app->request->baseUrl; ?>pictures/eshopper/home/pricing.png"  class="pricing" alt="" />
                        </div>
                    </div>
                    <div class="item">
                        <div class="col-sm-6">
                            <h1><span>E</span>-SHOPPER</h1>
                            <h2>100% Responsive Design</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                            <button type="button" class="btn btn-default get">Get it now</button>
                        </div>
                        <div class="col-sm-6">
                            <img src="<?php echo Yii::$app->request->baseUrl; ?>pictures/eshopper/home/girl2.jpg" class="girl img-responsive" alt="" />
                            <img src="<?php echo Yii::$app->request->baseUrl; ?>pictures/eshopper/home/pricing.png"  class="pricing" alt="" />
                        </div>
                    </div>

                    <div class="item">
                        <div class="col-sm-6">
                            <h1><span>E</span>-SHOPPER</h1>
                            <h2>Free Ecommerce Template</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                            <button type="button" class="btn btn-default get">Get it now</button>
                        </div>
                        <div class="col-sm-6">
                            <img src="<?php echo Yii::$app->request->baseUrl; ?>pictures/eshopper/home/girl3.jpg" class="girl img-responsive" alt="" />
                            <img src="<?php echo Yii::$app->request->baseUrl; ?>pictures/eshopper/home/pricing.png" class="pricing" alt="" />
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
    <div class="col-sm-12">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Features Items</h2>
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

                                    <button type="button" class="jplist-view jplist-grid-view" data-type="jplist-grid-view"></button>
                                    <button type="button" class="jplist-view jplist-list-view" data-type="jplist-list-view"></button>
                                    <!--button type="button" class="jplist-view jplist-thumbs-view" data-type="jplist-thumbs-view"></button-->
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
                                        <li><span data-number="5"> 5 ανά σελίδα </span></li>
										<li><span data-number="10"> 10 ανά σελίδα </span></li>
										<li><span data-number="15" data-default="true"> 15 ανά σελίδα </span></li>
										<li><span data-number="20"> 20 ανά σελίδα </span></li>
										<li><span data-number="25"> 25 ανά σελίδα </span></li>
                                        <!--li><span data-number="all"> Προβολή όλων </span></li-->
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
							<!-- item 1 -->
							<!--
							<div class="list-item box">
								
								<div class="img">
									<a href="https://en.wikipedia.org/wiki/GAZ-M20_Pobeda" title="">
										<img src="<?php echo Yii::$app->homeUrl.'pictures/bookstore1.jpg';?>" alt="" title=""/>
									</a>
								</div>

								<div class="block">
									<p class="title">
										<a href="https://en.wikipedia.org/wiki/GAZ-M20_Pobeda" title="">ΑΑΑΑΑΑΑΑΑΑΑΑΑ </a>
									</p>
									<p>
										<span class="header book-author">Συγγραφέας: </span>
										<span class="author">ΑΑΑΑΑΑΑΑΑΑΑ.</span>
									</p>
									<p>
										<span class="header book-publisher">Εκδότης: </span>
										<span class="publisher">ΑΑΑΑΑΑΑΑΑΑΑΑ </span>
									</p>
									<p>
										<span class="desc">Έτος: </span>
										<span class="desc">1947</span>
									</p>
									<p>
										<span class="header book-price">Τιμή: </span>
										<span class="price"><span class="val">25.00</span> &euro;</span>
									</p>
									<p class="desc">ΑΑΑΑΑΑΑΑΑΑΑΑΑΑΑΑΑΑΑΑΑΑΑΑΑ ΑΑΑΑΑΑΑΑΑΑΑΑΑΑΑΑΑΑΑΑΑΑΑΑΑΑΑΑΑΑΑΑΑΑΑΑ.</p>
								</div>
							</div>
							-->

							<!-- item 2 -->
							<!--
							<div class="list-item box">
								<div class="img">
									<a href="https://en.wikipedia.org/wiki/GAZ-M20_Pobeda" title="">
										<img src="<?php echo Yii::$app->homeUrl.'/pictures/bookstore2.jpg';?>" alt="" title=""/>
									</a>
								</div>
							
								<div class="block">
									<p class="title">
										<a href="https://en.wikipedia.org/wiki/GAZ-M20_Pobeda" title="">ΒΒΒΒΒΒΒΒΒ</a>
									</p>
									<p>
										<span class="header book-author">Συγγραφέας: </span>
										<span class="author">ΒΒΒΒΒΒΒΒΒ.</span>
									</p>
									<p>
										<span class="header book-publisher">Εκδότης: </span>
										<span class="publisher">ΒΒΒΒΒΒΒΒΒ</span>
									</p>
									<p>
										<span class="desc">Έτος: </span>
										<span class="desc">1946</span>
									</p>
									<p>
										<span class="header book-price">Τιμή: </span>
										<span class="price"><span class="val">21.00</span> &euro;</span>
									</p>
									<p class="desc">ΒΒΒΒΒΒΒΒΒΒΒΒΒΒΒΒΒΒΒΒΒΒΒΒΒΒΒ ΒΒΒΒΒΒΒΒΒ.</p>
								</div>
							</div>
							-->
							<?php
							foreach ($fav_books as $fav_book):
							echo '<div class="list-item box">';
								echo '<div class="product-image-wrapper">';
								echo '<div class="single-products">';
								echo '<div class="productinfo text-center">';
								echo '<div class="img">';
									echo '<a href="https://en.wikipedia.org/wiki/GAZ-M20_Pobeda" title="">';
										if ($fav_book->bk_image_web_filename!='') {
											echo '<img src="' . Yii::$app->homeUrl . 'img/' . $fav_book->bk_image_web_filename . '" alt="" title=""/>';
										}else{
											echo '<img src="'.Yii::$app->homeUrl. 'pictures/no_image.png" alt="" >';
										}
									echo '</a>';
								echo '</div>';
								echo '<div class="block">';
									echo '<p class="title">';
									//echo '<h2>'.$fav_book->bk_price.'<i class="fa fa-eur" aria-hidden="true"></i></h2>';
									echo '<p class="title">'.$fav_book->bk_title.'</p>';
										echo '<a href="https://en.wikipedia.org/wiki/GAZ-M20_Pobeda" title="">'.$fav_book->bk_price.'</a>';
									echo '</p>';
									echo ' <p>
											<span class="header book-author">Συγγραφέας: </span>
											<span class="author">'.$fav_book->bk_author_id.'</span>
										</p>
										<p>
											<span class="header book-publisher">Εκδότης: </span>
											<span class="publisher">'.$fav_book->bk_publisher.'</span>
										</p>
										<p>
											<span class="year">Έτος: </span>
											<span class="year">'.$fav_book->bk_pb_year.'</span>
										</p>
										<p>
											<span class="header book-price">Τιμή: </span>
											<span class="price"><span class="val">'.$fav_book->bk_price.'</span> &euro;</span>
										</p>
										<p class="desc">ΒΒΒΒΒΒΒΒΒΒΒΒΒΒΒΒΒΒΒΒΒΒΒΒΒΒΒ ΒΒΒΒΒΒΒΒΒ.</p>';
								echo '</div>';
									echo '<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Λεπτομέριες</a>';
									echo '</div>';
									echo '<div class="product-overlay">';
									echo '<div class="overlay-content">';
									echo '<h2>'.$fav_book->bk_price.'<i class="fa fa-eur" aria-hidden="true"></i></h2>';
									echo '<p>'.$fav_book->bk_title.'</p>';
									echo '<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Λεπτομέριες</a>';
									echo '</div>';
									echo '</div>';
									echo '</div>';
								
								
								echo '<div class="choose">';
								echo '<ul class="nav nav-pills nav-justified">';
								echo '<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>';
								echo '<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>';
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

                            <!-- items per page dropdown -->
                            <div
                                    class="jplist-drop-down"
                                    data-control-type="items-per-page-drop-down"
                                    data-control-name="paging"
                                    data-control-action="paging"
                                    data-control-animate-to-top="true">

                                <ul>
                                    <li><span data-number="5"> 5 ανά σελίδα </span></li>
									<li><span data-number="10"> 10 ανά σελίδα </span></li>
									<li><span data-number="15" data-default="true"> 15 ανά σελίδα </span></li>
									<li><span data-number="20"> 20 ανά σελίδα </span></li>
									<li><span data-number="25"> 25 ανά σελίδα </span></li>
                                    <!--li><span data-number="all"> Προβολή όλων </span></li-->
                                </ul>
                            </div>

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
