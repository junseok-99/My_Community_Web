<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>신고하기</title>
    <link rel="stylesheet" href="./css/report.css?ver=6">

</head>
<body>
<header>
        <?php
            include "header.php";
        ?>
    </header>
    <?php
        if(!$userid){
            echo "<script> alert('로그인 후 이용해주세요.');
                    location.href='index2.php';
            </script>";
        }
        else{
    ?>
    <h2 id="head">신고하기</h2>
        <div id="report_div">
            <form action="report.php" method="post" name="report_form">
                <ul>
                    <li><b>아이디 : <span><?=$userid?></span><input type="hidden" name="id" value="<?=$userid?>">
                    <li><b>신고대상 아이디 : </b> <input type="text" name="report_id"></li>
                    <li><b>신고사유 : </b><input type="text" name="content" maxlength="50" size="96" placeholder="50자 이내로 입력해주세요"></li>
                    <input type="submit" value="보내기">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="button" value="취소" onclick="location.href='index2.php'";>
                </ul>
            </form>
            
        
        </div>
    <?php
    }
    ?>
   
    <footer>
        <?php
             include "footer.php";
        ?>
    </footer>
</body>
</html>