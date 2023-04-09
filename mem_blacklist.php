<?php
    $id=$_GET["id"];
    $state=$_GET["state"];

    $con=mysqli_connect("localhost","root","","jjsproject");
    if($state=="plus"){
        $sql="update member set block='1' where id='$id'";
        $rs=mysqli_query($con,$sql);
        mysqli_close($con);
        echo "<script>
            history.go(-1);
                </script>";
    }
    elseif($state=="del"){
        $sql="update member set block='0' where id='$id'";
        $rs=mysqli_query($con,$sql);
        mysqli_close($con);
        echo "<script>
            history.go(-1);
                </script>";
    }
?>