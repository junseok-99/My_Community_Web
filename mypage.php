<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>마이페이지</title>
</head>
<body>
<header>
        <?php
            include "header.php";
        ?>
    </header>
    <?php
        $id=$_GET["id"];
        $level_name=$_GET["levelname"];
        $con=mysqli_connect("localhost","root","","jjsproject");
        $sql="select * from member where id='$id'";
        $rs=mysqli_query($con,$sql);
        $row=mysqli_fetch_array($rs);

        
    ?>
    
    <h2 style="text-align:center;">마이페이지</h2><br>
    <div id="mypage_div">
        
        <form action="mypage_modify.php" method="post" name="mypage">
            <input type="hidden" value="<?=$id?>" name="userid">
            <ul>
                <li><b>아이디 :</b> <?=$id?></li>
                <li><b>나의 등급 :</b> <?=$level_name?> </li>
                <li><b>포인트 :</b> <?=$row["point"]?> </li>
                <li><b>비밀번호 :</b> <?=$row["password"]?> </li>
                <li><b>변경할 비밀번호 :</b> <input type="password" value="<?=$row["password"]?>" name="my_pass"> </li>
                <li><b>이메일 :</b> <?=$row["email"]?></li>
                <li><b>핸드폰 번호 :</b> <?=$row["phone_number"]?></li>
                <li><b>질문 :</b> <?=$row["secret_question"]?></li>
                <li><b>답 :</b> <?=$row["secret_response"]?></li>
                <li><b>변경할 질문 :</b> <select name="my_ques">
                            <option value="내 생에 보물 1호는?"<?php if($row["secret_question"]=="내 생에 보물 1호는?")echo "selected";?> >내 생에 보물 1호는?</option>
                            <option value="현재 키우는 애완동물의 이름은?"<?php if($row["secret_question"]=="현재 키우는 애완동물의 이름은?")echo "selected";?> >현재 키우는 애완동물의 이름은?</option>
                            <option value="내가 다닌 중학교 이름은?"<?php if($row["secret_question"]=="내가 다닌 중학교 이름은?")echo "selected";?> >내가 다닌 중학교 이름은?</option>
                            <option value="내가 제일 사랑하는 사람은?"<?php if($row["secret_question"]=="내가 제일 사랑하는 사람은?")echo "selected";?> >내가 제일 사랑하는 사람은?</option>
                            </select> 
                             </li>
                <li><b>변경할 답 :</b> <input type="text" name="my_res" value="<?=$row["secret_response"]?>"></li>
</div><br>
                <div style="text-align:center;"><input type="submit" value="회원정보 수정"> <input type="button" value="홈으로" onclick="location.href='index2.php'">
                </div>
            </ul>
        </form>
    
    

    
    <footer>
        <?php
             include "footer.php";
        ?>
    </footer>

    <?php
        mysqli_close($con);
    ?>
</body>
</html>