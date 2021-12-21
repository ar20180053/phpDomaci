<?php require_once "../classes/film.php";
$film = new Film;
echo $film->load();
?>
<script type="text/javascript">
    $('.del').click(function() {
        var id = $(this).attr('id');
        $.ajax({
            url: 'methods/delete.php',
            type: 'POST',
            data: {
                id: id
            },
            success: function(data) {
                $("#table").load("methods/load.php");
            }
        });
    });
</script>