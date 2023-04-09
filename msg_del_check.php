<?php
    $mode=$_GET['mode'];
    $num=$_GET['num'];

     echo "<script>
                var con2=confirm('정말 삭제하시겠습니까?');
                if(!con2)history.go(-1);
                else {location.href='msg_delete.php?mode={$mode}&num={$num}';}
            </script>";
?>