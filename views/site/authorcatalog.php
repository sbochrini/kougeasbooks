<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ListView;
$this->title = 'Κατάλογος συγγραφέων';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <div class="container">
        <div class="btn-toolbar">
            <div class="btn-group btn-group-sm">
                <?php
                foreach (range('A', 'Z') as $char) {
                    echo Html::a($char,['authorcatalog', 'letter' => $char],['class' => 'btn btn-default alphabet']);
                }
                 echo Html::a("All", ['Authorcatalog', 'letter' => "all_en"],['class' => 'btn btn-default alphabet']);
                ?>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="btn-toolbar">
            <div class="btn-group btn-group-sm">
                <?php
                for ($i=0;$i<count($gr);$i++){
                    echo Html::a($gr[$i],['authorcatalog', 'letter' => $gr[$i]],['class' => 'btn btn-default alphabet']);
                }
                echo Html::a("Όλα", ['Authorcatalog', 'letter' => "all_gr"],['class' => 'btn btn-default alphabet']);
                ?>
                <!--<button id="Α" class="btn btn-default alphabet">Α</button>
                <button id="Β" class="btn btn-default alphabet">Β</button>
                <button id="Γ" class="btn btn-default alphabet">Γ</button>
                <button id="Δ" class="btn btn-default alphabet">Δ</button>
                <button id="Ε" class="btn btn-default alphabet">Ε</button>
                <button id="Ζ" class="btn btn-default alphabet">Ζ</button>
                <button id="Η" class="btn btn-default alphabet">Η</button>
                <button id="Θ" class="btn btn-default alphabet">Θ</button>
                <button id="Ι" class="btn btn-default alphabet">Ι</button>
                <button id="Κ" class="btn btn-default alphabet">Κ</button>
                <button id="Λ" class="btn btn-default alphabet">Λ</button>
                <button id="Μ" class="btn btn-default alphabet">Μ</button>
                <button id="Ν" class="btn btn-default alphabet">Ν</button>
                <button id="Ξ" class="btn btn-default alphabet">Ξ</button>
                <button id="Ο" class="btn btn-default alphabet">Ο</button>
                <button id="Π" class="btn btn-default alphabet">Π</button>
                <button id="Ρ" class="btn btn-default alphabet">Ρ</button>
                <button id="Σ" class="btn btn-default alphabet">Σ</button>
                <button id="Τ" class="btn btn-default alphabet">Τ</button>
                <button id="Υ" class="btn btn-default alphabet">Υ</button>
                <button id="Φ" class="btn btn-default alphabet">Φ</button>
                <button id="Χ" class="btn btn-default alphabet">Χ</button>
                <button id="Ψ" class="btn btn-default alphabet">Ψ</button>
                <button id="Ω" class="btn btn-default alphabet">Ω</button>
                <button id="all_gr" class="btn btn-default alphabet">Όλα</button>-->
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <ul id="ul_authors">
            <?php
                echo ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' => '_bookslistperauthor',
                    'summary' => "Εμφάνιση {begin} - {end} από {totalCount} συγγραφείς.",
                ]);
            ?>
        </ul>
    </div>
</div>
