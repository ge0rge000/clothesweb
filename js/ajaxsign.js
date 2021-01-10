$(document).ready(function(e){
  
    $("#signup_user").on('submit',function(e){
       
        e.preventDefault();
        $.ajax({
            url:'Dashboard/fun/Register/sign.php',
            type:'POST',
            data:new FormData(this),
            contentType: false,
            cache:false,
            processData:false,
            beforeSend:function(){
                $(".submitBtn").attr('disabled','disabled');
                $('signup_user').css('optacity','0.5');
            },

            success: function(msg){
                    $(".show-msgg").html("");
                    $(".show-msgg").html(msg);    
                    $(".submitBtn").attr('disabled',);
                    $('#signup_user').css('optacity','');


            },


        });

    });
   
})




