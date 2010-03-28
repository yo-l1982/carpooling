$(document).ready(function() {
    //get main content ajax
    $.get("index.php?page=start", function(data){
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
});
