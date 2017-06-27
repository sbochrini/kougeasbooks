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

$this->title = 'ΕΠΙΚΟΙΝΩΝΙΑ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="contact-page">
    <div class="bg">
        <div class="row">
            <h2 class="title text-center">ΕΠΙΚΟΙΝΩΝΙΑ</h2>
            <div class="col-sm-1"></div>
            <div class="col-sm-10">

                <div id="gmap" class="contact-map">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="row content">
                    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>
                        <h2 class="title-large text-center">ΕΠΙΚΟΙΝΩΝΗΣΤΕ ΜΑΖΙ ΜΑΣ</h2>
                        <div class="alert alert-success">
                            Ευχαριστούμε που επικοινωνήσατε μαζί μας. We will respond to you as soon as possible.
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

                    <?php else: ?>
                    <div class="contact-form">
                        <h2 class="title-large text-center">ΕΠΙΚΟΙΝΩΝΗΣΤΕ ΜΑΖΙ ΜΑΣ</h2>
                        <div class="status alert alert-success" style="display: none"></div>
                        <?php $form = ActiveForm::begin(['id' => 'contact-form', 'class'=>'contact-form row']); ?>
                        <!--<form id="main-contact-form" class="contact-form row" name="contact-form" method="post">-->

                        <div class="col-md-6">
                            <?= $form->field($model,'name')->textInput(['maxlength' => true, 'placeholder'=>"Ονοματεπώνυμο" ])->label(false) ?>

                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model,'email')->textInput(['maxlength' => true, 'placeholder'=>"Email" ])->label(false) ?>
                        </div>
                        <div class="col-md-12">
                            <?= $form->field($model,'subject')->textInput(['maxlength' => true, 'placeholder'=>"Θέμα" ])->label(false) ?>
                        </div>
                        <div class="col-md-12">
                            <?= $form->field($model,'body')->textArea(['maxlength' => true,'placeholder'=>"Μήνυμα", 'id'=>"message" ])->label(false) ?>
                        </div>
                       <!--<div class="form-group col-md-6">
                            <input type="text" name="ContactForm[name]" class="form-control" required="required" placeholder="Ονοματεπώνυμο">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" name="ContactForm[email]" class="form-control" required="required" placeholder="Email">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" name="ContactForm[subject]" class="form-control" required="required" placeholder="Θέμα">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea name="ContactForm[body]" id="message" required="required" class="form-control" rows="8" placeholder="Μήνυμα"></textarea>
                        </div>-->
                        <div class="col-md-6">
                            <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                                'template' => '<div class="col-lg-6">{image}</div><div class="col-lg-6">{input}</div>',
                            ])->label(false) ?>
                        </div>
                        <div class="form-group col-md-12">
                            <!--<input type="submit" name="submit" class="btn btn-primary pull-right" value="Αποστολή">-->
                            <?php echo  Html::submitButton('Αποστολή', ['class' => 'btn btn-primary pull-right', 'name' => 'contact-button']); ?>
                        </div>
                        <!--</form>-->
                        <?php ActiveForm::end(); ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="contact-info">
                    <h2 class="title text-center">ΣΤΟΙΧΕΙΑ ΕΠΙΚΟΙΝΩΝΙΑΣ</h2>
                    <address>
                        <p>Παλαιοβιβλιοπωλείο Ι. Κουγέας.</p>
                        <p>Άστιγγος 21 &amp; Θησείου 2</p>
                        <p>Μοναστηράκι, Αθήνα</p>
                        <p>Κινητό: 6944948242</p>
                        <p>Σταθερό: 210 3219608</p>
                        <p>Email: <a href="mailto:info@kougeasbooks.gr">info@kougeasbooks.gr</a></p>
                    </address>
                    <div class="social-networks">
                        <h2 class="title text-center">Social Networking</h2>
                        <ul>
                            <li>
                                <a href="https://www.facebook.com/palaiobibliopoleio/" target="_blank"><i class="fa fa-facebook"></i></a>
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
        var uluru = {lat: 37.977051, lng: 23.722362};
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