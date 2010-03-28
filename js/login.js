$(document).ready(function() {
    $('#login_button').click(function(){
        var user = $('user_login').val();
        var password = $('password_login').val();
        // ajax call.
        var url = "index.php?page=login&cmd=login";
        //Send form data as POST
        $.post(url, {user: user,
                    password: password
        }, function(data){
            //Set div info to data posted back
            $('#info').html(data);
        });
 
    });
});
