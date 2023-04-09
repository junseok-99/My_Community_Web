<h2>이메일 중복체크 페이지</h2>

<?php
    $email=$_GET["email"];

        
    
    if($email){
        $con=mysqli_connect("localhost","root","","jjsproject");
    $sql="select email from member where email='$email'";
    $rs=mysqli_query($con,$sql);
    mysqli_close($con);

    
    echo "<hr>";
    $num=mysqli_num_rows($rs);
    if($num){//이미 사용 중
        echo "이미 사용중인 이메일 입니다.<br>";
        echo "다른 이메일을 사용해 주세요.<br>";
    }
    else{//사용가능
        echo "사용 가능한 이메일 입니다.<br>";
    }
    }
    else{
        echo "이메일을 입력해주세요<br>";
    }
    echo "<hr>";

    

?>
<input type="button" value="확인" id="yes" onclick="window.close()">
