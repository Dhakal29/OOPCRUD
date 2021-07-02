$(document).ready(function(){
    $("#email").blur(function(){
        var email = $(this).val();
        $.ajax({
            url:"emailcheck.php",
            method:"POST",
            data:{email:email},
            datatype:"text",
            success:function(html)
            {
                $('#availability').html(html);
                $('#availability').css('color','blue');
            }
        });
    });
    $('#psw-repeat').keyup(function(){
        var psw = $('#psw').val();
        var cpsw = $('#psw-repeat').val();
        if(cpsw!=psw){
            $('#psd_display').html('**Password not matched');
            $('#psd_display').css('color','red');
            return false;
        }else{
            $('#psd_display').html('');
            return true;
        }

    });


});