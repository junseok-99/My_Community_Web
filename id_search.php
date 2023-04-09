<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID 찾기</title>
    <style>
        li{list-style: none; }
        #title_id{text-align:center;}
        
    </style>
</head>
<body>
<header>
        <?php
            include "header.php";
        ?>
    </header>
    
    
   <h2 id="title_id">ID 찾기</h2>
   <h4 id="title_id">※ 가입했던 이메일과 핸드폰 번호를 입력해주세요 ※</h4>
   <div id="mypage_div">
   <form action="id_search_form.php" method="post" name="id_search.form">
   
   <ul>
       <li>이메일 <input type="text" name=email1 id="em1">@<input type="text" id="em2" name="email2">
       <select name="email" id="em" onclick="em2_rg()" >
                            <option value="" selected>직접 입력</option>
                            <option value="naver.com" >naver.com</option>
                            <option value="gmail.com" >gmail.com</option>
                            <option value="nate.com" >nate.com</option>
                            <option value="daum.net" >daum.net</option>
                            </select></li>
       <li>
        <li>핸드폰 번호 <select name="phn1" id="phn1">
                            <option value="010" selected>010</option>
                            <option value="011" >011</option>
                            <option value="016" >016</option>
                            <option value="019" >019</option>
                            </select>-
                          <input type="text" maxlength="4" onkeypress="onnum();" name="phn2" id="phn2">-
                          <input type="text" maxlength="4" onkeypress="onnum();" name="phn3" id="phn3"></li>
       <li><br>
                          <input type="submit" value="확인">
        <input type="button" onclick="location.href='index2.php'" value="취소">
         <input type="button" onclick="location.href='pass_search.php'" value="PASSWORD 찾기">
         </li>
        </ul>
        </form>
        </div>
    <footer>
        <?php
             include "footer.php";
        ?>
    </footer>

    <script>
        em=document.getElementById("em");
        em2=document.getElementById("em2");

        function em2_rg(){
            em2.value=em.value;
            em2.readOnly=true;
            if(em2.value=="")
            em2.readOnly=false;
        }
        function onnum(){
            if ((event.keyCode < 48) || (event.keyCode > 57))
            event.returnValue = false;
        }
    </script>
    <?php
    if(isset($_COOKIE["email1"])&&isset($_COOKIE["email2"])&&isset($_COOKIE["phn1"])&&isset($_COOKIE["phn2"])&&isset($_COOKIE["phn3"])){
        ?>
        <script>
            em1=document.getElementById("em1");
            em2=document.getElementById("em2");
            phn1=document.getElementById("phn1");
            phn2=document.getElementById("phn2");
            phn3=document.getElementById("phn3");

            em1.value="<?=$_COOKIE["email1"]?>";
            em2.value="<?=$_COOKIE["email2"]?>";
            phn1.value="<?=$_COOKIE["phn1"]?>";
            phn2.value="<?=$_COOKIE["phn2"]?>";
            phn3.value="<?=$_COOKIE["phn3"]?>";
        </script>
        <?php
    }

    ?>
</body>
</html>