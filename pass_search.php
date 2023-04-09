<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pass Word 찾기</title>
    <style>
        li{list-style: none; text-align:center;}
        #title_id{text-align:center;}
        
    </style>
</head>
<body>
<header>
        <?php
            include "header.php";
        ?>
    </header>
    
   <h2 id="title_id">PassWord 찾기</h2>
   <h4 id="title_id">※ 가입했던 아이디와 핸드폰 번호를 입력해주세요 ※</h4>
   <div id="mypage_div">
   <form action="pass_search_form.php" method="post" name="pass_search.form">
   
   <ul>
       <li>아이디 <input type="text" name="id_input" id="id_input">
       
       <li>
        <li>핸드폰 번호 <select name="phn1" id="phn1">
                            <option value="010" selected>010</option>
                            <option value="011" >011</option>
                            <option value="016" >016</option>
                            <option value="019" >019</option>
                            </select>-
                          <input type="text" maxlength="4" onkeypress="onnum();" name="phn2" id="phn2">-
                          <input type="text" maxlength="4" onkeypress="onnum();" name="phn3" id="phn3"></li>
       <li>
                          <input type="submit" value="확인">
        <input type="button" onclick="location.href='index2.php'" value="취소">
         <input type="button" onclick="location.href='id_search.php'" value="ID 찾기">
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
        
        function onnum(){
            if ((event.keyCode < 48) || (event.keyCode > 57))
            event.returnValue = false;
        }
    </script>
    <?php
    if(isset($_COOKIE["id_input"])&&isset($_COOKIE["phn1_p"])&&isset($_COOKIE["phn2_p"])&&isset($_COOKIE["phn3_p"])){
        ?>
        <script>
            id_input=document.getElementById("id_input");
            phn1=document.getElementById("phn1");
            phn2=document.getElementById("phn2");
            phn3=document.getElementById("phn3");

            id_input.value="<?=$_COOKIE["id_input"]?>";
            phn1.value="<?=$_COOKIE["phn1_p"]?>";
            phn2.value="<?=$_COOKIE["phn2_p"]?>";
            phn3.value="<?=$_COOKIE["phn3_p"]?>";
        </script>
        <?php
    }

    ?>
</body>
</html>