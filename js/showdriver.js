 $(document).ready(function() {
    //get main content
    $('#join_driver_button').click(function(){
        var driver_id = $('#driver_id').val();

        var url = "index.php?page=showdriver&cmd=join_driver&id=" + driver_id;
        // ajax call.
        $.get(url, function(data){
        // set content div with returnde data.
            $('#content').html(data);
        });
    });
 });