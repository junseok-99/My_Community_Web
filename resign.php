<?php

    session_start();
    $id=$_SESSION["userid"];
    $reason=$_GET["reason"];
    if(!$reason)$reason="없음.";
    $time=date("Y-m-d (H:i)");

    $con=mysqli_connect("localhost","root","","jjsproject");
        $sql="delete from member where id='$id'";
        $sql2="insert into resignpage (id,reason,time)values('$id','$reason','$time')";
        $rs=mysqli_query($con,$sql);
        $rs2=mysqli_query($con,$sql2);

        unset($_SESSION["userid"]);
        echo "<script>
        alert('회원탈퇴가 되었습니다.');
        location.href='index2.php';
    </script>";
    mysqli_close($con);
?>
