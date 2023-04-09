<?php
    

    $id=$_POST["id"];
    $pass=$_POST["pass"];
    

    $con=mysqli_connect("localhost","root","","jjsproject");
    $sql="select * from member where id='$id'";
    $rs=mysqli_query($con,$sql);
    
    $num=mysqli_num_rows($rs);
    if($num){
        $row=mysqli_fetch_array($rs);
        $num_pass=$row["password"];
        mysqli_close($con);

        if($pass!=$num_pass){
            echo "<script>                
                alert('비밀번호가 일지하지 않습니다.');
                history.go(-1);
        </script>";
        }
        
        
        else{
        session_start();
        $_SESSION["userid"]=$id;
        echo "<script>                
            location.href='index2.php';
        </script>";
    }
    }
    else{
        echo "<script>                
                alert('아이디가 존재하지 않습니다.');
                history.go(-1);
        </script>";
    }
?>