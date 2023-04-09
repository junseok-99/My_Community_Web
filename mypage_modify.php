<?php
    $id=$_POST["userid"];
    $pass=$_POST["my_pass"];
    $ques=$_POST["my_ques"];
    $res=$_POST["my_res"];

    if(!$pass){
        echo "<script>
        alert('변경할 비밀번호를 입력해주세요.');
        history.go(-1);
            </script>";
    }
    else if(!$res){
        echo "<script>
        alert('변경할 답을 입력해주세요.');
        history.go(-1);
            </script>";
    }
    else{
        $con=mysqli_connect("localhost","root","","jjsproject");

        $sql="update member set password='$pass' where id='$id'";
        $sql2="update member set secret_question='$ques' where id='$id'";
        $sql3="update member set secret_response='$res' where id='$id'";

        $rs=mysqli_query($con,$sql);
        $rs2=mysqli_query($con,$sql2);
        $rs3=mysqli_query($con,$sql3);
        
        mysqli_close($con);

        echo "<script>
        alert('회원정보가 수정되었습니다.');
        history.go(-1);
            </script>";
        
    }
    

    
?>