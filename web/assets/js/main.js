/**
 * Created by Voula on 19/4/2017.
 */
$(function() {
    $('button.catwithout').on("click", function(){
        var str=$(this).attr("id");
        var res = str.split("_");
        var id =res[1];
        $.ajax({
            url: cat_url,
            type:'GET',
            data: {id:id},
            success  : function(response) {
                $('#mainpage').html(response);
            }
        });
    });

    $('button.subcat').on("click", function(){
        var str=$(this).attr("id");
        var res = str.split("_");
        var id =res[1];
        $.ajax({
            url: sub_url,
            type:'GET',
            data: {id:id},
            success  : function(response) {
                $('#mainpage').html(response);
            }
        });
    });


    //get url params

    $.fn._getURLParameter = function getURLParameter(name) {
        return decodeURI(
            (RegExp(name + '=' + '(.+?)(&|$)').exec(location.search)||[,null])[1]
        );
    }

});
$('document').ready(function(){

    /**
     * user defined functions
     */
    jQuery.fn.jplist.settings = {

        /**
         * PRICE: jquery ui range slider
         */
        priceSlider: function ($slider, $prev, $next){

            $slider.slider({
                min: 0,
                max: 100,
                range: true,
                values: [0, 100],
                slide: function (event, ui){
                    $prev.text(ui.values[0]+' €');
                    $next.text(ui.values[1]+' €');
                }
            });
        }

        /**
         * PRICE: jquery ui set values
         */
        ,priceValues: function ($slider, $prev, $next){

            $prev.text($slider.slider('values', 0)+' €');
            $next.text($slider.slider('values', 1)+' €');
        }
    };

    $('#demo').jplist({
        itemsBox: '.list',
        itemPath: '.list-item',
        panelPath: '.jplist-panel'
    });

    var url =window.location.href;
    if(url.indexOf("bookspercat") > -1) {
        var splited = url.split('bookspercat&id=');
        if (typeof splited[1] !== 'undefined') {
            var cat_id = splited[1];
            var cat_ele = document.getElementById('cat_' + cat_id);
            cat_ele.className += " in";
        }
    }
    if(url.indexOf("bookspersubcat") > -1) {
        var splited = url.split('bookspersubcat&id=');
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
        var splited = url.split('authorcatalog&letter=');
        if (typeof splited[1] !== 'undefined') {
            var letter = splited[1];
            var alphabet = document.getElementsByClassName("alphabet");
            for(var i = 0; i < alphabet.length; i++ ){
                if(alphabet[i].textContent === letter || alphabet[i].getAttribute("href").indexOf(letter)>-1){
                    letter_button=alphabet[i];
                    letter_button.style.color = "blue";
                }
            }
        }
    }


});

//------------index usr order modal---------------\\
$('#userorderModal').on('show.bs.modal', function(e) {

    var $modal = $(this);
    var bk_id = e.relatedTarget.id;
       $.ajax({
        type: 'POST',
        url: 'index.php?r=site/usrordermodal',
        data: {bk_id  : bk_id},
        success: function(data)
        {
           // $modal.find('.modal-content').html(data);
            $modal.find('.modal-body').html(data);
        }
    });

});

$(window).load(function() {
    $('#userindexorderModal').modal('show');
});

$('.cat_subcat').click(function(){
    var cat_id=$(this).attr('id');
  /*  $.ajax({
        type: 'GET',
        url: 'index.php?r=site/bookspercatwith',
        data: {id  : cat_id},
        success: function(data)
        {
            $('#booklist').html(data);
        }
    });*/
   url='index.php?r=site/bookspercat&id='+cat_id;
   // alert(url);
    window.location.href=url;

});


/*$('#usr_index_order_form').yiiActiveForm('add', {
    id: 'order-usr_name',
    name: 'Order[usr_name]',
    container: '.field-order-usr_name',
    input: '#order-usr_name',
    error: '.help-block',
    validate:  function (attribute, value, messages, deferred, $form) {
        yii.validation.required(value, messages, {message: "Validation Message Here"});
    }
});*/
/*
$('#usr_index_order_form').yiiActiveForm('validate', true);*/

$('#usr_index_order_form-form').on('beforeSubmit', function (e) {
    var data = $form.data("yiiActiveForm");
    if (!confirm("Everything is correct. Submit?")) {
        return false;
    }
    return true;
});
