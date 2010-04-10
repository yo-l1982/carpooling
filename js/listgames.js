$(document).ready(function() {
    $('.listgames_row').each(function(){
        $(this).click(function(){
            //ajax call
            $.get("index.php?page=listgames&id=" + $(this).attr('id'), function(data){
                // set content div with returnde data.
                gameinfo = data.split(',');
                $('#game_id').val(gameinfo[0]);
                $('#no_game_label').html(gameinfo[1]);
                $('#listgames').remove();
            });
        });
    });
});
