/**
 * Created by Voula on 19/4/2017.
 */
yii.confirm = function (message, okCallback, cancelCallback) {
    swal({
        title: message,
        type: 'warning',
        showCancelButton: true,
        closeOnConfirm: true,
        cancelButtonText: 'Ακύρωση',
        allowOutsideClick: true
    }, okCallback);
};
//========================active current tab===================\\
$(function() {
    var str=location.href;
    var String=str.substring(str.lastIndexOf("r=")+2,str.lastIndexOf("%2F"));
    //console.log(String);
    var url=location.pathname+'?r='+String+'%2Findex';
    $('nav a[href="' + url + '"]').parent().addClass('active');
});
//=================================================================//

/* To initialize BS3 popovers set this below */
$(function () {
    $("[data-toggle='popover']").popover({title: "<h5><strong>Υποκατηγορίες</strong></h5>", html: true, placement: "right"});
});

//------------index admin comment in orders---------------\\
$('#admincommentModalindex').on('show.bs.modal', function(e) {

    var $modal = $(this);
    var order_id = e.relatedTarget.id;
    var index=1;
    var page= $_GET('page');
            $.ajax({
                type: 'POST',
                url: 'index.php?r=order/modalcomment',
                data: {order_id  : order_id, index : index, page : page},
                success: function(data)
                {
                 $modal.find('.modal-content').html(data);
                }
           });

});
//-----------------------------------------------------------\\
//---------------bootstrap toggle for change status------------------\\
$('input.toggle-event').change(function() {
    var status=$(this).prop('checked');
    var id=$(this).attr('id');
    var index=1;
    var page= $_GET('page');
        $.ajax({
        type: 'GET',
        url: 'index.php?r=order/changeorderstatus',
        data: {id  : id, index : index, page : page},
        success: function(data)
        {
            //$modal.find('.modal-content').html(data);
        }
    });
})
//-----------------------------------------------------------------\\
$(function() {
    //-----------create-------------\\
    var add_subcat_counter=0;
    $('#add_subcat').on("click", function(){
        $("#add_inputs_container").append('<input id="bookcategory-subcat" class="form-control" name="BookCategory[subcats]['+add_subcat_counter+']" maxlength="225" aria-invalid="false" type="text"><div class="help-block"></div>');
        add_subcat_counter++;
    });

    $('#btn_cat_create').on("click", function(){
        add_subcat_counter=0;
    });

    //--------------------------------------\\

    //-----------update------------------\\

    $('#update_add_subcat').on("click",function(){
        $("#add_inputs_container").append('<div class="row"><div class="col-sm-11"><input id="new_bookcategory-subcat_'+add_subcat_counter+'" class="form-control" name="BookCategory[new_subcats]['+add_subcat_counter+']" maxlength="225" aria-invalid="false" type="text"></div><div class="col-sm-1"><button type="button" id="'+add_subcat_counter+'" class="new_rmv_subcat_input btn btn-xs"><i class="fa fa-trash-o" aria-hidden="true"></i></button></div></div><div id="new_help-block_'+add_subcat_counter+'" class="help-block"></div>');
        add_subcat_counter++;
    });

    $('#btn_cat_update').on("click", function(){
        add_subcat_counter=0;
    });

    $('.rmv_subcat_input').on('click',function () {
        var button_id = $(this).attr('id');
        //alert(button_id);
        //var input_id ="bookcategory-subcat_"+button_id;*
        $('#bookcategory-subcat_'+button_id).parent().parent().remove();
        $('#help-block_'+button_id).remove();
    });

    $(document).on('click','button.new_rmv_subcat_input',function () {
        var button_id = $(this).attr('id');
       // alert(button_id);
        //var input_id ="bookcategory-subcat_"+button_id;*
        $('#new_bookcategory-subcat_'+button_id).parent().parent().remove();
        $('#new_help-block_'+button_id).remove();
    });
    //--------------------------------------------\\

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

   /* $.fn._getURLParameter = function getURLParameter(name) {
        return decodeURI(
            (RegExp(name + '=' + '(.+?)(&|$)').exec(location.search)||[,null])[1]
        );
    }*/

});
//---------------------favorite------------------------\\
$("i.fa-heart-o").on('click', function(){
    $(this). toggleClass('fa-heart-o fa-heart');
    //alert("favorite");
    var bk_id=$(this).parent().attr('id');
    $.ajax({
        type: 'GET',
        url: 'index.php?r=book/favorite',
        data: {bk_id: bk_id,favorite:1},
        success: function (data) {
            //$modal.find('.modal-content').html(data);
        }
    });
});

