
$(document).ready(function() {
    $('#checkboxMain').on('click',function(e){
        if($(this).is(':checked',true)){
            $(".checkbox").prop('checked',true);
        }else{
            $(".checkbox").prop('checked',false);
        }
    });

    $('.checkbox').on('click',function(e){
        if($('.checkbox:checked').length==$('.checkbox').length){
            $("#checkboxMain").prop('checked',true);
        }else{
            $("#checkboxMain").prop('checked',false);
        }
    });
});