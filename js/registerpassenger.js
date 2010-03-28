$(document).ready(function() {
    //get main content
    $('#submitbutton').click(function(){
        // get form data
        var name = $('#name').val();
        var phonenumber = $('#phonenumber').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var url = "index.php?page=registerpassenger&cmd=save";
        // send form data as POST ajax
        $.post(url, {name: name, 
            phonenumber: phonenumber,
            password: password,
            email: email}, function(data){
            // set content div with returnde data.

            $('#content').html(data);
        });
    });

    // if password match! but not when booth are empty
    $('#repeat_password').keyup(function() {
        if ($('#repeat_password').val() == '' && $('#password').val() == '') {
            $('#password_match_error').css('visibility', 'hidden' );
        }
        else {
            if($('#repeat_password').val() == $('#password').val()) {
                $('#password_match_error').css('visibility', 'visible' );
            }
            else {
                $('#password_match_error').css('visibility', 'hidden' );
            }
        }
    });

    // if password match! but not when booth are empty
    $('#password').keyup(function() {
        if ($('#repeat_password').val() == '' && $('#password').val() == '') {
            $('#password_match_error').css('visibility', 'hidden' );
        }
        else {
            if($('#repeat_password').val() == $('#password').val()) {
                $('#password_match_error').css('visibility', 'visible' );
            }
            else {
                $('#password_match_error').css('visibility', 'hidden' );
            }
        }
    });
});