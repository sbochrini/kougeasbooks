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
                <button id="A" class="btn btn-default alphabet">A</button>
                <button id="B" class="btn btn-default alphabet">B</button>
                <button id="C" class="btn btn-default alphabet">C</button>
                <button id="D" class="btn btn-default alphabet">D</button>
                <button id="E" class="btn btn-default alphabet">E</button>
                <button id="F" class="btn btn-default alphabet">F</button>
                <button id="G" class="btn btn-default alphabet">G</button>
                <button id="H" class="btn btn-default alphabet">H</button>
                <button id="I" class="btn btn-default alphabet">I</button>
                <button id="J" class="btn btn-default alphabet">J</button>
                <button id="K" class="btn btn-default alphabet">K</button>
                <button id="L" class="btn btn-default alphabet">L</button>
                <button id="M" class="btn btn-default alphabet">M</button>
                <button id="N" class="btn btn-default alphabet">N</button>
                <button id="O" class="btn btn-default alphabet">O</button>
                <button id="P" class="btn btn-default alphabet">P</button>
                <button id="Q" class="btn btn-default alphabet">Q</button>
                <button id="R" class="btn btn-default alphabet">R</button>
                <button id="S" class="btn btn-default alphabet">S</button>
                <button id="T" class="btn btn-default alphabet">T</button>
                <button id="U" class="btn btn-default alphabet">U</button>
                <button id="V" class="btn btn-default alphabet">V</button>
                <button id="W" class="btn btn-default alphabet">W</button>
                <button id="X" class="btn btn-default alphabet">X</button>
                <button id="Y" class="btn btn-default alphabet">Y</button>
                <button id="Z" class="btn btn-default alphabet">Z</button>
                <button id="all_en" class="btn btn-default alphabet">All</button>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="btn-toolbar">
            <div class="btn-group btn-group-sm">
                <button id="Α" class="btn btn-default alphabet">Α</button>
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
                <button id="all_gr" class="btn btn-default alphabet">Όλα</button>
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
