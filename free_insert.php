<?php
    $writer=$_GET["id"];
    $subject=$_POST["subject"];
    $content=$_POST["content"];
    $subject=htmlspecialchars($subject,ENT_QUOTES);
    $content=htmlspecialchars($content,ENT_QUOTES);
    $hit=0;
    $day=date("Y. m. d. H : i");

    $con=mysqli_connect("localhost","root","","jjsproject");
    
        if(!$subject){
            echo "<script>
                alert('제목을 입력해주세요.'); 
                history.go(-1);
                </script>";
                   }
        else if(!$content){
            echo "<script>
                alert('내용을 입력해주세요.');
                history.go(-1);
                </script>";
                    }
        else{
        $sql="insert into free_board (writer, subject, content, hit ,regist_day) values('$writer', '$subject', '$content', '$hit', '$day')";
        $rs=mysqli_query($con,$sql);

        $sql2="select*from member where id='$writer'";
        $rs2=mysqli_query($con,$sql2);
        $ar=mysqli_fetch_array($rs2);

        $point=$ar["point"];
        $point+=100;

        $sql3="update member set point='$point' where id='$writer'";
        $rs3=mysqli_query($con,$sql3);

        $sql4="select *from free_board where writer='$writer' order by num desc";
        $rs4=mysqli_query($con,$sql4);
        $ar2=mysqli_fetch_array($rs4);
        $num=$ar2["num"];
        mysqli_close($con);

        echo "<script>
            location.href='free_view.php?num=$num';
            </script>";
            }
    
    
    


    
?>