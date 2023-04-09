<?php   
    

    $cmt=$_POST["cmt"];
    $num=$_POST["num"];
    $page=$_POST["page"];
    $time=date("Y. m. d. H : i");
    if(!$cmt){
        echo "<script>               
                alert('내용을 입력해주세요.');
                history.go(-1);
                </script>";
    }
    else{
        $con=mysqli_connect("localhost","root","","jjsproject");
        $sql="insert into report_comment (board_num, comment, time) values('$num', '$cmt', '$time')";
        $rs=mysqli_query($con,$sql);

        $sql2="update reportlist set report_check='1' where num='$num'";
        $rs2=mysqli_query($con,$sql2);
        
        mysqli_close($con);

        echo "<script>               
                location.href='report_box.php?page={$page}';
                </script>";
    }
?>