$(document).ready(function(e){

  $("#checkout").on('submit',function(e){
    e.preventDefault();

    $.ajax({
        url:"Dashboard/fun/checkout/checkout_add.php",
        type:'POST',
        data:new FormData(this),
        contentType: false,
        cache:false,
        processData:false,
        beforeSend:function(){
            $(".submitBtn").attr('disabled','disabled');
            $('checkout').css('optacity','0.5');
        },

        success: function(msg){
                $(".show-msggg").html("");
                $(".show-msggg").html(msg);    
                $(".submitBtn").attr('disabled',);
                $('#checkout').css('optacity','');
                


        }

  })
})
})