<?php
    $mode=$_GET['mode'];
    $num=$_GET['num'];

    $con=mysqli_connect("localhost","root","","jjsproject");
    $sql="delete from messagelist where num='$num'";
    mysqli_query($con,$sql);

    mysqli_close($con);

    echo "<script>
            location.href='msg_box.php?mode=$mode';
        </script>"
?>