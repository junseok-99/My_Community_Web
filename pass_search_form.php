<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pass Word 찾기</title>
</head>
<body>

    <?php
            include "header.php";
        ?>
    </header>
   <h2 id="head">PassWord 찾기</h2>

   <?php       

        setcookie("id_input",$_POST["id_input"],time()+60);
        setcookie("phn1_p",$_POST["phn1"],time()+60);
        setcookie("phn2_p",$_POST["phn2"],time()+60);
        setcookie("phn3_p",$_POST["phn3"],time()+60);

        $id_input=$_POST["id_input"];
        $phn=$_POST["phn1"]."-".$_POST["phn2"]."-".$_POST["phn3"];
        

        if($_POST["id_input"]==""){
            echo "<script>
                    alert('아이디를 입력해주세요');
                    history.go(-1);
            </script>";
        }
        else if($_POST["phn1"]==""||$_POST["phn2"]==""||$_POST["phn3"]==""){
            echo "<script>
                    alert('핸드폰 번호를 입력해주세요');
                    history.go(-1);
                  </script>";
        }
        if($_POST["id_input"]!=""){
            if($_POST["phn1"]!=""&&$_POST["phn2"]!=""&&$_POST["phn3"]!=""){
                $con=mysqli_connect("localhost","root","","jjsproject");
                $sql="select id from member where id='$id_input'";
                $sql2="select phone_number from member where phone_number='$phn'";
                $rs=mysqli_query($con,$sql);
                $rs2=mysqli_query($con,$sql2);
                mysqli_close($con);
                $num=mysqli_num_rows($rs);
                $num2=mysqli_num_rows($rs2);
                if($num==0||$num2==0){
                    echo "<script>
                            alert('가입정보가 존재하지 않습니다.');
                            history.go(-1);
                    </script>";
                }
                
            
        elseif($num>0&&$num2>0){
            $con=mysqli_connect("localhost","root","","jjsproject");
            $sql="select * from member where id='$id_input'";
            $sql2="select * from member where phone_number='$phn'";
            $rs=mysqli_query($con,$sql);
            $rs2=mysqli_query($con,$sql2);
            
            $row=mysqli_fetch_array($rs);
            $row2=mysqli_fetch_array($rs2);
            
            if($row["phone_number"]==$row2["phone_number"]&&$row["id"]==$row2["id"]){
                ?>
                <div id="mypage_div">
                   <form action="pass_view.php" method="post" name="pass_view">
                       <ul>
                   <li><h3> 질문 : <?=$row["secret_question"]?></h3></li>
                   <li> 답 <input type="text" id="res" name="in_res"></li>
                   <li> <input type="submit" value="확인">
                   <input type="button" value="취소" onclick="location.href='index2.php'";></li>
                   <input type="hidden" value="<?=$row["phone_number"]?>" name="in_phn">
                   
                   </ul></form>
                   </div>
                <?php
                
            }
            
            else{
                echo "<script>
                            alert('입력한 아이디와 핸드폰 번호가 일치하지 않습니다.');
                            history.go(-1);
                    </script>";
            }
               
        }
            }}
   ?>
    
</body>
</html>