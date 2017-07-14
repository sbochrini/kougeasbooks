<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AdminAsset;
use yii\helpers\Url;
use app\assets\SweetAlertAsset;

AdminAsset::register($this);
SweetAlertAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <title>Διαχειριστική Κονσόλα</title>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/css/font-awesome-4.7.0/css/font-awesome.min.css">

    <style>
        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {height: 450px}

        /* Set gray background color and 100% height */
        .sidenav {
            padding-top: 20px;
            background-color: #f1f1f1;
            height: 100%;
        }

        /* Set black background color, white text and some padding */
        footer {
            background-color: #555;
            color: white;
            padding: 15px;
        }

        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }
            .row.content {height:auto;}
        }
    </style>

</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Διαχειριστική Κονσόλα',
        'brandUrl' => Url::to(['/admin/index']),
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
            'id' => 'main_nav'
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'kougeasbooks.gr', 'url' => ['/site/index'], 'linkOptions' => array('target' => '_blank'),],
            Yii::$app->user->isGuest ? (
            ['label' => 'Welcome']
            ) : (
                '<li><a href='.Url::to(['/book/index']).'>Προσθήκη/Επεξεργασία Βιβλίων</a></li>'.
                '<li><a href='.Url::to(['/bookcategory/index']).'>Προσθήκη/Επεξεργασία Κατηγοριών</a></li>'.
                '<li><a href='.Url::to(['/order/index']).'>Παραγγελίες</a></li>'.
                '<li>'
                . Html::beginForm(['/admin/logout'], 'post')
                . Html::submitButton(
                    'Αποσύνδεση (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    ?>

    <?php
    NavBar::end();
    ?>

    <div class="container" style="width:100%">

         <div class="col-sm-12">

                <?= Breadcrumbs::widget([
                    'homeLink' => [
                        'label' => 'Αρχική',
                        'url' => ['admin/index'],
                    ],
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
         </div>


            <div class="col-sm-12 ">

                <?= $content ?>
            </div>

    </div>
</div>

<footer id="footer">
    <div class="footer-bottom">
        <div class="container">
            <p class="pull-left">&copy; Βιβλιοπωλείο Κουγέας <?= date('Y') ?></p>
            <p class="pull-right">Designed by <span><a href="mailto:s.bochrini@gmail.com">SBochrini</a></span></p>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
<script type="text/javascript">

    /*$("#bk_filter_input").keyup(function(e) {
        if(e.which == 13 || e.keyCode == 13) {
        var key = e.keyCode;
           url= window.location.href;
            alert(url);
            $("#hidden_form").submit();
       }
    });*/

   /* $.fn.enterKey = function (fnc) {
        return this.each(function () {
            $(this).keypress(function (ev) {
                var keycode = (ev.keyCode ? ev.keyCode : ev.which);
                if (keycode == '13') {
                    fnc.call(this, ev);
                }
            })
        })
    }
    $("input[type=text]").enterKey(function () {
        alert('Enter!');
    });*/
    /*$(document).ready(function() {
        $("input").keydown(function(event){
            if(event.keyCode == 13) {
                event.preventDefault();
                $("#hidden_form").submit();
            }
        });
    });*/
    /*$("input").keypress(function(event) {
        if (event.which == 10 || event.which == 13) {
            alert("froejgfp3ioj");
            event.preventDefault();
            $("#hidden_form").submit();
        }
    });*/

    $('.collapse').on('shown.bs.collapse', function(){
        $(this).parent().find(".glyphicon-chevron-down").removeClass("glyphicon-chevron-down").addClass("glyphicon-chevron-up");
    }).on('hidden.bs.collapse', function(){
        $(this).parent().find(".glyphicon-chevron-up").removeClass("glyphicon-chevron-up").addClass("glyphicon-chevron-down");
    });


</script>
</html>
<?php $this->endPage() ?>
