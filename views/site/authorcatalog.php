<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ListView;
$this->title = 'ΚΑΤΑΛΟΓΟΣ ΣΥΓΓΡΑΦΕΩΝ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h2 class="title-large text-center">ΚΑΤΑΛΟΓΟΣ ΣΥΓΓΡΑΦΕΩΝ</h2>
    <div class="row" style="margin-left: 0; margin-right:0">
        <div class="btn-toolbar">
            <div class="btn-group btn-group-sm">
                <?php
                foreach (range('A', 'Z') as $char) {
                    echo Html::a($char,['authorcatalog', 'letter' => $char],['class' => 'btn btn-default alphabet']);
                }
                 echo Html::a("All", ['authorcatalog', 'letter' => "all_en"],['class' => 'btn btn-default alphabet']);
                ?>
            </div>
        </div>
    </div>
    <br>
    <div class="row" style="margin-left: 0; margin-right:0">
        <div class="btn-toolbar">
            <div class="btn-group btn-group-sm">
                <?php
                for ($i=0;$i<count($gr);$i++){
                    echo Html::a($gr[$i],['authorcatalog', 'letter' => $gr[$i]],['class' => 'btn btn-default alphabet']);
                }
                echo Html::a("Όλα", ['authorcatalog', 'letter' => "all_gr"],['class' => 'btn btn-default alphabet']);
                ?>
            </div>
        </div>
    </div>
    <br>
    <div class="row" style="margin-left: 0; margin-right:0">
        <ul id="ul_authors">
            <?php
                echo ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' => '_bookslistperauthor',
                    'summary' => "Εμφάνιση {begin} - {end} από {totalCount} συγγραφείς.",
                    'emptyText' => 'Δεν βρέθηκαν αποτελέσματα.',
                    'layout' => '{summary}<br>{items}<br>{pager}',
                ]);
            ?>
            <br><br>
        </ul>
    </div>
</div>
