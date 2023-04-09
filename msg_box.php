<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>나의 쪽지함</title>
    <link rel="stylesheet" href="./css/msg.css?ver=3">
</head>         
<body>          
        <?php include "header.php";?>
        <?php
            $mode=$_GET["mode"];
            if(isset($_GET['page']))
                $page=$_GET['page'];
            else    
                $page=1;
            if($mode=="rv"){
                $mode_name="수신";
                $user_title="보낸 사람";
                $sql="select*from messagelist where rv_id='$userid' order by num desc";
            }
            elseif($mode=="send"){
                $mode_name="송신";
                $user_title="받는 사람";
                $sql="select*from messagelist where send_id='$userid' order by num desc";
            }

            $con=mysqli_connect("localhost","root","","jjsproject");    
            $rs=mysqli_query($con,$sql);
            $rs_num=mysqli_num_rows($rs);

            $total=$rs_num;
            $scale=10;
            if($total%$scale==0)
                $t_page=floor($total/$scale);
            else 
                $t_page=floor($total/$scale)+1;
            $start=($page-1)*$scale;

        ?>
        <h2 id="head"><?=$mode_name?> 쪽지함</h2>
        
        
        <table id="msg_table">
        
        <thead><tr><th>번호</th>
        <th><?=$user_title?></th>
        <th>제목</th>
        <th>등록일</th></tr></thead>

        

        <?php
        
        for($i=$start; $i<$start+$scale&&$i<$total;$i++){
            mysqli_data_seek($rs,$i);
            $record=mysqli_fetch_array($rs);
            $num=$record['num'];
            $sendid=$record['send_id'];
            $rvid=$record['rv_id'];

            if($mode=="send") $user=$rvid;
            else $user=$sendid;

            $subject=$record['subject'];
            $content=$record['content'];
            $day=$record['regist_day'];
            ?>
            <tr><td><span><?=$i+1?></span> </td>         
            <td><span><?=$user?></span></td>
            <td style="width:500px"><span><a href="msg_view.php?mode=<?=$mode?>&num=<?=$num?>" id="view_sub"><?=$subject?></a></span></td>
            <td><span><?=$day?></span></td>
            </tr>
            
            <?php
            
        }
    
    ?>
    </table>
    <?php
        if(!$rs_num){
            if($mode=="rv")echo "<h5 id='head'>수신된 쪽지가 없습니다.</h5>";
            elseif($mode=="send")echo "<h5 id='head'>송신한 쪽지가 없습니다.</h5>";
        }
        ?>
        <div id='head'>
    <?php
        if($t_page>1&&$page>=2){
            $new_page=$page-1;
            echo "<a href='msg_box.php?mode=$mode&page=$new_page'>◀</a> ";
        }

        for($i=1;$i<=$t_page;$i++){
            if($i==$page)
                echo "<b>$i </b> |";
            else    
                echo "<a href='msg_box.php?mode=$mode&page=$i'>$i </a>|";
        }
        if($t_page>$page&&$t_page>=2){
            $new_page=$page+1;
            echo "<a href='msg_box.php?mode=$mode&page=$new_page'>▶</a>";
        }
        
    ?>
    </div>
    <hr>
    <div id="msg_box_bt">
    <?php
        if($mode=="send"){echo "<button onclick=location.href='msg_box.php?mode=rv'>수신 쪽지함</button>";}
        else if($mode=="rv"){echo "<button onclick=location.href='msg_box.php?mode=send'>송신 쪽지함</button>";}
    ?>
    
    <button onclick="location.href='msg_form.php'">쪽지 보내기</button>
    </div>
        <?php include "footer.php";?>
</body>
</html>