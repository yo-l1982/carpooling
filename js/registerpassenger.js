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

    $('#help_save_user').click(function() {
        //Show list of games or collapse depending on if it is shown
        if ($('#help_save_user_popup').size() == 0){
            //Set URL for GET
            $.get("index.php?page=help&cmd=save_user", function(data){
                //Set returned data as "popup
                $('#help_save_user').after(data);
            });
        }
        else {
            // remove if shown
            $('#help_save_user_popup').remove();
        }

    });
});