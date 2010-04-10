$(document).ready(function() {

    $('#signup_driver').click( function(){
        // ajax call.
        $.get("index.php?page=registerdriver", function(data){
        // set content div with returnde data.
            $('#content').html(data);
        });
    });

});
