$(document).ready(function() {
    $('.list_drivers_row').each(function(){
        $(this).click(function(){
            // get the driver registration form.
            $.get("index.php?page=showdriver&id=" + $(this).attr('id') , function(data){
                // set content div with returnde data.
                $('#content').html(data);
            });
        });
    });
});