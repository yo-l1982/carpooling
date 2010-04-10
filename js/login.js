$(document).ready(function() {
    $('#login_button').click(function(){
        var user = $('#user_login').val();
        var password = $('#password_login').val();
        // ajax call.
        var url = "index.php?page=login&cmd=login";
        //Send form data as POST
        $.post(url, {
            user: user,
            password: password
        }, function(data){
            //Set div info to data posted back
            if (data == 'false') {
                $('#user_login').val('');
                $('#password_login').val('');
                alert('Fel inloggning!!');

            }
            else {
                $('#info').html(data);
            }
        });
    });
    $('#password_login').keypress(function(event){
        if(event.keyCode == 13){
            var user = $('#user_login').val();
            var password = $('#password_login').val();
            // ajax call.
            var url = "index.php?page=login&cmd=login";
            //Send form data as POST
            $.post(url, {
                user: user,
                password: password
            }, function(data){
                //Set div info to data posted back
                if (data == 'false') {
                    $('#user_login').val('');
                    $('#password_login').val('');
                    alert('Fel inloggning!!');

                }
                else {
                    $('#info').html(data);
                }
            });
        }
    });

});
