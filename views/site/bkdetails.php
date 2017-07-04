<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
if(isset($_GET['bc'])){
    if($_GET['bc']==1){
        $this->params['breadcrumbs'][] = ['label' => $book->bkCat['cat_name'], 'url' => ['bookspercat','id'=>$book->bkCat['cat_id']]];
    }
    elseif($_GET['bc']==2){
        $this->params['breadcrumbs'][] = ['label' => $book->bkCat['cat_name'], 'url' => ['bookspercat','id'=>$book->bkCat['cat_id']]];
        $this->params['breadcrumbs'][] = ['label' => $book->bkSubcat['subcat_name'], 'url' => ['bookspersubcat','id'=>$book->bkSubcat['subcat_id']]];
    }
    elseif($_GET['bc']==3){
        $this->params['breadcrumbs'][] = ['label' => $book->bkCat['cat_name'], 'url' => ['bookspercat','id'=>$book->bkCat['cat_id']]];
        $this->params['breadcrumbs'][] = ['label' => $book->bkCat['cat_name'], 'url' => ['bookspercat','id'=>$book->bkCat['cat_id']]];
    }
}


$this->params['breadcrumbs'][] = $book->bk_title;

?>

<div class="col-sm-9 padding-right">
    <h2 class="title text-center">ΛΕΠΤΟΜΕΡΕΙΕΣ</h2>
    <div class="product-details"><!--product-details-->
        <div class="col-sm-5 text-center">
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

        </div>
        <div class="col-sm-7">
            <div class="product-information"><!--/product-information-->
                <?php
                if(is_null($book->bk_price)){
                    $price="-";
                    $img="notavailable";
                }else{
                    $price=$book->bk_price;
                    $img="available";
                }
                ?>
                <img src="<?php echo Yii::$app->homeUrl; ?>pictures/<?php echo $img; ?>.png" class="newarrival" alt="" />
                <h2><?php echo $book->bk_title; ?></h2>
                <span>
                    <span><?php echo $price; ?><i class="fa fa-eur" aria-hidden="true"></i></span>
                </span>
                <?php $author=((is_null($book->bkAuthor['auth_name']) || $book->bkAuthor['auth_name']=="")? "-" : $book->bkAuthor['auth_name'] )?>
                <p><b>Συγγραφέας:</b> <?php echo $author; ?></p>
                <?php $publisher=((is_null($book->bk_publisher) || $book->bk_publisher=="")? "-" : $book->bk_publisher)?>
                <p><b>Εκδόσεις:</b> <?php echo $publisher; ?></p>
                <p><?php echo $book->bk_pb_place.", ".$book->bk_pb_year;?></p>
                <!--<p><b>Availability:</b> In Stock</p>-->
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
                <li  class="active"><a href="#details" data-toggle="tab">ΓΕΝΙΚΕΣ ΠΛΗΡΟΦΟΡΙΕΣ</a></li>
                <li><a href="#description" data-toggle="tab">ΠΕΡΙΓΡΑΦΗ</a></li>
                <!--<li><a href="#tag" data-toggle="tab">Tag</a></li>-->
                <?php $tab_disabled=(($price=="-") ? "disabled" : "")?>
                <?php $des_tab_href=(($price=="-") ? "" : 'href="#reviews"')?>
                <?php $des_data_toggle=(($price=="-") ? "" : 'data-toggle="tab"')?>
                <li class="<?php echo $tab_disabled; ?>"><a <?php echo $des_tab_href; ?>" <?php echo $des_data_toggle; ?>>ΠΑΡΑΓΓΕΛΙΑ</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade active in" id="details" >
                <div class="col-sm-7">

                    <p><b>Τίτλος:</b> <?php echo $book->bk_title; ?></p>
                    <p><b>Συγγραφέας:</b> <?php echo $author; ?></p>
                    <p><b>Εκδόσεις:</b> <?php echo $publisher; ?></p>
                    <p><b>Τόπος έκδοσης:</b> <?php echo $book->bk_pb_place; ?></p>
                    <p><b>Έτος έκδοσης:</b> <?php echo $book->bk_pb_year; ?></p>
                    <?php $condition=((is_null($book->bk_condition) || $book->bk_condition=="")? "-" : $book->bk_condition )?>
                    <p><b>Κατάσταση:</b> <?php echo $condition; ?></p>
                    <p><b>Σελίδες:</b> <?php echo $book->bk_pages; ?></p>

                </div>
            </div>
            <div class="tab-pane fade active in" id="description" >
                <div class="col-sm-7">
                    <?php $description=((is_null($book->bk_description) || $book->bk_description=="")? "-" : $book->bk_description)?>
                    <p><b>Περιγραφή:</b> <?php echo $description; ?></p>
                </div>
            </div>
            <div class="tab-pane fade" id="reviews">
                <br>
                <?php /*if (Yii::$app->session->hasFlash('success')): */?><!--
                    <div class="alert alert-success alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <h4><i class="icon fa fa-check"></i> Saved!</h4>
                        <?/*= Yii::$app->session->getFlash('success') */?>
                    </div>
                <?php /*endif; */?>

                <?php /*if (Yii::$app->session->hasFlash('fail')): */?>
                    <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <h4><i class="icon fa fa-exclamation-triangle"></i> Σφάλμα!</h4>
                        <?/*= Yii::$app->session->getFlash('fail') */?>
                    </div>
                --><?php /*endif; */?>

                <?php $form = ActiveForm::begin(
                    [
                        'id' => 'usr_order_form',
                        'action'=> ['site/usrorder'],
                        'method' => 'post',
                    ]); ?>
                <div class="row col-sm-12">
                    <span class="row">
                        <p class="pull-right"><i>Τα πεδία με <span style="display: inline;color:red;">*</span> είναι υποχρεωτικά.</i></p>
                    </span>
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
                        <?= Html::submitButton( 'Αποστολή',
                            [
                                'class' => 'btn btn-default pull-right',
                                'data-confirm' =>'Ολοκλήρωση παραγγελίας;',
                                /*'data-toggle'=>"modal",
                                'data-target'=>"#userindexorderModal"*/
                            ]) ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>

        </div>
    </div><!--/category-tab-->

    <div class="recommended_items"><!--recommended_items-->
        <h2 class="title text-center">Προτεινομενα</h2>
		<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<?php
				if(!is_null($recommended_books)){
					echo '<div class="item active">
						<div class="box jplist jplist-grid-view">
						<div class="list box text-shadow" style="margin:0 0">';
					foreach ($recommended_books as $recommended_book):
						echo '<div class="list-item box" style="width: 26%; margin-left:5%">
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
						echo '<p class="title">'.$recommended_book->bk_title.'</p>';

						//echo '<img src="' . Yii::$app->homeUrl.'img/'.$recommended_book->bk_image_web_filename.'" alt="" />';
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
						echo '</div>'; //block
						
						echo '</div>';
						echo '<div class="choose">';
                        echo '<ul class="nav nav-pills nav-justified">';
                        echo '<li>'.Html::a('<i class="fa fa-info-circle fa-2x"></i>', ['bkdetails', 'id' => $recommended_book->bk_id]).'</li>';
						echo '<li class="choose-no-border-price"><span class="header book-price"></span>
								<span class="price"><span class="val">'.$recommended_book->bk_price.'</span> &euro;</span></li>';
                        echo '<li><a id="'.$recommended_book->bk_id.'" data-toggle="modal" href="#userorderModal"><i class="fa fa-shopping-bag fa-2x"></i></a></li>';
                        echo '</ul>';
                        echo '</div>';
						echo '</div></div></div>';
					endforeach;
					echo '</div></div></div>';
				}
				
				if(!is_null($auth_recommended_books)){
					echo '<div class="item">
						<div class="box jplist jplist-grid-view">
						<div class="list box text-shadow" style="margin:0 0">';
					foreach ($auth_recommended_books as $auth_recommended_book):
						echo '<div class="list-item box" style="width: 26%; margin-left:5%">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">';
						echo '<div class="img">';
						echo '<a href='.\yii\helpers\Url::to(['bkdetails','id' => $auth_recommended_book->bk_id]).' title="">';
						$path=Yii::$app->basePath. '/web/img/' . $auth_recommended_book->bk_image_web_filename;
						if (is_file($path)) {
							echo '<img src="' . Yii::$app->homeUrl.'img/'.$auth_recommended_book->bk_image_web_filename.'" alt="" title=""/>';
						}else{
							echo '<img src="'.Yii::$app->homeUrl. 'pictures/no_image.png" alt="" >';
						}
						echo '</a>';
						echo '</div>';
						echo '<div class="block">';
						echo '<p class="title">'.$auth_recommended_book->bk_title.'</p>';

						//echo '<img src="' . Yii::$app->homeUrl.'img/'.$auth_recommended_book->bk_image_web_filename.'" alt="" />';
						echo ' <div class="choose-no-border-publisher">
											<p>
												<span class="header book-publisher"><strong>Έτος: </strong></span>
												<span class="year">'.$auth_recommended_book->bk_pb_year.'</span>
											</p>
											<p style="height:34px">
												<span class="header book-author"><strong>Συγγραφέας: </strong></span>
												<span class="author">'.$auth_recommended_book->bkAuthor['auth_name'].'</span>
											</p>
										</div>';
						echo '</div>'; //block
						
						echo '</div>';
						echo '<div class="choose">';
                        echo '<ul class="nav nav-pills nav-justified">';
                        echo '<li>'.Html::a('<i class="fa fa-info-circle fa-2x"></i>', ['bkdetails', 'id' => $auth_recommended_book->bk_id]).'</li>';
						echo '<li class="choose-no-border-price"><span class="header book-price"></span>
								<span class="price"><span class="val">'.$auth_recommended_book->bk_price.'</span> &euro;</span></li>';
                        echo '<li><a id="'.$auth_recommended_book->bk_id.'" data-toggle="modal" href="#userorderModal"><i class="fa fa-shopping-bag fa-2x"></i></a></li>';
                        echo '</ul>';
                        echo '</div>';
						echo '</div></div></div>';
					endforeach;
					echo '</div></div></div>';
				}
				
				
				if(!is_null($cat_recommended_books)){
					echo '<div class="item">
						<div class="box jplist jplist-grid-view">
						<div class="list box text-shadow" style="margin:0 0">';
					foreach ($cat_recommended_books as $cat_recommended_book):
						echo '<div class="list-item box" style="width: 26%; margin-left:5%">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">';
						echo '<div class="img">';
						echo '<a href='.\yii\helpers\Url::to(['bkdetails','id' => $cat_recommended_book->bk_id]).' title="">';
						$path=Yii::$app->basePath. '/web/img/' . $cat_recommended_book->bk_image_web_filename;
						if (is_file($path)) {
							echo '<img src="' . Yii::$app->homeUrl.'img/'.$cat_recommended_book->bk_image_web_filename.'" alt="" title=""/>';
						}else{
							echo '<img src="'.Yii::$app->homeUrl. 'pictures/no_image.png" alt="" >';
						}
						echo '</a>';
						echo '</div>';
						echo '<div class="block">';
						echo '<p class="title">'.$cat_recommended_book->bk_title.'</p>';

						//echo '<img src="' . Yii::$app->homeUrl.'img/'.$cat_recommended_book->bk_image_web_filename.'" alt="" />';
						echo ' <div class="choose-no-border-publisher">
											<p>
												<span class="header book-publisher"><strong>Έτος: </strong></span>
												<span class="year">'.$cat_recommended_book->bk_pb_year.'</span>
											</p>
											<p style="height:34px">
												<span class="header book-author"><strong>Συγγραφέας: </strong></span>
												<span class="author">'.$cat_recommended_book->bkAuthor['auth_name'].'</span>
											</p>
										</div>';
						echo '</div>'; //block
						
						echo '</div>';
						echo '<div class="choose">';
                        echo '<ul class="nav nav-pills nav-justified">';
                        echo '<li>'.Html::a('<i class="fa fa-info-circle fa-2x"></i>', ['bkdetails', 'id' => $cat_recommended_book->bk_id]).'</li>';
						echo '<li class="choose-no-border-price"><span class="header book-price"></span>
								<span class="price"><span class="val">'.$cat_recommended_book->bk_price.'</span> &euro;</span></li>';
                        echo '<li><a id="'.$cat_recommended_book->bk_id.'" data-toggle="modal" href="#userorderModal"><i class="fa fa-shopping-bag fa-2x"></i></a></li>';
                        echo '</ul>';
                        echo '</div>';
						echo '</div></div></div>';
					endforeach;
					echo '</div></div></div>';
				}



				?>
				<a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev" style="left: 0;margin-right:40px">
					<i class="fa fa-angle-left"></i>
				</a>
				<a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
					<i class="fa fa-angle-right"></i>
				</a>
			</div>
        </div>
    </div><!--/recommended_items-->