$('i.fa-heart').on('click', function(){
    $(this). toggleClass('fa-heart fa-heart-o');
    //alert("unfavorite");
    var bk_id=$(this).parent().attr('id');
    $.ajax({
        type: 'GET',
        url: 'index.php?r=book/favorite',
        data: {bk_id: bk_id, favorite:0},
        success: function (data) {
            //$modal.find('.modal-content').html(data);
        }
    });

});
//---------------------------------------------------------\\

    function $_GET(param) {
    var vars = {};
    window.location.href.replace( location.hash, '' ).replace(
        /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
        function( m, key, value ) { // callback
            vars[key] = value !== undefined ? value : '';
        }
    );

    if ( param ) {
        return vars[param] ? vars[param] : null;
    }
    return vars;
}

$(document).ready(function () {

    $('#bookcategory-cat_id > label > input[type="checkbox"]').change(function () {
        var cat_value = this.value;
        if (this.checked) {
            $('input[value="'+cat_value+'"]').attr("id", "cat_"+cat_value);
            $.ajax({
                type: 'GET',
                url: 'index.php?r=book/subcatcheckboxes',
                data: {cat_id  : cat_value},
                success: function(data)
                {
                    if(data){
                        var has_subs=1;
                        $("<div id=checkboxes_"+cat_value+" class='div_subcat_checkboxes'></div>").insertAfter($("#cat_"+cat_value).parent());
                        $("#checkboxes_"+cat_value).html(data);
                        $("#checkboxes_"+cat_value).next('br').remove();
                    }
                }
            });
        }else{
            var ele=document.getElementById("checkboxes_"+cat_value);
           // alert(ele.id);
            if(ele!==null){
                $("#checkboxes_"+cat_value).remove();
                $("<br>").insertAfter($("#cat_"+cat_value).parent());
            }


        }


        /*var grouping_inputs = $('#book-bk_grouping  input[type="checkbox"]');
        var $hidden_ids = [];
        var ischecked = $('input[name="BookCategory[cat_id][]"]:checked').length;
        //alert(ischecked);
        if (this.checked) {

            var i = 0;
            grouping_inputs.each(function (index) {
                if ($(this).attr('id') !== cat_value) {
                    //$(this).parent().hide();
                    $(this).prop('disabled',true);
                    $(this).parent().css('color','#dddddd');
                    $hidden_ids[i] = $(this).attr('id');
                    i++;
                }
            });
        } else if ($(this).not(':checked')) {
            grouping_inputs.each(function (index) {
                if ($(this).attr('id') !== cat_value) {
                    //$(this).parent().show();
                    $(this).prop('disabled', false);
                    $(this).parent().css('color','#000000');
                }
            });
        }
        console.log($hidden_ids);*/
    });
});

/*

$('#order_form').yiiActiveForm('add', {
    id: 'order_bk_id_1',
    name: 'Order[order_bk_id]',
    container: '.field-order-order_bk_id',
    input: '#order-order_bk_id_1',
    error: '.help-block',
    validate:  function (attribute, value, messages, deferred, $form) {
        yii.validation.required(value, messages, {message: "Validation Message Here"});
    }
});*/
