<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>등업하기</title>
</head>
<body>
<header>
        <?php
            include "header.php";
        ?>
    </header>
    <?php
        if(!$userid){
            echo "<script> alert('로그인 후 이용해주세요.');
                    location.href='index2.php';
            </script>";
        }
        else{   
            $con=mysqli_connect("localhost","root","","jjsproject");
            $sql="select * from member where id='$userid'";
            $rs=mysqli_query($con,$sql);
            $re=mysqli_fetch_array($rs);
            $level=$re["level"];
            if($level==0){echo "<script>
                alert('현재 최고등급이므로 이용하실 수 없습니다.');
                history.go(-1);
                </script>";};
            if($level==1){$level_name="회원";$next_level_name="우수회원"; $need_point=5000;}
            if($level==2){$level_name="우수회원";$next_level_name="매니저"; $need_point=50000;}
            if($level==3){echo "<script>
                    alert('현재 최고등급이므로 이용하실 수 없습니다.');
                    history.go(-1);
                    </script>";};
    ?>
    <h2 id="head">등업하기</h2>
        <div id="level_div">
            <form action="levelup.php" method="post" name="levelup_form">
                <ul>
                    
                    <li><b>현재 등급 : </b> <span><?=$level_name?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    →→→<span style="float:right;margin-right: 50px;"><b>다음 등급 : </b><?=$next_level_name?></span></li>
                    <li><b>잔여 포인트 : </b><span><?=$re["point"]?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    →→→<span style="float:right;margin-right: 80px;"><b>필요 포인트 : </b><?=$need_point?></span></li><br>
                    <div style="text-align:center;margin-right: 15px; ">
                    <input type="submit" value="등업">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="button" value="취소" onclick="location.href='index2.php'";>
                    </div>
                </ul>
                <input type="hidden" name="nd_po" value="<?=$need_point?>">
                <input type="hidden" name="cr_po" value="<?=$re["point"]?>">
                <input type="hidden" name="level" value="<?=$re["level"]?>">
                <input type="hidden" name="id" value="<?=$userid?>">
            </form>
            
        
        </div>
    <?php
    }
    ?>
    <footer>
        <?php
             include "footer.php";
        ?>
    </footer>
</body>
</html>