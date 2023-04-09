<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>자유게시판</title>
    <link rel="stylesheet" href="./css/board.css?ver=5">
</head>
<body>
    <?php include "header.php";?>
    <?php
        if(!$userid){
            echo "<script>
                alert('로그인 후 이용해주세요.');
                history.go(-1);
            </script>";
        }

        $num=$_GET["num"];

        $con=mysqli_connect("localhost","root","","jjsproject");
        $sql="select*from free_board where num='$num'";
        $sql2="select*from member where id='$userid'";
        $rs=mysqli_query($con,$sql);
        $rs2=mysqli_query($con,$sql2);
        $ar=mysqli_fetch_array($rs2);
        $record=mysqli_fetch_array($rs);
        
        $writer=$record['writer'];
        $subject=$record['subject'];
        $content=$record['content'];
        $hit=$record['hit'];
        $day=$record['regist_day'];
        $hit++;

        $content=str_replace(" ","&nbsp;",$content);
        $content=str_replace("\n","<br>",$content);

        $sql3="update free_board set hit='$hit' where num='$num'";
        $rs3=mysqli_query($con,$sql3);

        $sql4="select *from free_comment where board_num='$num'";
        $rs4=mysqli_query($con,$sql4);
        $cmt_num=mysqli_num_rows($rs4);
    ?>
    <div id="view_main_div">
    <div id="view_div"><h2><b>제목 : </b><?=$subject?></h2></div> <hr id="view_hr_top">
    <div id="view_div"><b>날짜 : </b> <?=$day?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>글쓴이 : </b> <?=$writer?>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>조회수 : </b> <?=$hit?>
    </div> 
    
    <hr id="view_hr">
        <div id="view_div"><b >내용 : </b></div>
    <br>
    <div id="view_div"><?=$content?></div>
    <hr>
    </div><br><div id="free_bt">
    <button onclick="location.href='free_board.php?turn=time'">목록보기</button>
    <button onclick="location.href='free_insert_form.php'">글쓰기</button>
    <?php
        if($userid==$writer){        
    ?>
    <button onclick="location.href='free_modify_form.php?num=<?=$num?>&subject=<?=$subject?>&content=<?=$content?>'">수정하기</button>
    <?php
        }
        if($userid==$writer||$ar["level"]==0){        
    ?>
    <button onclick="location.href='free_del_check.php?num=<?=$num?>'">삭제</button>
    <?php
        }
        ?>
    </div>
    <h2><b>댓글 (<?=$cmt_num?> )</b></h2><hr>
    <?php
            if(isset($_GET['page']))
                $page=$_GET['page'];
            else    
                $page=1;

            $sql4="select*from free_comment where board_num='$num' order by num desc";
            $rs4=mysqli_query($con,$sql4);
            $rs_num=mysqli_num_rows($rs4);

            $total=$rs_num;
            $scale=5;
            if($total%$scale==0)
                $t_page=floor($total/$scale);
            else 
                $t_page=floor($total/$scale)+1;
            $start=($page-1)*$scale;
    ?>
   <?php
        if(!$rs_num)echo "<div id='com_div'><span>아직 이 글에 달린 댓글이 없습니다.</span></div>";
        else{
        for($i=$start; $i<$start+$scale&&$i<$total;$i++){
            mysqli_data_seek($rs4,$i);
            $record=mysqli_fetch_array($rs4);
            $cm_id=$record['comment_id'];
            $comt=$record['comment'];
            $day=$record['time'];
            ?>
            <div id='com_div'><span id="com_id"><b>┖ <?=$cm_id?> : </b></span>  
            <span id="com_comt"><?=$comt?></span>
            
            <span id="com_day">
                <?php
                    if($userid==$cm_id||$ar["level"]==0){
                ?>
                <a href="comment_delete.php?num=<?=$record["num"]?>&cur_num=<?=$num?>&cmt_num=<?=$cmt_num?>" id="com_del"><b>삭제</b></a>&nbsp;&nbsp;&nbsp;&nbsp;
                <?php
                    }
                ?>
            - <?=$day?> - </span></div>          
            <?php
            
        }echo "<br><div id='com_num'>";
        
        if($t_page>1&&$page>=2){
            $new_page=$page-1;
            echo "<a href='free_view.php?page=$new_page&num=$num'>◀</a> ";
        }

        for($i=1;$i<=$t_page;$i++){
            if($i==$page)
                echo "<b>$i </b> |";
            else    
                echo "<a href='free_view.php?num=$num&page=$i'>$i </a>|";
        }
        if($t_page>$page&&$t_page>=2){
            $new_page=$page+1;
            echo "<a href='free_view.php?num=$num&page=$new_page'>▶</a>";
        }
        echo "</div>";
    }
    ?>
    <br><br>
    <div>
        <form action="comment_insert.php" method="post" name="comForm">
            <b>댓글 작성 : </b> <input type="text" maxlength="80" name="comment" size="180" placeholder="(80자 이내로 입력해주세요.)">
            <input type="hidden" name="bo_num" value="<?=$num?>">
            <input type="hidden" name="cmt_num" value="<?=$cmt_num?>">
            <input type="submit" value="작성" >
        </form>
    
    </div>
    <?php include "footer.php";?>
</body>
</html>