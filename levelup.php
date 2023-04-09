<?php
    $id=$_POST["id"];
    $nd_po=$_POST["nd_po"];
    $cr_po=$_POST["cr_po"];
    $level=$_POST["level"];

    if($nd_po>$cr_po){
        echo "<script>
                alert('포인트가 부족합니다.');
                history.go(-1);
                </script>";
                    
    }
    else {
        $cr_po-=$nd_po;
        $level++;
        $con=mysqli_connect("localhost","root","","jjsproject");
        $sql="update member set level='$level'  where id='$id'";
        $sql2="update member set point='$cr_po'  where id='$id'";

        $rs=mysqli_query($con,$sql);
        $rs2=mysqli_query($con,$sql2);

        echo "<script>
                alert('축하합니다! 등업에 성공하셨습니다.');
                location.href='index2.php';
                </script>";

        mysqli_close($con);
    }
            
            
?>