<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>자유게시판</title>
    <link rel="stylesheet" href="./css/board.css?ver=6">
</head>
<body>
    <?php include "header.php"?>
    <?php
    $ques=$_POST["ques_sub"];
        if(!$ques){
            echo "<script>
                    alert('제목을 입력해주세요');
                    history.go(-1);
                </script>";
        }
        else{
            if(isset($_GET['page']))
                $page=$_GET['page'];
            else    
                $page=1;
            
            
            $con=mysqli_connect("localhost","root","","jjsproject");
            $sql="select * from free_board where subject like '%".$ques."%'";
            $rs=mysqli_query($con,$sql);
            $row=mysqli_num_rows($rs);


            ?>
            <h2 style="text-align:center;">검 색 결 과</h2>
            
            <?php
            $num=$row;
            $total=$num;
            $scale=10;
            if($total%$scale==0)
                $t_page=floor($total/$scale);
            else 
                $t_page=floor($total/$scale)+1;
            $start=($page-1)*$scale;
    ?>
    
    <table id="board_table">
            <thead><tr>
            <th>번호</th>
            <th style="width:800px">제목</th>
            <th>글쓴이</th>
            <th>등급</th>
            <th>작성시간</th>
            <th>조회수</th>
            <th>댓글수</th>
            </tr></thead>

            <?php
            for($i=$start; $i<$start+$scale&&$i<$total;$i++){
            mysqli_data_seek($rs,$i);
            $record=mysqli_fetch_array($rs);
            $num=$record['num'];
            $writer=$record['writer'];
            $subject=$record['subject'];
            $time=$record['regist_day'];
            $hit=$record['hit'];

            $sql2="select level from member where id='$writer'";
            $rs2=mysqli_query($con,$sql2);
            $ar=mysqli_fetch_array($rs2);

            $sql3="select *from free_comment where board_num='$num'";
            $rs3=mysqli_query($con,$sql3);
            $cmt_num=mysqli_num_rows($rs3);

            $level=$ar["level"];
            if($level==0)$level_name="운영자";
            if($level==1)$level_name="회원";
            if($level==2)$level_name="우수회원";
            if($level==3)$level_name="매니저";

            
            
            ?>
            <tr><td id="fr_rd"><span><?=$i+1?></span> </td>         
            <td id="fr_rd"><span><a href="free_view.php?num=<?=$num?>" id="free_a"><?=$subject?></a></span></td>
            <td id="fr_rd"><span><?=$writer?></span></td>
            <td id="fr_rd"><span><?=$level_name?></span></td>
            <td id="fr_rd"><span><?=$time?></span></td>
            <td id="fr_rd"><span><?=$hit?></span></td>
            <td id="fr_rd"><span><?=$cmt_num?></span></td>
            </tr>
            
            <?php
            
        }
        
    ?>
        
    </table>
    <?php
        if(!$row){
            echo "<b><h5 id='head'>검색결과가 없습니다.</h5></b>";
        }
    ?>
    <br>
    <div id="search_div">
    <form action="free_search_board.php" method="post" name="searF" >
    
        <input type="text" name="ques_sub" maxlength="30" placeholder="검색할 제목을 입력해주세요" size="100">
        <input type="submit" value="검색">
       
    </form>

    
    <?php
        if($t_page>1&&$page>=2){
            $new_page=$page-1;
            echo "<a href='free_search_board.php?page=$new_page'>◀</a> ";
        }

        for($i=1;$i<=$t_page;$i++){
            if($i==$page)
                echo "<b>$i </b> |";
            else    
                echo "<a href='free_search_board.php?page=$i'>$i </a>|";
        }
        if($t_page>$page&&$t_page>=2){
            $new_page=$page+1;
            echo "<a href='free_search_board.php?page=$new_page'>▶</a>";
        }
        
    ?>
    </div>
    <?php
        
        mysqli_close($con);
    ?>
    <hr>
    <div id="board_write_bt">
    
        <button onclick="location.href='free_board.php?turn=time'">전체 글보기</button>
        <button onclick="location.href='free_insert_form.php'">글쓰기</button>
        <button onclick="location.href='index2.php'">홈으로</button> 
        
    </div>
    <?php } include "footer.php"?>
</body>
</html>