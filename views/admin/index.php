<?php
/* @var $this yii\web\View */
use yii\helpers\Html;

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-header">
    <h3>Στατιστικά Στοιχεία</h3>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <div role="button">
                            Αριθμός βιβλίων:
                            <span class="badge pull-right"><?php echo $books;?></span>
                        </div>
                    </h4>
                </div>
                <div class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body list-group">
                        <?php
                        echo  '<a href="#" class="list-group-item list-group-item-success">';
                        echo '<span class="badge">'.$available_books.'</span>';
                        echo 'Άμεσα Διαθέσιμα:</a>';
                        echo  '<a href="#" class="list-group-item list-group-item-danger">';
                        echo '<span class="badge">'.$no_available_books.'</span>';
                        echo 'Μη Διαθέσιμα:</a>';
                        ?>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingThree">
                    <h4 class="panel-title">
                        <div class="collapsed" role="button" data-toggle="collapse"  href="#collapseTwo">
                            Αριθμός βιβλίων ανά κατηγορία
                            <span class="glyphicon glyphicon-chevron-down pull-right"></span>
                        </div>
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body list-group">
                        <?php
                        for($i=0;$i<count($books_per_cat);$i++){
                            echo  '<a href="#" class="list-group-item">';
                            echo '<span class="badge">'.$books_per_cat[$i]['books'].'</span>';
                            echo $books_per_cat[$i]['cat_name'].':</a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">
                            <div role="button">
                                Αριθμός συγγραφέων:
                                <span class="badge pull-right"><?php echo $authors;?></span>
                            </div>
                        </h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <div role="button">
                                    Αριθμός Κατηγοριών:
                                    <span class="badge pull-right"><?php echo $num_categories;?></span>
                                </div>
                            </h4>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="cat_subcat_panel">
                            <h4 class="panel-title">
                                <div class="collapsed" role="button" data-toggle="collapse"  href="#cat_subcat_collapse">
                                    Αριθμός υποκατηγοριών ανά κατηγορία
                                    <span class="glyphicon glyphicon-chevron-down pull-right"></span>
                                </div>
                            </h4>
                        </div>
                        <div id="cat_subcat_collapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="cat_subcat_panel">
                            <div class="panel-body list-group">
                                <?php
                                for($i=0;$i<count($subcats_per_cat);$i++){
                                    echo  '<a href="#" class="list-group-item">';
                                    echo '<span class="badge">'.$subcats_per_cat[$i]['subcats'].'</span>';
                                    echo $subcats_per_cat[$i]['cat_name'].':</a>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingFour">
                    <h4 class="panel-title">
                        <div role="button">
                            Αριθμός Παραγγελιών:
                            <span class="badge pull-right"><?php echo $orders;?></span>
                        </div>
                    </h4>
                </div>
                <div  class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFour">
                    <div class="panel-body list-group">
                        <?php
                        echo  '<a href="#" class="list-group-item list-group-item-danger">';
                        echo '<span class="badge">'.$uncompleted_orders.'</span>';
                        echo 'Σε αναμονή:</a>';
                        echo  '<a href="#" class="list-group-item list-group-item-success">';
                        echo '<span class="badge">'.$completed_orders.'</span>';
                        echo 'Ολοκληρωμένες:</a>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="h_dublicate_book">
                <h4 class="panel-title">
                    <div class="collapsed" role="button" data-toggle="collapse"  href="#dublicate_book">
                        Διπλά Βιβλία:
                        <?php echo '<span class="badge">'.$count_duplicates.'</span>'; ?>
                        <span class="glyphicon glyphicon-chevron-down pull-right"></span>
                    </div>
                </h4>
            </div>
            <div id="dublicate_book" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body list-group">
                    <?php
                    for($i=0;$i<count($subcats_per_cat);$i++){
                        echo  '<div href="#" class="list-group-item">';
                        //echo '<strong>'.$duplicate_books[$i]['bk_title'].'</strong>';
                        echo "<table class='table table-hover table-condensed'><thead>";
                        echo '<tr class="danger"><th>Βιβλιο: <u>'.$duplicate_books[$i]['bk_title'].'</u> στις καηγορίες:<th></th></th></tr></thead>';
                        echo '<tbody>';
                        for($d=0;$d<count($duplicate_books[$i]['bk_cat']);$d++){
                            echo '<tr><td><li>'.$duplicate_books[$i]['bk_cat'][$d].'</td><td>'.Html::a('<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>', ['book/view', 'id' => $duplicate_books[$i]['bk_ids'][$d]]).'</td></li></tr>';
                        }
                        echo '</tbody>';
                        echo "</table>";
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


