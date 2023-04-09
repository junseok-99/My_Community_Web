<?php
    $num=$_GET['num'];
    $cur_num=$_GET["cur_num"];
    $cmt_num=$_GET["cmt_num"];


    $con=mysqli_connect("localhost","root","","jjsproject");
    $sql="delete from free_comment where num='$num'";
    mysqli_query($con,$sql);
    mysqli_close($con);
    $cmt_num--;
    echo "<script>
            location.href='free_view.php?num={$cur_num}&cmt_num={$cmt_num}';
        </script>"
?>