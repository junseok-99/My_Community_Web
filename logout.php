<?php
    session_start();
    unset($_SESSION["userid"]);

    echo "<script>
        location.href='index2.php';
    </script>";
?>