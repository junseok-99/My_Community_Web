<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>쪽지 보내기</title>
    <link rel="stylesheet" href="./css/msg.css?ver=6">
</head>
<body >
<?php include "header.php";?>
    <?php
        if(!$userid){
            echo "<script>
                alert('로그인 후 이용해주세요.');
                history.go(-1);
            </script>";
        }
    ?>
    <div><span id="msg_span"><h2 >쪽지 보내기</h2></span></div>
    
    <div id="view_div">    
           
    <form name=mgsForm method=POST action="msg_insert.php?id=<?=$userid?>">
    <ul>
            <li><b>보내는 사람 : </b><?=$userid?></li>
            <li><b>받는 사람 : </b><input type="text" name="rv_id" style="width:300px"></li>
            <li><b>제목 : </b><input type="text" name="subject" style="width:400px"></li>
            <li><b>내용 : </b><textarea name="content"  cols="60" rows="10"></textarea></li>
        </ul>       
        <span id="msg_box_bt">
        <input type="submit" value="보내기"> <input type="button" onclick="location.href='index2.php'" value="취소">
    </span>
    </form>
    </div>
    <?php include "footer.php";?>
</body>
</html>