<?php
$id=$_POST["id"];
$pass1=$_POST["pass1"];$pass2=$_POST["pass2"];
$phn=$_POST["phn1"]."-".$_POST["phn2"]."-".$_POST["phn3"];
$add=$_POST["add"];
$email1=$_POST["email1"];
$email2=$_POST["email2"];
$email=$email1."@".$email2;
$sec_ques=$_POST["secret_ques"];
$sec_res=$_POST["secret_res"];
$pt=0;
$level=1;
$block_check=0;
$pass_ck=$_POST["pass_ck"];
$regist_time = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

if($id==""){
    echo "<script>
            alert('아이디를 입력해주세요');
            history.go(-1);
    </script>";
}
elseif($email1==""||$email2==""){
    echo "<script>
            alert('이메일을 입력해주세요');
            history.go(-1);
    </script>";
}
elseif($_POST["phn1"]==""||$_POST["phn2"]==""||$_POST["phn3"]==""){
    echo "<script>
            alert('핸드폰 번호를 입력해주세요');
            history.go(-1);
    </script>";
}
else if($id){
    
 
    if($email1!=""&&$email2!=""){
        if($_POST["phn1"]!=""&&$_POST["phn2"]!=""&&$_POST["phn3"]!=""){
    $con=mysqli_connect("localhost","root","","jjsproject");
    $sql="select id from member where id='$id'";
    $sql2="select email from member where email='$email'";
    $sql3="select phone_number from member where phone_number='$phn'";
    $rs=mysqli_query($con,$sql);
    $rs2=mysqli_query($con,$sql2);
    $rs3=mysqli_query($con,$sql3);
    mysqli_close($con);
    $num=mysqli_num_rows($rs);
    $num2=mysqli_num_rows($rs2);
    $num3=mysqli_num_rows($rs3);
if($num){//이미 사용 중
    echo "<script>
            alert('이미 사용중인 아이디입니다. 다른 아이디를 입력해주세요.');
            history.go(-1);
    </script>";
}
else if($num2){//이미 사용 중
    echo "<script>
            alert('이미 사용중인 이메일입니다. 다른 이메일를 입력해주세요.');
            history.go(-1);
    </script>";
}
else if($num3){//이미 사용 중
    echo "<script>
            alert('이미 가입된 핸드폰 번호입니다. 다른 핸드폰 번호를 입력해주세요.');
            history.go(-1);
    </script>";
}
else if($pass1==""||$pass2==""){
    echo "<script>
            alert('비밀번호를 입력해주세요');
            history.go(-1);
    </script>";
}
else if(!$sec_ques){
    echo "<script>
            alert('질문을 선택해주세요');
            history.go(-1);
    </script>";
}
else if(!$sec_res){
    echo "<script>
            alert('질문에 대한 정답을 입력해주세요');
            history.go(-1);
    </script>";
}

else if($pass_ck=="false"){
    echo "<script>
            alert('비밀번호가 일치하지 않습니다.');
            history.go(-1);
    </script>";
}
else{
    session_start();
    $con=mysqli_connect("localhost","root","","jjsproject");
    $sql="insert into member (id,password,phone_number,email,level,point,address,secret_question,secret_response,block,regist_time)
     values('$id','$pass1','$phn','$email','$level','$pt','$add','$sec_ques','$sec_res','$block_check','$regist_time')";
    $rs=mysqli_query($con,$sql);
    
    mysqli_close($con);

    echo "<script>
            location.href='index2.php';
            alert('회원가입을 축하합니다.');
    </script>";

    $_SESSION['userid']=$id;
}
} }}



    
?>