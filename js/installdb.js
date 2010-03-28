$(document).ready(function() {
    //get main content
    $('#installdbbutton').click(function(){
        // ajax call.
        $.get("index.php?page=installdb&cmd=installdb", function(data){
            // set content div with returnde data.
            $('body').html(data);
        });
    });
});