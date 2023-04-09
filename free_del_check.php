<?php
    $num=$_GET['num'];

     echo "<script>
                var com=confirm('정말 삭제하시겠습니까?');
                if(!com)history.go(-1);
                else {location.href='free_delete.php?num={$num}';}
            </script>";
?>