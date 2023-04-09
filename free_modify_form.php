<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>글 수정하기</title>
    <link rel="stylesheet" href="./css/board.css?ver=5">
</head>
<body>
<?php include "header.php";?>
    <?php
        $num=$_GET["num"];
        $subject=$_GET["subject"];
        $content=$_GET["content"];
    ?>
    <div><span id="free_span"><h2 >수정하기</h2></span></div>
    
    <div id="free_div">    
           
    <form name=freeForm method=POST action="free_modify.php">
    <ul>
            <li><b>작성자 : </b><?=$userid?></li>
            <li><b>제목 : </b><input type="text" name="subject" style="width:400px" value="<?=$subject?>"></li>
            <li><b>내용 : </b><textarea name="content" cols="60" rows="10"><?=$content?></textarea></li>
            <input type="hidden" name="num" value="<?=$num?>">
        </ul> 
        <span id="free_bt"><input type="submit" value="수정하기"> <input type="button" onclick="history.go(-1)" value="취소"></span>
    </form>
    </div>
    
    <?php include "footer.php";?>
</body>
</html>