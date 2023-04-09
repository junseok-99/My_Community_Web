<?php
    session_start();

    $id=$_POST["id"];
    $pass=$_POST["pass"];
    $_SESSION["userid"]=$id;

    $con=mysqli_connect("localhost","root","","jjsproject");
    $sql="select id from member where id='$id'";
    $rs=mysqli_query($con,$sql);
    mysqli_close($con);
    $num=mysqli_num_rows($rs);
    if($num){
        echo "<script>
                alert('아이디가 존재하지 않습니다.');
                history.go(-1);
        </script>";
    }
?>