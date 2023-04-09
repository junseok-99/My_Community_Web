<h2>핸드폰 번호 중복체크 페이지</h2>
<?php
    $phn=$_GET["phn"];

    if($phn){
        $con=mysqli_connect("localhost","root","","jjsproject");
    $sql="select phone_number from member where phone_number='$phn'";
    $rs=mysqli_query($con,$sql);
    mysqli_close($con);

    
    echo "<hr>";
    $num=mysqli_num_rows($rs);
    if($num){//이미 사용 중
        echo "이미 가입된 번호 입니다.<br>";
        echo "다른 핸드폰 번호를 입력해 주세요.<br>";
    }
    else{//사용가능
        echo "사용 가능한 번호 입니다.<br>";
    }
    }
    else{
        echo "핸드폰 번호를 입력해주세요<br>";
    }
    echo "<hr>";

    

?>
<input type="button" value="확인" id="yes" onclick="window.close()">
