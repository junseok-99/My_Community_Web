<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>신고함</title>
    <link rel="stylesheet" href="./css/report.css?ver=7">
</head>         
<body>          
        <?php include "header.php";?>
        <?php
            if(!$userid){
            echo "<script> alert('로그인 후 이용해주세요.');
                    location.href='index2.php';
            </script>";
        }
            
            if(isset($_GET['page']))
                $page=$_GET['page'];
            else    
                $page=1;

            $con=mysqli_connect("localhost","root","","jjsproject");
            $sql2="select*from member where id='$userid'";
            $rs2=mysqli_query($con,$sql2);   
            $ar2=mysqli_fetch_array($rs2); 
            if($ar2["level"]==0)
                $sql="select*from reportlist order by num desc";   
            else
                $sql="select*from reportlist where id='$userid' order by num desc";   

            $rs=mysqli_query($con,$sql);
            $rs_num=mysqli_num_rows($rs);

            $total=$rs_num;
            $scale=5;
            if($total%$scale==0)
                $t_page=floor($total/$scale);
            else 
                $t_page=floor($total/$scale)+1;
            $start=($page-1)*$scale;

        ?>
        <h2 id="head"> 신고함</h2>
        
        
        <table id="msg_table">
        
        <thead><tr><th>번호</th>
        <th>접수자</th>
        <th>신고내용</th>
        <th>신고대상</th>
        <th>처리여부</th>
        <th>삭제</th>
        </tr></thead>

        

        <?php
        
        for($i=$start; $i<$start+$scale&&$i<$total;$i++){
            mysqli_data_seek($rs,$i);
            $record=mysqli_fetch_array($rs);
            $num=$record['num'];
            $id=$record['id'];
            $re_id=$record['report_id'];
            $re_con=$record['content'];

            $sql3="select *from report_comment where board_num='$num'";
            $rs3=mysqli_query($con,$sql3);
            $row=mysqli_num_rows($rs3);
            if($row){
            $cmt_ar=mysqli_fetch_array($rs3);
            $re_cmt=$cmt_ar["comment"];
            }
            if($record['report_check']==0)$re_ch_name="접수완료";
            elseif($record['report_check']==1)$re_ch_name="답변완료";

            ?>
            <tr><td><span><?=$i+1?></span> </td>         
            <td><span><?=$id?></span></td>
            <td style="width:800px"><span><?=$re_con?></span></td>
            <td><span><?=$re_id?></span></td>
            <td><span><?=$re_ch_name?></span></td>
            <?php
                if($userid==$id||$ar2["level"]==0){
            ?>
            <td><input type="button" value="삭제" onclick="location.href='report_delete.php?num=<?=$num?>&page=<?=$page?>'"></td>
            <?php
                }
            ?>       
            </tr>

            <?php
            if($record['report_check']==1){
            ?>
            <tr>
                    <td colspan="7" >
                    <div style="text-align:left;margin-left:100px;"><b>ㄴ 운영자 : </b><?=$re_cmt?></div></td>
                </tr>            
                   <?php
             }
            ?>
            
            <?php
            if($ar2["level"]==0&&$record['report_check']==0){
            ?>
            <tr>
                <form action="report_cmt_insert.php" method="post" name="rpcmtForm">
                    <td colspan="7"><b>ㄴ</b> <input type="text" name="cmt" maxlength="55" size="120"> <input type="submit" value="작성"></td>
                    <input type="hidden" value="<?=$num?>" name="num">
                    <input type="hidden" value="<?=$page?>" name="page">
                </form>
                </tr>            
                   <?php
             }
            ?>
            
            <?php
            
        }
    
    ?>
    </table>
    <?php
        if(!$rs_num){
            echo "<h5 id='head'>접수된 글이 없습니다.</h5>";
        }
        ?>
        <div id='head'>
    <?php
        if($t_page>1&&$page>=2){
            $new_page=$page-1;
            echo "<a href='report_box.php?page=$new_page'>◀</a> ";
        }

        for($i=1;$i<=$t_page;$i++){
            if($i==$page)
                echo "<b>$i </b> |";
            else    
                echo "<a href='report_box.php?page=$i'>$i </a>|";
        }
        if($t_page>$page&&$t_page>=2){
            $new_page=$page+1;
            echo "<a href='report_box.php?page=$new_page'>▶</a>";
        }
        
    ?>
    </div>
    <hr>
    <div id="report_box_bt">
    <button onclick="location.href='report_form.php'">신고하기</button>
    <button onclick="location.href='index2.php'">홈으로</button>
    </div>
        <?php include "footer.php";?>
</body>
</html>