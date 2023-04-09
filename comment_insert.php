<?php
    session_start();
    $id=$_SESSION["userid"];
    $com=$_POST["comment"];
    $bo_num=$_POST["bo_num"];
    $cmt_num=$_POST["cmt_num"];
    $time=date("Y. m. d. H : i");

    if(!$com){
        echo "<script>               
                alert('댓글을 입력해주세요.');
                history.go(-1);
                </script>";
    }
    else{
        $con=mysqli_connect("localhost","root","","jjsproject");
        $sql="insert into free_comment (board_num,comment_id, comment, time) values('$bo_num', '$id', '$com', '$time')";
        $rs=mysqli_query($con,$sql);

        $sql2="select*from member where id='$id'";
        $rs2=mysqli_query($con,$sql2);
        $ar=mysqli_fetch_array($rs2);

        $point=$ar["point"];
        $point+=50;
        $cmt_num++;
        
        $sql3="update member set point='$point' where id='$id'";
        $rs3=mysqli_query($con,$sql3);
        mysqli_close($con);

        echo "<script>               
                location.href='free_view.php?num={$bo_num}&cmt_num={$cmt_num}';
                </script>";
    }
?>