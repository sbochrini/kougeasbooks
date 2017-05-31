<?php
use yii\helpers\Url;
?>

<?php /*if($categories != null): */?><!--
    <div class="list-group">
        <?php
/*        foreach($categories as $category):
            if($category->cat_subcat){
                //echo '<div class="dropdown">';
                echo '<button class="list-group-item cat_subcat" type="button" data-toggle="collapse" data-target="#cat_'.$category->cat_id.'"  aria-expanded="false" aria-controls="cat_'.$category->cat_id.'">'.$category->cat_name.'<span class="caret"></span></button>';
                echo '<div id="cat_'.$category->cat_id.'" class="collapse">';
                foreach($category->subcategories as $subcategory):
                    echo '<button id="subcat_'.$subcategory->subcat_id.'" type="button" class="list-group-item subcat"><a href="#">'.$subcategory->subcat_name.'</a></button>';
                endforeach;
                echo "</div>";
               // echo '</div>';
            }else{
                //echo '<button id="cat_'.$category->cat_id.'" type="button" class="list-group-item catwithout"><a href="'.Url::toRoute(['site/bookspercat', 'id' => $category->cat_id]).'">'. $category->cat_name.'</a></button>';
                echo '<a id="cat_'.$category->cat_id.'" href="'.Url::toRoute(['site/bookspercat', 'id' => $category->cat_id]).'"type="button" class="list-group-item catwithout">'. $category->cat_name.'</a>';
            }

        endforeach;
        */?>
    </div>
--><?php /*endif; */?>

<?php if($categories != null): ?>
    <div class="panel-group category-products" id="accordian">
        <?php
        foreach($categories as $category):
                if($category->cat_subcat){
                    //echo '<div class="dropdown">';
                    echo '<div class="panel panel-default">';
                        echo '<div class="panel-heading">';
                            echo '<h4 class="panel-title">';
                                echo '<a class=" cat_subcat" data-toggle="collapse" href="#cat_'.$category->cat_id.'"  aria-expanded="false" aria-controls="cat_'.$category->cat_id.'">'.$category->cat_name.'<span class="pull-right"><i class="fa fa-plus"></i></span></a>';
                                //echo '<div id="cat_'.$category->cat_id.'" class="collapse">';
                            echo '</h4>';
                        echo '</div>';

                        echo '<div id="cat_'.$category->cat_id.'" class="panel-collapse collapse">';
                            echo '<div class="panel-body">';
                                echo '<ul>';
                                foreach($category->subcategories as $subcategory):
                                    echo '<li><a id="subcat_'.$subcategory->subcat_id.'" type="button" class=" subcat"><a href="#">'.$subcategory->subcat_name.'</a></li>';
                                endforeach;
                                echo '</ul>';
                            echo '</div>';
                        echo '</div>';
                     echo '</div>';
                }else{
                    echo '<div class="panel panel-default">';
                        echo '<div class="panel-heading">';
                            echo '<h4 class="panel-title">';
                            //echo '<button id="cat_'.$category->cat_id.'" type="button" class="list-group-item catwithout"><a href="'.Url::toRoute(['site/bookspercat', 'id' => $category->cat_id]).'">'. $category->cat_name.'</a></button>';
                                echo '<a id="cat_'.$category->cat_id.'" href="'.Url::toRoute(['site/bookspercat', 'id' => $category->cat_id]).'" class=" catwithout">'. $category->cat_name.'</a>';
                            echo '</h4>';
                        echo '</div>';
                    echo '</div>';
                }
        endforeach;
        ?>
    </div>
<?php endif; ?>

