<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pass Word VIEW</title>
</head>
<body>
    <header>
        <?php
            include "header.php";
        ?>
    </header>
    <?php
        $in_phn=$_POST["in_phn"];
        $in_res=$_POST["in_res"];
        $con=mysqli_connect("localhost","root","","jjsproject");
            $sql="select * from member where phone_number='$in_phn'";          
            $rs=mysqli_query($con,$sql);
            $row=mysqli_fetch_array($rs);
        if($in_res==$row["secret_response"]){
            echo "<div id='mypage_div'><ul><li><h2>ID : ".$row["id"]." </h2></li>";
            echo "<li><h2>PASSWORD : ".$row["password"]." </li></h2>
            <li><input type='button' value='확인' onclick=location.href='index2.php'></li></ul></div>";
            mysqli_close($con);
        }
        else
        {
            echo "<script>
            alert('질문에 대한 정답이 일치하지 않습니다.');
            location.href='pass_search.php';
                </script>";
        }
    ?>
   
        
    <footer>
        <?php
             include "footer.php";
        ?>
    </footer>
</body>
</html>