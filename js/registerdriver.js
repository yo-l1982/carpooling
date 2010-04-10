$(document).ready(function() {

    //Add the datepicker.
    $("#datepicker").datepicker({
        dateFormat: 'yy-mm-dd'
    });

    //Assign submitbutton clickevent
    $('#submitbutton').click(function(){
        //Collect form data
        var game_id = $('#game_id').val();
        var seats = $('#seats').val();
        var meetingpoint = $('#meetingpoint').val();
        var date = $('#datepicker').val();
        var time = $('#hour').val() + ':' + $('#minute').val();
        var name = $('#name').val();
        var email = $('#email').val();
        var phonenumber = $('#phonenumber').val();
        var message = $('#message').val();
        var password = $('#password').val();
        var repeat_password = $('#repeat_password').val();
        var save_user = $('#save_user').val();
        //validate all required field.
        var all_required_fields = true;
        if (game_id.replace(/^\s+|\s+$/g, '')  == '') {
            all_required_fields = false;
            $('#game_error').css('visibility', 'visible' );
        }
        else {
            $('#game_error').css('visibility', 'hidden' );
        }

        if (meetingpoint.replace(/^\s+|\s+$/g, '')  == '') {
            all_required_fields = false;
            $('#meetingpoint_error').css('visibility', 'visible' );
        }
        else {
            $('#meetingpoint_error').css('visibility', 'hidden' );
        }
        
        if (date.replace(/^\s+|\s+$/g, '') == '') {
            all_required_fields = false;
            $('#date_error').css('visibility', 'visible' );
        }
        else {
            $('#date_error').css('visibility', 'hidden' );
        }

        if (name.replace(/^\s+|\s+$/g, '') == '') {
            all_required_fields = false;
            $('#name_error').css('visibility', 'visible' );
        }
        else {
            $('#name_error').css('visibility', 'hidden' );
        }

        if (email.replace(/^\s+|\s+$/g, '') == '') {
            all_required_fields = false;
            $('#email_error').css('visibility', 'visible' );
        }
        else {
            $('#email_error').css('visibility', 'hidden' );
        }

        if (password == '') {
            all_required_fields = false;
            $('#password_error').css('visibility', 'visible' );
        }
        else {
            $('#password_error').css('visibility', 'hidden' );
        }
        // no required field can be empty
        if (all_required_fields) {
            //password must match
            if (repeat_password == password){
                //Set URL for POST
                var url = "index.php?page=registerdriver&cmd=save";
                //Send form data as POST
                $.post(url, {
                    name: name,
                    phonenumber: phonenumber,
                    game_id: game_id,
                    password: password,
                    seats: seats,
                    meetingpoint: meetingpoint,
                    date: date,
                    time: time,
                    email: email,
                    message: message,
                    save_user: save_user
                }, function(data){

                    //Set div Content to data posted back
                    $('#content').html(data);
                });
            }
            else {
                $('#repeat_password_error').css('visibility', 'visible' );
            }
        }
    });

    //Assign gamebutton clickevent
    $('#gamebutton').click(function(){

        //Show list of games or collapse depending on if it is shown
        if ($('#listgames').size() == 0){
            //Set URL for GET
            $.get("index.php?page=listgames", function(data){

                //Set returned data as "popup
                $('#gamebutton').after(data);
            });
        }
        else {
            // remove if shown
            $('#listgames').remove();
        }
    });

    // if password macth! but not when booth are empty
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
                $('#repeat_password_error').css('visibility', 'hidden' );
            }
        }
    });

    // if password macth! but not when booth are empty
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
 