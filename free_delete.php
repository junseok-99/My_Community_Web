<?php
    $num=$_GET['num'];

    $con=mysqli_connect("localhost","root","","jjsproject");
    $sql="delete from free_board where num='$num'";
    mysqli_query($con,$sql);
    mysqli_close($con);

    echo "<script>
            location.href='free_board.php?turn=time';
        </script>"
?>