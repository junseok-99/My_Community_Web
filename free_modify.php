<?php
    $num=$_POST["num"];
    $sub=$_POST["subject"];
    $content=$_POST["content"];
    $day=date("Y. m. d. H : i");

    $subject=htmlspecialchars($subject,ENT_QUOTES);
    $content=htmlspecialchars($content,ENT_QUOTES);

    $con=mysqli_connect("localhost","root","","jjsproject");
    $sql="update free_board set subject='$sub'  where num='$num'";
    $sql2="update free_board set content='$content'  where num='$num'";
    $sql3="update free_board set regist_day='$day'  where num='$num'";

    $rs=mysqli_query($con,$sql);
    $rs2=mysqli_query($con,$sql2);
    $rs3=mysqli_query($con,$sql3);

    mysqli_close($con);

    echo "<script>               
                alert('수정이 완료되었습니다.');
                location.href='free_view.php?num={$num}';
                </script>";
                   
    
?>