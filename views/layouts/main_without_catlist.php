<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
use app\assets\BooklistAsset;
use app\assets\EshopperAsset;

AppAsset::register($this);
BooklistAsset::register($this);
EshopperAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>

    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/css/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl; ?>/pictures/eshopper/ico/favicon.ico">
    <!--<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php /*echo Yii::$app->request->baseUrl; */?>pictures/eshopper/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php /*echo Yii::$app->request->baseUrl; */?>pictures/eshopper/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php /*echo Yii::$app->request->baseUrl; */?>pictures/eshopper/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php /*echo Yii::$app->request->baseUrl; */?>pictures/eshopper/ico/apple-touch-icon-57-precomposed.png">-->
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a><i class="fa fa-phone"></i> 210 3219608</a></li>
                                <li><a><i class="fa fa-mobile"></i> 6944948242</a></li>
                                <li><a href="mailto:info@kougeasbooks.gr"><i class="fa fa-envelope"></i> info@kougeasbooks.gr</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="https://www.facebook.com/palaiobibliopoleio/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <!--<li><a href="#"><i class="fa fa-dribbble"></i></a></li>-->
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->
    </header><!--/header-->


    <?php
	echo '<div class="row" style="margin-left:0px; margin-right:0px;">';
    NavBar::begin([
        'brandLabel' => '<div class="row"><div class="col-sm-4"><img src="'.Yii::$app->homeUrl.'pictures/logo.png" class="pull-left"/></div><div class="logo-header col-sm-6" style="margin-top: 15px;">Παλαιοβιβλιοπωλείο Ιωάννης Β. Κουγέας</div></div>',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-inverse ',
			'style' => 'border-radius:0px; height: 100px;',
        ],
    ]);
    echo Nav::widget([
        'options' => [
            'class' => 'navbar-nav',
            'style' => 'margin-top: 25px',
        ],
        'items' => [
            ['label' => 'Αρχική', 'url' => ['/site/index']],
            ['label' => 'Κατάλογος Συγγραφέων', 'url' => ['/site/authorcatalog']],
            ['label' => 'Τρόποι Παραγγελίας', 'url' => ['/site/orders']],
            ['label' => 'Επικοινωνία', 'url' => ['/site/contact']],
        ],
    ]);
    echo "<form class='navbar-form navbar-right' role='search'>
       <div class='form-group has-feedback'>
            <input id='searchbox' type='text' placeholder='Search' class='form-control'>
            <span id='searchicon' class='fa fa-search form-control-feedback'></span>
        </div>
  </form>";


    NavBar::end();
    echo '</div>';
    ?>
    <div class="container">
        <!--<div  class="row" style="padding-top: 20px; margin-left:15px; margin-right:15px"> --><!--class="container"-->

            <?= Breadcrumbs::widget([
                'homeLink' => [
                    'label' => 'ΑΡΧΙΚΗ',
                    'url' => ['site/index'],
                ],
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
        <!--</div>-->
        <!--<div class="">-->
           <!-- <div class="row">-->

            <div  class="row" style="margin-left:15px; margin-right:15px"><!--class="container"-->
                <?= $content ?>
            </div>
           <!-- <div>-->
    </div>
</div>
<footer id="footer"  style="margin-left:0px; margin-right:0px"><!--Footer-->
   <div class="footer-bottom">
        <div class="container">
                <p class="pull-left">&copy; Βιβλιοπωλείο Ιωάννης Β. Κουγέας <?= date('Y') ?></p>
            <p class="pull-right">Designed by <span><a href="mailto:s.bochrini@gmail.com">SBochrini</a></span></p>
        </div>
   </div>
</footer><!--/Footer-->


<?php $this->endBody() ?>
<script type="text/javascript">
    var cat_url = "<?= Url::to(["site/bookspercat"]) ?>";
    var sub_url = "<?= Url::to(["site/bookspersubcat"]) ?>";
</script>
</body>
</html>
<?php $this->endPage() ?>
