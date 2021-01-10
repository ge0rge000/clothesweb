$(document).ready(function(e){
  
    $("#login_user").on('submit',function(e){
       
        e.preventDefault();
        $.ajax({
            url:'Dashboard/fun/Register/login.php',
            type:'POST',
            data:new FormData(this),
            contentType: false,
            cache:false,
            processData:false,
            beforeSend:function(){
                $(".submitBtn").attr('disabled','disabled');
                $('login_user').css('optacity','0.5');
            },

            success: function(msg){
                    $(".show-msg").html("");
                    $(".show-msg").html(msg);    
                    $(".submitBtn").attr('disabled',);
                    $('#login_user').css('optacity','');


            },


        });

    });
})
    

