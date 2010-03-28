$(document).ready(function() {
    // if button driver clicked send driver reg form.
    $('#driver_button').click( function(){
        // ajax call.
        $.get("index.php?page=registerdriver", function(data){
        // set content div with returnde data.
            $('#content').html(data);
        });
    });

    // if button driver clicked send driver reg form.
    $('#passenger_button').click( function(){
    // ajax call.
        $.get("index.php?page=registerpassenger", function(data){
        // set content div with returnde data.
            $('#content').html(data);
        });
    });
});