</div>


<?php /*if (Yii::$app->session->hasFlash('success') || Yii::$app->session->hasFlash('fail')): */?><!--
    <div class="modal fade" id="bkdetailsorderform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content"><div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Επιβεβαίωση παραγγελίας</h4>
                </div><div class="modal-body">
                    <?php /*if (Yii::$app->session->hasFlash('success')): */?>
                    <div class="alert alert-success alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <h4><i class="icon fa fa-check"></i> Η παραγγελία σας ολοκληρώθηκε!</h4>
                        <?/*= Yii::$app->session->getFlash('success') */?>
                        <?php /*endif; */?>
                        <?php /*if(Yii::$app->session->hasFlash('fail')): */?>
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <h4><i class="icon fa fa-exclamation-triangle"></i> Παρουσιάστηκε κάποιο πρόβλημα!</h4>
                            <?/*= Yii::$app->session->getFlash('fail') */?>
                            <?php /*endif; */?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" style="border-radius: 0; margin-top: 16px">Κλείσιμο</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
--><?php /*endif; */?>


<?php if (Yii::$app->session->hasFlash('indexsuccess') || Yii::$app->session->hasFlash('success')): ?>
    <div class="modal fade" id="userindexorderModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content"><div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Επιβεβαίωση παραγγελίας</h4>
                </div><div class="modal-body">
                    <div class="alert alert-success alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <h4><i class="icon fa fa-check"></i> Η παραγγελία σας ολοκληρώθηκε!</h4>
                        <?php if (Yii::$app->session->hasFlash('indexsuccess')): ?>
                            <?= Yii::$app->session->getFlash('indexsuccess') ?>
                        <?php endif; ?>
                        <?php if(Yii::$app->session->hasFlash('success')): ?>
                            <?= Yii::$app->session->getFlash('success') ?>
                        <?php endif; ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" style="border-radius: 0; margin-top: 16px">Κλείσιμο</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (Yii::$app->session->hasFlash('indexfail') || Yii::$app->session->hasFlash('fail')): ?>
    <div class="modal fade" id="userindexorderModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content"><div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Επιβεβαίωση παραγγελίας</h4>
                </div><div class="modal-body">
                    <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <h4><i class="icon fa fa-exclamation-triangle"></i> Παρουσιάστηκε κάποιο πρόβλημα!</h4>
                        <?php if (Yii::$app->session->hasFlash('indexfail')): ?>
                            <?= Yii::$app->session->getFlash('indexfail') ?>
                        <?php endif; ?>
                        <?php if(Yii::$app->session->hasFlash('fail')): ?>
                            <?= Yii::$app->session->getFlash('fail') ?>
                        <?php endif; ?>
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
                    <div class="col-sm-6">
                    <?=$form->field($order, 'usr_name')->textInput(['maxlength' => true,'style' => 'width: 100%'])?>
                    </div>
                    <div class="col-sm-6">
                        <?=$form->field($order, 'usr_surname')->textInput(['maxlength' => true, 'style' => 'width: 100%']) ?>
                    </div>
                </span>
                <span>
                    <div class="col-sm-6">
                        <?=$form->field($order, 'usr_phone')->textInput(['maxlength' => true, 'style' => 'width: 100%'])?>
                    </div>
                    <div class="col-sm-6">
                        <?=$form->field($order, 'usr_email')->textInput(['maxlength' => true, 'style' => 'width: 100%'])?>
                    </div>
                </span>
                <span class="row">
                    <div class="col-sm-6">
                        <?=$form->field($order, 'usr_address')->textInput(['maxlength' => true, 'style' => 'width: 100%'])?>
                    </div>
                    <div class="col-sm-4">
                        <?=$form->field($order, 'usr_city')->textInput(['maxlength' => true, 'style' => 'width: 100%'])?>
                    </div>
                    <div class="col-sm-2">
                        <?=$form->field($order, 'usr_pcode')->textInput(['maxlength' => true, 'style' => 'width: 100%'])?>
                    </div>
                </span>
                <span class="row">
                    <div class="col-sm-12" style="padding-right: 15px; padding-left: 15px;">
                        <?=$form->field($order, 'order_comment')->textArea(['maxlength' => true])->label('Σχόλιο')?>
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