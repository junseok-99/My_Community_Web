<?php
    $num=$_GET["num"];
    $page=$_GET["page"];

    $con=mysqli_connect("localhost","root","","jjsproject");
    $sql="delete from reportlist where num='$num'";
    $rs=mysqli_query($con,$sql);
    $sql2="delete from report_comment where board_num='$num'";
    $rs2=mysqli_query($con,$sql2);
    
    mysqli_close($con);

    echo "<script>
            location.href='report_box.php?page=$page';
        </script>";

?>