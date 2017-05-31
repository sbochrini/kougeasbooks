<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\components\CategoryWidget;
use yii\helpers\Url;
//use app\assets\BooklistAsset;
use app\assets\JPagesAsset;

AppAsset::register($this);
//BooklistAsset::register($this);
JPagesAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>

    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/css/font-awesome-4.7.0/css/font-awesome.min.css">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
<style>
    .holder {
        margin: 15px 0;
    }

    .holder a {
        font-size: 12px;
        cursor: pointer;
        margin: 0 5px;
        color: #333;
    }

    .holder a:hover {
        background-color: #222;
        color: #fff;
    }

    .holder a.jp-previous { margin-right: 15px; }
    .holder a.jp-next { margin-left: 15px; }

    .holder a.jp-current, a.jp-current:hover {
        color: #FF4242;
        font-weight: bold;
    }

    .holder a.jp-disabled, a.jp-disabled:hover {
        color: #bbb;
    }

    .holder a.jp-current, a.jp-current:hover,
    .holder a.jp-disabled, a.jp-disabled:hover {
        cursor: default;
        background: none;
    }

    .holder span { margin: 0 5px; }

    form { float: right; margin-right: 10px; }

    form label { margin-right: 5px; }
</style>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Βιβλιοπωλείο Κουγέας',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Αρχική', 'url' => ['/site/index']],
            ['label' => 'Κατάλογος Συγγραφέων', 'url' => ['/site/about']],
            ['label' => 'Τρόποι Παραγγελίας', 'url' => ['/site/orders']],
            ['label' => 'Επικοινωνία', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    ?>

     <!--   <form>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>-->


    <?php
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'homeLink' => [
                'label' => 'Αρχική',
                'url' => ['site/index'],
            ],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>


        <div class="row">
            <div class="col-md-3">
                <?= CategoryWidget::widget() ?>
            </div>
            <div id="mainpage" class="col-md-9">
                <?= $content ?>
            </div>

            </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Βιβλιοπωλείο Κουγέας <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
<script type="text/javascript">
    var cat_url = "<?= Url::to(["site/bookspercat"]) ?>";
    var sub_url = "<?= Url::to(["site/bookspersubcat"]) ?>";
</script>
<!--<script type="text/javascript" src="<?php /*//echo Yii::$app->request->baseUrl; */?>/assets/js/main.js"></script>-->

<script>
    /* when document is ready */

    $(function() {

        /* initiate plugin */
        $("div.holder").jPages({
            containerID : "itemContainer",
            perPage : 5
        });

        /* on select change */
        $("select").change(function(){
            /* get new nº of items per page */
            var newPerPage = parseInt( $(this).val() );

            /* destroy jPages and initiate plugin again */
            $("div.holder").jPages("destroy").jPages({
                containerID   : "itemContainer",
                perPage       : newPerPage
            });
        });

    });
</script>
</body>
</html>
<?php $this->endPage() ?>
