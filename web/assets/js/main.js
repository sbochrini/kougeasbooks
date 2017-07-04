/**
 * Created by Voula on 19/4/2017.
 */
var check_name=0;
var check_surname=0;
var check_phone=0;
var check_email=0;
var has_email=0;

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

    $('.cat_collapse i').on('click',function(){
        $(this).toggleClass('fa-plus fa-minus');
        //alert("despacito");
    });

});

//------------index usr order modal---------------\\
$('#userorderModal').on('show.bs.modal', function(e) {
    document.getElementById("usr_index_order_form").reset();
    $(".has-error").removeClass('has-error');
    $(".help-block").empty();
    //$("#usr_index_order_form").reset();
    var $modal = $(this);
    var bk_id = e.relatedTarget.id;
    $.ajax({
        type: 'POST',
        url: 'index.php?r=site/usrordermodal',
        data: {bk_id  : bk_id},
        success: function(data)
        {
            // $modal.find('.modal-content').html(data);
            $modal.find('.modal-body').append(data);
            //$modal.find('.modal-footer').before(data);
        }
    });

    /*$('#usr_index_order_form').on('keyup', function (e) {
        var which_input=$(this).attr('id');
       alert(which_input);
        if( !$("#order-usr_name").val() || $.trim($("#order-usr_name").val()) === ""){
            $("div.field-order-usr_name").addClass('has-error');
            $(".field-order-usr_name > .help-block").append("Το πεδίο είναι υποχρεωτικό.");
            check_name=0;
        }else{
            $("div.field-order-usr_name").removeClass('has-error');
            $(".field-order-usr_name > .help-block").empty();
            check_name=1;
        }
        if( !$("#order-usr_surname").val() || $.trim($("#order-usr_surname").val()) === "" ){
            $("div.field-order-usr_surname").addClass('has-error');
            $(".field-order-usr_surname > .help-block").append("Το πεδίο είναι υποχρεωτικό.");
            check_surname=0;
        }else{
            check_surname=1;
        }
        if( !$("#order-usr_phone").val() || $.trim($("#order-usr_phone").val()) === ""  ){
            $("div.field-order-usr_phone").addClass('has-error');
            $(".field-order-usr_phone > .help-block").append("Το πεδίο είναι υποχρεωτικό.");
            check_phone=0;
        }else{
            if(!$.isNumeric($("#order-usr_phone").val())){
                $("div.field-order-usr_phone").addClass('has-error');
                $(".field-order-usr_phone > .help-block").append("Το πεδίο τηλέφωνο πρέπει να είναι αριθμός.");
                check_phone=0;
            }else{
                check_phone=1;
            }
        }

        var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        var email=$("#order-usr_email").val();
        if($.trim(email)!==""){
            has_email=1;
            if (testEmail.test(email)){
                check_email=1;
            }else{
                $("div.field-order-usr_email").addClass('has-error');
                $(".field-order-usr_email > .help-block").append("Το πεδίο e-mail πρέπει να είναι έγκυρη ηλεκτρονική διεύθυνση.");
                check_email=0;
            }
        }


        if(check_name===0 || check_surname===0 || check_phone===0 ||check_email === 0) {
            e.preventDefault();
            alert("alalal");
            return false;
        } else {
            alert("xxxxxxxxxxx");
            $.ajax({
                type: 'POST',
                url: 'index.php?r=site/usrindexorder',
                data: $("#usr_index_order_form").serialize(),
                success: function (response) {

                }
            });
        }
    });*/
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

yii.confirm = function (message, okCallback, cancelCallback) {
    swal({
        title: message,
        type: 'warning',
        showCancelButton: true,
        closeOnConfirm: true,
        allowOutsideClick: true
    }, okCallback);
};