/**
 * Created by Voula on 19/4/2017.
 */
/*var check_name=0;
var check_surname=0;
var check_phone=0;
var check_email=0;
var has_email=0;*/
var delete_cookie = function(name) {
    document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
};

$(function() {
    /*$('button.catwithout').on('click', function() {

        delete_cookie('storage-name');
        let str=$(this).attr('id');
        let res = str.split('_');
        let id =res[1];
        $.ajax({
            url: cat_url,
            type: 'GET',
            data: {id: id},
            success: function(response) {
                $('#mainpage').html(response);
            },
        });
    });

    $('button.subcat').on('click', function() {
        delete_cookie('storage-name');
        let str=$(this).attr('id');
        let res = str.split('_');
        let id =res[1];
        $.ajax({
            url: sub_url,
            type: 'GET',
            data: {id: id},
            success: function(response) {
                $('#mainpage').html(response);
            },
        });
    });*/


    // get url params

    $.fn._getURLParameter = function getURLParameter(name) {
        return decodeURI(
            (RegExp(name + '=' + '(.+?)(&|$)').exec(location.search)||[, null])[1]
        );
    };

});
$('document').ready(function() {

    /**
     * user defined functions
     */
    jQuery.fn.jplist.settings = {

        /**
         * PRICE: jquery ui range slider
         */
        priceSlider: function($slider, $prev, $next) {

            $slider.slider({
                min: 0,
                max: 100,
                range: true,
                values: [0, 100],
                slide: function(event, ui) {
                    $prev.text(ui.values[0]+' €');
                    $next.text(ui.values[1]+' €');
                },
            });
        }

        /**
         * PRICE: jquery ui set values
         */
        , priceValues: function($slider, $prev, $next) {

            $prev.text($slider.slider('values', 0)+' €');
            $next.text($slider.slider('values', 1)+' €');
        },
    };

    $('#demo').jplist({
        itemsBox: '.list',
        itemPath: '.list-item',
        panelPath: '.jplist-panel',
        storage: 'cookies',
        storageName: 'storage-name',
        cookiesExpiration: -1
    });

    /* if(url.indexOf("bookspercat") > -1) {
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
    }*/
    let url =window.location.href;
    if (url.indexOf('authorcatalog') > -1) {
        let dec_url=decodeURI(url);
        let splited = dec_url.split('authorcatalog&letter=');
        if (typeof splited[1] !== 'undefined') {
            let letter = splited[1];
            let alphabet = document.getElementsByClassName('alphabet');
            for (let i = 0; i < alphabet.length; i++ ) {
                if (alphabet[i].textContent === letter ) {
                    letter_button=alphabet[i];
                   // alert(letter);
                    letter_button.style.backgroundColor = '#446f88';
                    letter_button.style.color = 'white';
                }
            }
        }
    }

    $('.cat_collapse i').on('click', function() {
        $(this).toggleClass('fa-plus fa-minus');
        // alert("despacito");
    });

// ---------------hover cat menu------------------\\
    $(".panel-default").hover(
        function() {
            var collapse = $(this).find(".panel-collapse");
            var icon=$(this).find("i");
            $(collapse).collapse("show");
            $(icon).removeClass("fa-plus");
            $(icon).addClass("fa-minus");
        }, function() {
            var collapse = $(this).find(".panel-collapse");
            var icon=$(this).find("i");
            $(collapse).collapse("hide");
            $(icon).removeClass("fa-minus");
            $(icon).addClass("fa-plus");
        }
    );
});

// ------------index usr order modal---------------\\
$('#userorderModal').on('show.bs.modal', function(e) {
    document.getElementById('usr_index_order_form').reset();
    $('.has-error').removeClass('has-error');
    $('.help-block').empty();
    // $("#usr_index_order_form").reset();
    let $modal = $(this);
    let bk_id = e.relatedTarget.id;
    $.ajax({
        type: 'POST',
        url: 'index.php?r=site/usrordermodal',
        data: {bk_id: bk_id},
        success: function(data)
        {
            // $modal.find('.modal-content').html(data);
            $modal.find('.modal-body').append(data);
            // $modal.find('.modal-footer').before(data);
        },
    });

});



$(window).load(function() {
    $('#userindexorderModal').modal('show');
});

$('.cat_subcat').click(function() {
    let cat_id=$(this).attr('id');
    /*  $.ajax({
     type: 'GET',
     url: 'index.php?r=site/bookspercatwith',
     data: {id  : cat_id},
     success: function(data)
     {
     $('#booklist').html(data);
     }
     });*/
    let url='index.php?r=site/bookspercat&id='+cat_id;
    // alert(url);
    window.location.href=url;

});

/* yii.confirm = function (message, okCallback, cancelCallback) {
    swal({
        title: message,
        type: 'warning',
        showCancelButton: true,
        closeOnConfirm: true,
        allowOutsideClick: true
    }, okCallback);
};*/

$('.hvr-grow').hover(function()
{
    let a=$(this).find('a');
    a.css({'color': 'white'});
});

$('.hvr-grow').mouseleave(function()
{
    let a=$(this).find('a');
    a.css({'color': '#446f88'});
});

