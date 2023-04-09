<h2>아이디 중복체크 페이지</h2>

<?php
    $id=$_GET["id"];

    if($id){
        $con=mysqli_connect("localhost","root","","jjsproject");
    $sql="select id from member where id='$id'";
    $rs=mysqli_query($con,$sql);
    mysqli_close($con);

    
    echo "<hr>";
    $num=mysqli_num_rows($rs);
    if($num){//이미 사용 중
        echo "이미 사용중인 아이디 입니다.<br>";
        echo "다른 아이디를 사용해 주세요.<br>";
    }
    else{//사용가능
        echo "사용 가능한 아이디 입니다.<br>";
    }
    }
    else{
        echo "아이디를 입력해주세요<br>";
    }
    echo "<hr>";

    

?>
<input type="button" value="확인" id="yes" onclick="window.close()">
