<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>메시지 보기</title>
    <link rel="stylesheet" href="./css/board.css?ver=3">
</head>
<body>
    <?php include "header.php";?>
    <?php
        $mode=$_GET["mode"];
        $num=$_GET["num"];

        $con=mysqli_connect("localhost","root","","jjsproject");
        $sql="select*from messagelist where num='$num'";
        $rs=mysqli_query($con,$sql);
        $record=mysqli_fetch_array($rs);
        $subject=$record['subject'];
        $content=$record['content'];
        $day=$record['regist_day'];

        $content=str_replace(" ","&nbsp;",$content);
        $content=str_replace("\n","<br>",$content);

        if($mode=="send"){
            $title="보낸 메세지";
            $user=$record['rv_id'];
            $sub_title="받는 사람";
        }
        else{
            $title="받은 메세지";
            $user=$record['send_id'];
            $sub_title="보낸 사람";
        }

    ?>
    <div id="view_main_div">
    <div id="view_div"><h2><b><?=$title?> : </b><?=$subject?></h2></div> <hr id="view_hr_top">
    <div id="view_div"><b>날짜 : </b> <?=$day?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?=$sub_title?> : </b> <?=$user?></div> 
    
    <hr id="view_hr">
        <div id="view_div"><b >내용</b></div>
    <hr id="view_hr">
    <div id="view_div"><?=$content?></div>
    
    </div><br>
    <div id="msg_box_bt">
    <button onclick="location.href='msg_box.php?mode=rv'">수신 쪽지함</button>
    <button onclick="location.href='msg_box.php?mode=send'">송신 쪽지함</button>
    <button onclick="location.href='msg_del_check.php?mode=<?=$mode?>&num=<?=$num?>'">삭제</button>
    </div>
    
    <?php include "footer.php";?>
</body>
</html>