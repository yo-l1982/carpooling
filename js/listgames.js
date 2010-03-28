$(document).ready(function() {
    $('.listgames_row').each(function(){
        $(this).click(function(){
            //ajax call
            $.get("index.php?page=registerdriver&id=" + $(this).attr('id'), function(data){
                // set content div with returnde data.
                $('#content').html(data);
            });
        });
    });
});
