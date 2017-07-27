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

<script>
        var url =window.location.href;
        var splited;
        if(url.indexOf("bookspercat") > -1) {
            splited = url.split('bookspercat&id=');
            if (typeof splited[1] !== 'undefined') {
                var cat_id = splited[1];
                var cat_ele = document.getElementById('cat_' + cat_id);
                cat_ele.className += " in";
            }
        }
        if(url.indexOf("bookspersubcat") > -1) {
            splited = url.split('bookspersubcat&id=');
            if (typeof splited[1] !== 'undefined') {
                var subcat_id = splited[1];
                //alert(subcat_id);
                var subcat_ele = document.getElementById('subcat_' + subcat_id);
                var cat_subcat_eles = document.getElementsByClassName("panel-collapse");
                for(var i = 0; i < cat_subcat_eles.length; i++ ){
                    if(cat_subcat_eles[i].contains(subcat_ele)){
                        // alert(cat_subcat_eles[i].id);
                        catsubcat_ele=cat_subcat_eles[i];
                        catsubcat_ele.className += " in";
                    }
                }
            }
        }

        if(url.indexOf("authorcatalog") > -1) {
            var dec_url=decodeURI(url);
            splited = dec_url.split('authorcatalog&letter=');
            if (typeof splited[1] !== 'undefined') {
                var letter = splited[1];
                var alphabet = document.getElementsByClassName("alphabet");
                for(var i = 0; i < alphabet.length; i++ ){
                    if(alphabet[i].textContent === letter ){
                        letter_button=alphabet[i];
                        // alert(letter);
                        letter_button.style.backgroundColor = "#446f88";
                        letter_button.style.color = "white";
                    }/*else{
                     if(alphabet[i].getAttribute("href").indexOf(letter)>-1){
                     letter_button=alphabet[i];
                     alert(letter);
                     letter_button.style.backgroundColor = "#446f88";
                     letter_button.style.color = "white";
                     }
                     }*/
                }
            }
        }

</script>