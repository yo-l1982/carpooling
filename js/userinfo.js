$(document).ready(function() {
    // if button driver clicked send driver reg form.
    $('#user_logout').click( function(){
        // ajax call.
        $.get("index.php?page=userinfo&cmd=logout", function(data){
        // set content div with returnde data.
            $('#info').html(data);
        });
        $.get("index.php?page=listdrivers", function(data){
        // set content div with returnde data.
            $('#content').html(data);
        });
    });

});
