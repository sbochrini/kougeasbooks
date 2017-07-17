<?php
use yii\helpers\Url;
?>

<?php if($categories != null): ?>
    <div class="panel-group category-products" id="accordian">
        <?php
        foreach($categories as $category):
                if($category->cat_subcat){
                    //echo '<div class="dropdown">';
                    echo '<div class="panel panel-default">';
                        echo '<div class="panel-heading hvr-grow">';
                            echo '<h4 class="panel-title">';
                                //echo '<a id="'.$category->cat_id.'" class="cat_subcat" data-toggle="collapse" href="#cat_'.$category->cat_id.'"  aria-expanded="false" aria-controls="cat_'.$category->cat_id.'">'.$category->cat_name.'<span class="pull-right"><i class="fa fa-plus"></i></span></a>';
                    echo '<a data-toggle="collapse" href="#cat_'.$category->cat_id.'"  aria-expanded="false" aria-controls="cat_'.$category->cat_id.'"><span class="cat_collapse pull-right"><i class="fa fa-plus"></i></span><a href=# class="cat_subcat" id="'.$category->cat_id.'">'.$category->cat_name.'</a></a>';
                    //echo '<div id="cat_'.$category->cat_id.'" class="collapse">';
                            echo '</h4>';
                        echo '</div>';

                        echo '<div id="cat_'.$category->cat_id.'" class="panel-collapse collapse">';
                            echo '<div class="panel-body">';
                                echo '<ul>';
                                foreach($category->subcategories as $subcategory):
                                    echo '<li><a id="subcat_'.$subcategory->subcat_id.'" type="button" class=" subcat"><a href="'.Url::toRoute(['site/bookspersubcat', 'id' => $subcategory->subcat_id]).'">'.$subcategory->subcat_name.'</a></li>';
                                endforeach;
                                echo '</ul>';
                            echo '</div>';
                        echo '</div>';
                     echo '</div>';
                }else{
                    echo '<div class="panel panel-default">';
                        echo '<div class="panel-heading  hvr-grow">';
                            echo '<h4 class="panel-title">';
                            //echo '<button id="cat_'.$category->cat_id.'" type="button" class="list-group-item catwithout"><a href="'.Url::toRoute(['site/bookspercat', 'id' => $category->cat_id]).'">'. $category->cat_name.'</a></button>';
                                echo '<a id="cat_'.$category->cat_id.'" href="'.Url::toRoute(['site/bookspercat', 'id' => $category->cat_id]).'" class="catwithout">'. $category->cat_name.'</a>';
                            echo '</h4>';
                        echo '</div>';
                    echo '</div>';
                }
        endforeach;
        ?>
    </div>
<?php endif; ?>

