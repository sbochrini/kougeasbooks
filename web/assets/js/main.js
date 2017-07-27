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
    var url='index.php?r=site/bookspercat&id='+cat_id;
    // alert(url);
    window.location.href=url;

});

/*yii.confirm = function (message, okCallback, cancelCallback) {
    swal({
        title: message,
        type: 'warning',
        showCancelButton: true,
        closeOnConfirm: true,
        allowOutsideClick: true
    }, okCallback);
};*/

$('.hvr-grow').hover(function ()
{
    var a=$(this).find('a');
    a.css({"color": "white"});
});

$('.hvr-grow').mouseleave(function ()
{
    var a=$(this).find('a');
    a.css({"color": "#446f88"});
});

