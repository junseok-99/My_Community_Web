<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
    <link rel="stylesheet" href="./css/main.css?ver=5">

</head>
<body>
    <?php
        $con=mysqli_connect("localhost","root","","jjsproject");
        $sql="select *from free_board order by num desc";
        $rs=mysqli_query($con,$sql);
        $row=mysqli_num_rows($rs);

    ?>
    <div id="free_time">
        <span id="main_span"><b>최근 게시물(5개)</b></span>
        <hr id="main_hr">
        <?php
            if($row){
        ?>
        <table id="main_table">
            <thead id="main_thead"><tr><th id="main_th">번호</th>
            <th id="main_th" style="width:390px;" >제목</th>
            <th id="main_th">작성자</th>
            <th id="main_th">조회수</th>
            </thead>
            <?php
            for($i=0;$i<$row;$i++){
                mysqli_data_seek($rs,$i);
                $ar=mysqli_fetch_array($rs);
                $num=$i+1;

                $sql3="select *from free_comment where board_num='$num'";
                $rs3=mysqli_query($con,$sql3);
                $cmt_num=mysqli_num_rows($rs3);
            
            ?>
            <tr><td id="main_td"><?=$num?></td>
            <td id="main_td"><a href="free_view.php?num=<?=$ar["num"]?>&cmt_num=<?=$cmt_num?>" id="sub_a"><?=$ar["subject"]?></a> </td>
            <td id="main_td"><?=$ar["writer"]?></td>
            <td id="main_td"><?=$ar["hit"]?></td>
            <?php if($i==4)break;
            }
            ?>
        </table>
            <?php
                }
                else{
                    echo " <b>작성된 게시글이 없습니다.<b>";
                }
            ?>
            
    </div><div id="main_img_bar">
        <img src="./image/main_img.png">
    </div>
</body>
</html>