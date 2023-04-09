<?php
    $reason=$_POST["reason"];
     echo "<script>
                var con=confirm('정말 탈퇴하시겠습니까?');
                if(!con)location.href='index2.php';
                else {location.href='resign.php?reason=$reason';}
            </script>";
?>