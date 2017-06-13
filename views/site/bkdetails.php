<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->params['breadcrumbs'][] = $book->bk_title;
?>

<div class="col-sm-9 padding-right">
    <div class="product-details"><!--product-details-->
        <div class="col-sm-5">
            <div class="view-product">
                <?php
                $path=Yii::$app->basePath. '/web/img/' . $book->bk_image_web_filename;
                if (is_file($path)) {
                    echo '<img src="' . Yii::$app->homeUrl.'img/'.$book->bk_image_web_filename.'" alt="" title=""/>';
                }else{
                    echo '<img src="'.Yii::$app->homeUrl. 'pictures/no_image.png" alt="" >';
                }
                ?>
                <!--<img src="<?php /*echo Yii::$app->homeUrl. 'img/'.$book->bk_image_web_filename; */?>" alt="" />-->
                <!--<h3>ZOOM</h3>-->
            </div>
            <!--<div id="similar-product" class="carousel slide" data-ride="carousel">

                 Wrapper for slides
                <div class="carousel-inner">
                    <div class="item active">
                        <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
                        <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
                        <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
                    </div>
                    <div class="item">
                        <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
                        <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
                        <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
                    </div>
                    <div class="item">
                        <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
                        <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
                        <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
                    </div>

                </div>

                 Controls
                <a class="left item-control" href="#similar-product" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="right item-control" href="#similar-product" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>-->

        </div>
        <div class="col-sm-7">
            <div class="product-information"><!--/product-information-->
                <img src="<?php echo Yii::$app->homeUrl; ?>pictures/new.jpg" class="newarrival" alt="" />
                <h2><?php echo $book->bk_title; ?></h2>
                <!-- <p>Web ID: 1089772</p>-->
               <!-- <img src="images/product-details/rating.png" alt="" />-->
                <span>
									<span><?php echo $book->bk_price; ?><i class="fa fa-eur" aria-hidden="true"></i></span>
                    <!--<label>Quantity:</label>
                    <input type="text" value="3" />
                    <button type="button" class="btn btn-fefault cart">
                        <i class="fa fa-shopping-cart"></i>
                        Add to cart
                    </button>-->
								</span>
                <p><b>Συγγραφέας:</b> <?php echo $book->bkAuthor['auth_name']; ?></p>
                <p><b>Εκδόσεις:</b> <?php echo $book->bk_publisher; ?></p>
                <p><?php echo $book->bk_pb_place.", ".$book->bk_pb_year;?></p>
                <p><b>Availability:</b> In Stock</p>
                <?php $condition=((is_null($book->bk_condition) || $book->bk_condition=="")? "-" : $book->bk_condition )?>
                <p><b>Κατάσταση:</b> <?php echo $condition; ?></p>
                <!--<p><b>Brand:</b> E-SHOPPER</p>-->
                <a href=""><img src="<?php echo Yii::$app->homeUrl; ?>pictures/share.png" class="share img-responsive"  alt="" /></a>
            </div><!--/product-information-->
        </div>
    </div><!--/product-details-->

    <div class="category-tab shop-details-tab"><!--category-tab-->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li  class="active"><a href="#details" data-toggle="tab">Γενικές Πληροφορίες</a></li>
                <li><a href="#companyprofile" data-toggle="tab">Περιγραφή</a></li>
                <!--<li><a href="#tag" data-toggle="tab">Tag</a></li>-->
                <li><a href="#reviews" data-toggle="tab">Παραγγελία</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade active in" id="details" >
                <div class="col-sm-7">

                    <p><b>Τίτλος:</b> <?php echo $book->bk_title; ?></p>
                    <p><b>Συγγραφέας:</b> <?php echo $book->bkAuthor['auth_name']; ?></p>
                    <p><b>Εκδόσεις:</b> <?php echo $book->bk_publisher; ?></p>
                    <p><b>Τόπος έκδοσης:</b> <?php echo $book->bk_pb_place; ?></p>
                    <p><b>Έτος έκδοσης:</b> <?php echo $book->bk_pb_year; ?></p>
                    <?php $condition=((is_null($book->bk_condition) || $book->bk_condition=="")? "-" : $book->bk_condition )?>
                    <p><b>Κατάσταση:</b> <?php echo $condition; ?></p>
                    <p><b>Σελίδες:</b> <?php echo $book->bk_pages; ?></p>

                </div>
            </div>

            <!--<div class="tab-pane fade" id="companyprofile" >
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery1.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery3.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery2.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery4.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->

            <!--<div class="tab-pane fade" id="tag" >
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery1.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery2.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery3.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="images/home/gallery4.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->

            <div class="tab-pane fade" id="reviews">
                <br>
                <!--<div class="col-sm-12">
                    <ul>
                        <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                        <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                        <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                    </ul>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    <p><b>Write Your Review</b></p>

                    <form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
                        <textarea name="" ></textarea>
                        <b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
                        <button type="button" class="btn btn-default pull-right">
                            Submit
                        </button>
                    </form>
                </div>-->
                <?php if (Yii::$app->session->hasFlash('success')): ?>
                    <div class="alert alert-success alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <h4><i class="icon fa fa-check"></i> Saved!</h4>
                        <?= Yii::$app->session->getFlash('success') ?>
                    </div>
                <?php endif; ?>

                <?php if (Yii::$app->session->hasFlash('fail')): ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <h4><i class="icon fa fa-exclamation-triangle"></i> Σφάλμα!</h4>
                        <?= Yii::$app->session->getFlash('fail') ?>
                    </div>
                <?php endif; ?>

                <?php $form = ActiveForm::begin(
                    [
                        'id' => 'usr_order_form',
                        'action'=> ['site/usrorder'],
                        'method' => 'post',
                    ]); ?>
                <div class="row col-sm-12">
                    <?= $form->field($order, 'order_bk_id')->hiddenInput(['value'=> $book->bk_id])->label(false) ?>
                    <span class="row">
                            <div class="col-sm-6">
                                <?= $form->field($order, 'usr_name')->textInput(['maxlength' => true,'style' => 'width: 100%']) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($order, 'usr_surname')->textInput(['maxlength' => true, 'style' => 'width: 100%']) ?>
                            </div>
                        </span>
                    <span class="row ">
                        <div class="col-sm-6">
                            <?= $form->field($order, 'usr_phone')->textInput(['maxlength' => true, 'style' => 'width: 100%']) ?>
                        </div>
                        <div class="col-sm-6">
                            <?= $form->field($order, 'usr_email')->textInput(['maxlength' => true, 'style' => 'width: 100%']) ?>
                        </div>
                    </span>
                    <span class="row">
                        <div class="col-sm-6">
                            <?= $form->field($order, 'usr_address')->textInput(['maxlength' => true, 'style' => 'width: 100%']) ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($order, 'usr_city')->textInput(['maxlength' => true, 'style' => 'width: 100%']) ?>
                        </div>
                        <div class="col-sm-2">
                            <?= $form->field($order, 'usr_pcode')->textInput(['maxlength' => true, 'style' => 'width: 100%']) ?>
                        </div>
                    </span>
                    <span class="row">
                        <div class="col-sm-12" style="padding-right: 15px; padding-left: 15px;">
                            <?= $form->field($order, 'order_comment')->textArea(['maxlength' => true])->label('Σχόλιο') ?>
                        </div>
                    </span>
                </div>
                <div class="row col-sm-12">
                    <div class="col-sm-12">
                        <?= Html::submitButton( 'Αποστολή', ['class' => 'btn btn-default pull-right']) ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>

        </div>
    </div><!--/category-tab-->

    <div class="recommended_items"><!--recommended_items-->
        <h2 class="title text-center">Προτεινόμενα</h2>

        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php
                if(!is_null($recommended_books)){
                    echo '<div class="item active">';
                    foreach ($recommended_books as $recommended_book):
                        echo '<div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">';
                        echo '<div class="img">';
                        echo '<a href='.\yii\helpers\Url::to(['bkdetails','id' => $recommended_book->bk_id]).' title="">';
                        $path=Yii::$app->basePath. '/web/img/' . $recommended_book->bk_image_web_filename;
                        if (is_file($path)) {
                            echo '<img src="' . Yii::$app->homeUrl.'img/'.$recommended_book->bk_image_web_filename.'" alt="" title=""/>';
                        }else{
                            echo '<img src="'.Yii::$app->homeUrl. 'pictures/no_image.png" alt="" >';
                        }
                        echo '</a>';
                        echo '</div>';
                        echo '<div class="block">';
                        echo '<p>'.$recommended_book->bk_title.'</p>';
                        echo '</div>'; //block
                        //echo '<img src="' . Yii::$app->homeUrl.'img/'.$recommended_book->bk_image_web_filename.'" alt="" />';
                        echo '<h2>'.$recommended_book->bk_price.'<i class="fa fa-eur" aria-hidden="true"></i></h2>';
                        echo ' <div class="choose-no-border-publisher">
											<p>
												<span class="header book-publisher"><strong>Έτος: </strong></span>
												<span class="year">'.$recommended_book->bk_pb_year.'</span>
											</p>
											<p style="height:34px">
												<span class="header book-author"><strong>Συγγραφέας: </strong></span>
												<span class="author">'.$recommended_book->bkAuthor['auth_name'].'</span>
											</p>
										</div>';
                        echo '<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-info-circle fa-2x"></i>Λεπτομέρειες</button>';
                        echo '</div></div></div></div>';
                    endforeach;
                    echo '</div>';
                }

                if(!is_null($auth_recommended_books)){
                    echo '<div class="item ">';
                    foreach ($auth_recommended_books as $auth_recommended_book):
                        echo '<div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">';
                        $path=Yii::$app->basePath. '/web/img/' . $auth_recommended_book->bk_image_web_filename;
                        if (is_file($path)) {
                            echo '<img src="' . Yii::$app->homeUrl.'img/'.$auth_recommended_book->bk_image_web_filename.'" alt="" title=""/>';
                        }else{
                            echo '<img src="'.Yii::$app->homeUrl. 'pictures/no_image.png" alt="" >';
                        }
                        // echo '<img src="' . Yii::$app->homeUrl.'img/'.$auth_recommended_book->bk_image_web_filename.'" alt="" />';
                        echo '<h2>'.$auth_recommended_book->bk_price.'<i class="fa fa-eur" aria-hidden="true"></i></h2>';
                        echo '<p>'.$auth_recommended_book->bk_title.'</p>';
                        echo '<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-search-plus"></i>Λεπτομέρειες</button>';
                        echo '</div></div></div></div>';
                    endforeach;
                    echo '</div>';
                }

                if(!is_null($auth_recommended_books)){
                    echo '<div class="item ">';
                    foreach ($cat_recommended_books as $cat_recommended_book):
                        echo '<div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">';
                        $path=Yii::$app->basePath. '/web/img/' . $cat_recommended_book->bk_image_web_filename;
                        if (is_file($path)) {
                            echo '<img src="' . Yii::$app->homeUrl.'img/'.$cat_recommended_book->bk_image_web_filename.'" alt="" title=""/>';
                        }else{
                            echo '<img src="'.Yii::$app->homeUrl. 'pictures/no_image.png" alt="" >';
                        }
                        //echo '<img src="' . Yii::$app->homeUrl.'img/'.$cat_recommended_book->bk_image_web_filename.'" alt="" />';
                        echo '<h2>'.$cat_recommended_book->bk_price.'<i class="fa fa-eur" aria-hidden="true"></i></h2>';
                        echo '<p>'.$cat_recommended_book->bk_title.'</p>';
                        echo '<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-search-plus"></i>Λεπτομέρειες</button>';
                        echo '</div></div></div></div>';
                    endforeach;
                    echo '</div>';
                }

                ?>
                <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev" style="left: 0;">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div><!--/recommended_items-->
    </div>
</div>