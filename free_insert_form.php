<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>자유게시판 글쓰기</title>
    <link rel="stylesheet" href="./css/board.css?ver=5">
</head>
<body>
<?php include "header.php";?>
    <?php
        
    ?>
    <div><span id="free_span"><h2 >글쓰기</h2></span></div>
    
    <div id="free_div">    
           
    <form name=freeForm method=POST action="free_insert.php?id=<?=$userid?>">
    <ul>
            <li><b>작성자 : </b><?=$userid?></li>
            <li><b>제목 : </b><input type="text" name="subject" style="width:400px"></li>
            <li><b>내용 : </b><textarea name="content"  cols="60" rows="10"></textarea></li>
            
        </ul> 
        <span id="free_bt"><input type="submit" value="작성"> <input type="button" onclick="history.go(-1)" value="취소"></span>
    </form>
    </div>
    
    <?php include "footer.php";?>
</body>
</html>