<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원관리</title>
</head>
<body>
    <header>
        <?php
            include "header.php";
        ?>
    </header>
    <?php
        if(isset($_GET['page']))
            $page=$_GET['page'];
         else    
            $page=1;

            $con=mysqli_connect("localhost","root","","jjsproject");
            $sql="select * from member where level>0 order by num ";
            $rs=mysqli_query($con,$sql);
            $num=mysqli_num_rows($rs);

            $total=$num;
            $scale=10;
            if($total%$scale==0)
                $t_page=floor($total/$scale);
            else 
                $t_page=floor($total/$scale)+1;
            $start=($page-1)*$scale;
    ?>
    <h2 style="text-align:center;">회 원 관 리</h2>
    <div id="mem_div" style="text-align:center;">
        <table id="mem_table">
            <thead><tr><th>번호</th><th>아이디</th><th>이메일</th><th>포인트</th><th>등급</th><th>블랙리스트 상태</th><th>블랙리스트 등록/해제</th></tr></thead>
            
            <form action="mem_modi_form.php" method="post" name="mem_modi">
            <?php
            for($i=$start; $i<$start+$scale&&$i<$total;$i++){        
                       
                mysqli_data_seek($rs,$i);
                $ar=mysqli_fetch_array($rs);              
                echo "<tr>";                                                
                echo "<td>".($i+1)."</td>";echo "<td>".$ar["id"]."</td>";echo "<td>".$ar["email"]."</td>";
                echo "<td><input type='text' name='mem_po[]' size='2px' maxlength='6' value=".$ar["point"]."></td>";
                echo "<td>"?>
                <input type="hidden" name="mem_id[]" value="<?=$ar['id']?>">
                <select name="mem_level[]"  >
                    <option value="1" <?php if($ar["level"]==1)echo "selected";?>>회원</option>
                    <option value="2" <?php if($ar["level"]==2)echo "selected";?>>우수회원</option>
                    <option value="3" <?php if($ar["level"]==3)echo "selected";?>>매니저</option>
                </select>
                <input type="hidden" name="start" value="<?=$start?>">
            <input type="hidden" name="total" value="<?=$total?>">
            <input type="hidden" name="scale" value="<?=$scale?>">
            <input type="hidden" name="page" value="<?=$page?>">
                <?php
                echo"</td>";
                echo "<td >";
                           if($ar["block"]==1)echo"O</td>";
                else if($ar["block"]==0)echo"X</td>";     
           
                echo "<td>";
                ?>
                <input type='button'  onclick="location.href='mem_blacklist.php?id=<?=$ar['id']?>&state=plus'"  value="등록">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type='button' onclick="location.href='mem_blacklist.php?id=<?=$ar['id']?>&state=del'"  value="해제">
            <?php
            echo "</td>";
                                }   
        ?>             
        </table><br>
        <div id='head'>
    <?php
        if($t_page>1&&$page>=2){
            $new_page=$page-1;
            echo "<a href='member_modify.php?page=$new_page'>◀</a> ";
        }

        for($i=1;$i<=$t_page;$i++){
            if($i==$page)
                echo "<b>$i </b> |";
            else    
                echo "<a href='member_modify.php?page=$i'>$i </a>|";
        }
        if($t_page>$page&&$t_page>=2){
            $new_page=$page+1;
            echo "<a href='member_modify.php?page=$new_page'>▶</a>";
        }
        
    ?>
    </div><br>
         <input type="submit" value="회원정보 수정">&nbsp;&nbsp;&nbsp;
        <input type="button" value="홈으로" onclick="location.href='index2.php'">
         </form>
    </div>
    <footer>
        <?php
             include "footer.php";
        ?>
    </footer>
</body>
</html>