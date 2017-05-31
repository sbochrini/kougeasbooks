<?php
use yii\helpers\Url;
?>

<?php if($categories != null): ?>
    <div class="list-group">
        <?php
        foreach($categories as $category):
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
        ?>
    </div>
<?php endif; ?>



