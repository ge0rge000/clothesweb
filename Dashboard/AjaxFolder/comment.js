$(document).ready(function(e){

    $("#comment").on('submit',function(e){


        e.preventDefault();

        $.ajax({
            url:'Dashboard/fun/commentProducts/add_comment.php',
            type:'POST',
            data:new FormData(this),
            contentType:false,
            cache:false,
            processData:false,
            beforeSend:function(){
                $(".submitBtn").attr('disabled','disabled');
                $('comment').css('optacity','0.5');
            },
            success:function(msg){
                $(".show-msg").html("");
                    $(".show-msg").html(msg);    
                    $(".submitBtn").attr('disabled',);
                    $('#comment').css('optacity','');

            }
            
        })
        
    })
})