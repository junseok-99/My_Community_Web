<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원탈퇴</title>
</head>
<body>
<header>
        <?php
            include "header.php";
        ?>
    </header>

    <h2 style="text-align:center;">회원탈퇴</h2><br>
    <div id="resign_div">
        <b>회원탈퇴를 하시는 이유를 알려주세요.(선택사항)</b><br>↓↓↓↓↓↓↓↓<br>
       <form action="resign_check.php" method="post" name="resign_fo">
        <b>이유 :</b> <input type="text" name="reason" maxlength="40" placeholder="40자 이내로 입력해주세요." size="85px"><br><br>
                <input type="submit" value="탈퇴" >&nbsp&nbsp&nbsp <input type="button" value="취소" onclick="location.href='index2.php'">
       </form>
    </div>
    
    <footer>
        <?php
             include "footer.php";
        ?>
    </footer>

</body>
</html>
