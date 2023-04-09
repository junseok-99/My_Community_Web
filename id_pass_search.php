<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID - PassWord 찾기</title>
</head>
<body>
    <header>
        <?php
            include "header.php";
        ?>
    </header>
   <h2 id="head">ID / PASSWORD 찾기</h2><br>
   <div id="search_div">
   <button onclick="location.href='id_search.php'"; style="height:200px;width:200px;font-size:50px;float:left;">ID 찾기</button>
   
   <button onclick="location.href='pass_search.php'"; style="height:200px;width:450px;font-size:50px;float:right;">PASSWORD 찾기</button>
   </div>    
    <footer>
        <?php
             include "footer.php";
        ?>
    </footer>
</body>
</html>