$(document).ready(function() {
    //get main content ajax
    $.get("index.php?page=listdrivers", function(data){
        // set content div with returnde data.
        $('#content').html(data);
    });
    $.get("index.php?page=menu", function(data){
        // set content div with returnde data.
        $('#menu').html(data);
    });
    $.get("index.php?page=login", function(data){
        // set content div with returnde data.
        $('#info').html(data);
    });

    $.get("index.php?page=header", function(data){
        // set content div with returnde data.
        $('#header').html(data);
    });

    $.get("index.php?page=footer", function(data){
        // set content div with returnde data.
        $('#footer').html(data);
    });

        // if button driver clicked send driver reg form.
    $('#header').click( function(){
    // ajax call.
        $.get("index.php?page=listdrivers", function(data){
        // set content div with returnde data.
            $('#content').html(data);
        });
    });
});
