<?php

/* @var $this yii\web\View */

/*$this->title = 'Κουγέας';*/
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">

   <!-- <div class="jumbotron">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            -- Indicators --
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>

            -- Wrapper for slides --
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="<?php /*echo Yii::$app->homeUrl.'/pictures/bookstore1.jpg';*/?>" alt="bookstore1" style="width:100%;">
                    <div class="carousel-caption">
                        ...
                    </div>
                </div>
                <div class="item">
                    <img src="<?php /*echo Yii::$app->homeUrl.'/pictures/bookstore2.jpg';*/?>" alt="bookstore2" style="width:100%;">
                    <div class="carousel-caption">
                        ...
                    </div>
                </div>
                <div class="item">
                    <img src="<?php /*echo Yii::$app->homeUrl.'/pictures/bookstore3.jpg';*/?>" alt="bookstore3" style="width:100%;">
                    <div class="carousel-caption">
                        ...
                    </div>
                </div>
            </div>

            -- Controls --
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>-->
    <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
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

                </div>
            </div>
        </div>
    </section><!--/slider-->
    <div class="col-sm-12">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Features Items</h2>
            <?php
           // $i=1;
            foreach ($fav_books as $fav_book):
               // $open_div=0;
                /*if($i==1 || fmod($i,4)==1){
                    echo '<div class="row">';
                   // $open_div=1;
                }*/

                echo '<div class="col-sm-3">';
                    echo '<div class="product-image-wrapper">';
                        echo '<div class="single-products">';
                            echo '<div class="productinfo text-center">';
                            if ($fav_book->bk_image_web_filename!='') {
                                echo '<img src="' . Yii::$app->homeUrl . '/img/' . $fav_book->bk_image_web_filename . '" alt="" >';
                            }else{
                                echo '<img src="'.Yii::$app->homeUrl. '/pictures/no_image.png" alt="" >';
                            }
                                    echo '<h2>'.$fav_book->bk_price.'<i class="fa fa-eur" aria-hidden="true"></i></h2>';
                                    echo '<p>'.$fav_book->bk_title.'</p>';
                                    echo '<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Λεπτομέρειες</a>';
                            echo '</div>';
                            echo '<div class="product-overlay">';
                            echo '<div class="overlay-content">';
                            echo '<h2>'.$fav_book->bk_price.'<i class="fa fa-eur" aria-hidden="true"></i></h2>';
                            echo '<p>'.$fav_book->bk_title.'</p>';
                            echo '<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Λεπτομέρειες</a>';
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
                /*if( fmod($i,4)==0 || $i==(count($fav_books)+1)){
                    echo '</div>';
                }
                $i++;*/
            endforeach;
            ?>
        </div><!--features_items-->

        <!--<div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>-->
    </div>
</div>
