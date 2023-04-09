<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/header.css?ver=8">
    <title>Header</title>
</head>
<body>
    <?php //LOGIN_SESSION 확인
        session_start();
        if(isset($_SESSION["userid"])){
            $userid=$_SESSION["userid"];
            $con=mysqli_connect("localhost","root","","jjsproject");
            $sql5="select * from member where id='$userid'";
            $rs5=mysqli_query($con,$sql5);
            $ar=mysqli_fetch_array($rs5);
        }
        else
            $userid="";

        
    ?>
    
    <h2 id="head" onclick="aa()"><a href="index2.php">장준석의 커뮤니티</a> </h2>
    <script>
        function aa(){
            location.href='index2.php';       
             }
    </script>
    <hr>
  
    <div id="menu_bar">
        <ul >
            <li><a href="index2.php" id="home_bar">H O M E</a></li>
            <li><a href="free_board.php?turn=time" id="home_bar">자유게시판</a></li>
            <?php
                if($userid){
                if($ar["level"]!=0){
            ?>
                    <li><a href="levelup_form.php" id="home_bar">등업하기</a></li>
                <?php
                }}
                else{?>
                <li><a href="levelup_form.php" id="home_bar">등업하기</a></li>                
                <?php
                }
            ?>
            <li><a href="msg_form.php" id="home_bar">쪽지보내기</a></li>
            <?php
                if($userid){
                if($ar["level"]!=0){
            ?>
            <li><a href="report_form.php" id="home_bar">신고하기</a></li>
            <?php
                }}
                else{?>
                
                    <li><a href="report_form.php" id="home_bar">신고하기</a></li>
                <?php
                }
            ?>
            <li><a href="report_box.php"id="home_bar">신고함</a></li>
        </ul>
    </div>
    <br>
    <?php
    if($userid){//login 상태
       $sql="select * from member where id='$userid'";          
       $rs=mysqli_query($con,$sql);
       $row=mysqli_fetch_array($rs);
       $level=$row["level"];
       $point=$row["point"];
       if($row["block"]==1){ //정지당하였을 경우
        echo "<script>
        alert('회원님의 아이디가 정지되었습니다.');
        history.go(-1);
            </script>";
            unset($_SESSION["userid"]);
       }
       if($level==0)$level_name="운영자";
       if($level==1)$level_name="회원";
       if($level==2)$level_name="우수회원";
       if($level==3)$level_name="매니저";
        mysqli_close($con);
    ?>
    <div id="log_form">
    <form action="logout.php" method="POST" name="fo">
        <?= $userid?>님 환영합니다. 
        <input type="submit" value="로그아웃" >
        <br>
        등급 : <span style="color:blue;"><?=$level_name?></span> | 포인트 : <?=$point?>
        <br>
        <a href="mypage.php?id=<?=$userid?>&levelname=<?=$level_name?>">마이페이지</a> / <a href="msg_box.php?mode=rv">나의 쪽지함</a>  
         <?php
       
        if($level!=0){if($level==3){?>
        <br> <?php }?>
         / <a href="resign_form.php" style="color:red;"> 회원탈퇴</a> 
        <?php
        }
        ?>
        <?php
        
        if($level==0||$level==3){
            ?>
             / <a href="member_modify.php">회원관리</a>
            <?php
        }
        ?>
    </form>
    </div> 
    <?php
    }
    
    else{ //로그인 이전
    ?>
        <div id="login_form">
    <form action="login.php" method="POST" name="fo">
       <li> 아이디 <input type="text" name="id" placeholder="Enter ID">
        <input type="submit" value="로그인" name="login_bt"></li>
       <li> 비밀번호 <input type="password" name="pass" placeholder="Enter PASSWORD"></li>
        
        <div id="login_span"><a href="join.php">회원가입</a> | <a href="id_pass_search.php">ID/PW 찾기</a> </div>
    </form>
    </div> 
    <?php   
    }
    ?>
    
    <hr>
    
    

</body>
</html>
