<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\services\DirectionsWayPoint;
use dosamigos\google\maps\services\TravelMode;
use dosamigos\google\maps\overlays\PolylineOptions;
use dosamigos\google\maps\services\DirectionsRenderer;
use dosamigos\google\maps\services\DirectionsService;
use dosamigos\google\maps\overlays\InfoWindow;
use dosamigos\google\maps\overlays\Marker;
use dosamigos\google\maps\Map;
use dosamigos\google\maps\services\DirectionsRequest;
use dosamigos\google\maps\overlays\Polygon;
use dosamigos\google\maps\layers\BicyclingLayer;

$this->title = 'Επικοινωνία';
$this->params['breadcrumbs'][] = $this->title;
?>
<!--<div class="site-contact">
    <div class="page-header">
        <h3><?/*= Html::encode($this->title) */?></h3>
    </div>

    <style>
        #map {
            height: 500px;
            width: 100%;
        }
    </style>
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-12">
                <div id="map"></div>
                <script>
                    function initMap() {
                        var uluru = {lat: 37.976889, lng: 23.723007};
                        var map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 16,
                            center: uluru
                        });
                        var marker = new google.maps.Marker({
                            position: uluru,
                            map: map
                        });
                    }
                </script>
                <script async defer
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBeDM9r2cdsC5v2O343dzCKhgRpY1mnO0M&callback=initMap">
                </script>
            </div>
        </div>
        <div class="row content">
            <div class="col-sm-6">
                <address>
                    <strong>Παλαιοβιβλιοπωλείο Ι. Κουγέας</strong><br>
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    Άστιγγος 6, Μοναστηράκι<br>
                    &nbsp;&nbsp; Αθήνα, 105 55<br>
                    <i class="fa fa-phone" aria-hidden="true"></i>
                         Τηλέφωνο: 210-3251405<br>
                    <i class="fa fa-mobile fa-lg" aria-hidden="true"></i>
                     Κινητό : 210-3251405<br>
                    <a href="mailto:#"><i class="fa fa-envelope" aria-hidden="true"></i>
                        info@kougeasbooks.gr</a>
                </address>
            </div>
            <div class="col-sm-6">
                <p> Ώρες λειτουργίας 09.30-14.00 (Εκτός Δευτέρας)
                <p>Το κατάστημα λειτουργεί και Σάββατο και Κυριακή</p>
            </div>
        </div>
        <div class="row content">
            <?php /*if (Yii::$app->session->hasFlash('contactFormSubmitted')): */?>

                <div class="alert alert-success">
                    Thank you for contacting us. We will respond to you as soon as possible.
                </div>

                <p>
                    Note that if you turn on the Yii debugger, you should be able
                    to view the mail message on the mail panel of the debugger.
                    <?php /*if (Yii::$app->mailer->useFileTransport): */?>
                        Because the application is in development mode, the email is not sent but saved as
                        a file under <code><?/*= Yii::getAlias(Yii::$app->mailer->fileTransportPath) */?></code>.
                        Please configure the <code>useFileTransport</code> property of the <code>mail</code>
                        application component to be false to enable email sending.
                    <?php /*endif; */?>
                </p>

            <?php /*else: */?>

                <p>
                    Αν θέλετε να επικοινωνήσουμε μαζί σας, συμπληρώστε τη φόρμα που ακολουθεί, γράψτε μας στη θέση "Κείμενο" τι ακριβώς θέλετε, και πατήστε "Αποστολή".
                </p>

                <div class="row">
                    <div class="col-lg-12">

                        <?php /*$form = ActiveForm::begin(['id' => 'contact-form']); */?>
                        <div class="row">
                            <div class="col-lg-6">
                                <?/*= $form->field($model, 'name')->textInput(['autofocus' => true]) */?>
                            </div>
                            <div class="col-lg-6">
                                <?/*= $form->field($model, 'email') */?>
                            </div>
                        </div>
                            <?/*= $form->field($model, 'subject') */?>

                            <?/*= $form->field($model, 'body')->textarea(['rows' => 6]) */?>

                            <?/*= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                                'template' => '<div class="row"><div class="col-lg-5">{image}</div><div class="col-lg-5">{input}</div></div>',
                            ]) */?>

                            <div class="form-group">
                                <?/*= Html::submitButton('Αποστολή', ['class' => 'btn btn-primary', 'name' => 'contact-button']) */?>
                            </div>

                        <?php /*ActiveForm::end(); */?>
                    </div>
                </div>
            <?php /*endif; */?>
        </div>
</div>-->
<div id="contact-page">
    <div class="bg">
        <div class="row">
            <h2 class="title text-center"><strong>ΕΠΙΚΟΙΝΩΝΗΣΤΕ ΜΑΖΙ ΜΑΣ</strong></h2>
            <div class="col-sm-1"></div>
            <div class="col-sm-10">

                <div id="gmap" class="contact-map">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="contact-form">
                    <h2 class="title text-center">Get In Touch</h2>
                    <div class="status alert alert-success" style="display: none"></div>
                    <form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" required="required" placeholder="Ονοματεπώνυμο">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" name="email" class="form-control" required="required" placeholder="Email">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" name="subject" class="form-control" required="required" placeholder="Θέμα">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Μήνυμα"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="submit" name="submit" class="btn btn-primary pull-right" value="Αποστολή">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="contact-info">
                    <h2 class="title text-center">Contact Info</h2>
                    <address>
                        <p>Παλιοβιβλιοπωλείο Ι. Κουγέας.</p>
                        <p>935 W. Webster Ave New Streets Chicago, IL 60614, NY</p>
                        <p>Newyork USA</p>
                        <p>Mobile: +2346 17 38 93</p>
                        <p>Fax: 1-714-252-0026</p>
                        <p>Email: info@kougeasbooks.gr</p>
                    </address>
                    <div class="social-networks">
                        <h2 class="title text-center">Social Networking</h2>
                        <ul>
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--/#contact-page-->
<script>
    function initMap() {
        var uluru = {lat: 37.976889, lng: 23.723007};
        var map = new google.maps.Map(document.getElementById('gmap'), {
            zoom: 16,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBeDM9r2cdsC5v2O343dzCKhgRpY1mnO0M&callback=initMap">
</script>