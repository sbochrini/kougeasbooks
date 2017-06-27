<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Σύνδεση στη Διαχειριστική Κονσόλα';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-header">
    <div class="row">
        <div class="col-md-12"><h1><?= Html::encode($this->title) ?></h1></div>
    </div>
</div>
<div class="col-md-12">
    <!--<h1><?/*= Html::encode($this->title) */?></h1>-->

    <div><p>Παρακαλώ συμπλήρώστε τα πεδία για να συνδεθείτε:</p></div>

    <?php $form = ActiveForm::begin([
        //'id' => 'login-form',
        'action'=>Url::toRoute('admin/index'),
        'layout' => 'horizontal',
        'fieldConfig' => [
            //'template' => "<div class=\"col-lg-2\">{label}</div>\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-4\">{error}</div>",
            'labelOptions' => ['class' => 'control-label col-sm-2'],
        ],
    ]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Όνομα χρήστη:') ?>

        <?= $form->field($model, 'password')->passwordInput()->label('Κωδικός:') ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ]) ?>

        <div class="form-group">
            <div class="col-lg-8">
                <?= Html::submitButton('Σύνδεση', ['class' => 'btn btn-primary pull-right', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

   <!-- <div class="col-lg-offset-1" style="color:#999;">
        You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>
        To modify the username/password, please check out the code <code>app\models\User::$users</code>.
    </div>-->
</div>
