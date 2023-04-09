<?php
    $send_id=$_GET["id"];
    $rv_id=$_POST["rv_id"];
    $subject=$_POST["subject"];
    $content=$_POST["content"];
    $subject=htmlspecialchars($subject,ENT_QUOTES);
    $content=htmlspecialchars($content,ENT_QUOTES);
    $day=date("Y-m-d (H:i)");

    $con=mysqli_connect("localhost","root","","jjsproject");
    $sql="select*from member where id='$rv_id'";
    $rs=mysqli_query($con,$sql);
    $row=mysqli_num_rows($rs);

    if($row){//수신아이디 있음
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
        else if($send_id==$rv_id){
            echo "<script>
                alert('자기자신한테는 보낼 수 없습니다.');
                history.go(-1);
                </script>";
                                }
        else{
        $sql2="insert into messagelist (send_id, rv_id, subject, content, regist_day) values('$send_id', '$rv_id', '$subject', '$content', '$day')";
        $rs=mysqli_query($con,$sql2);
        mysqli_close($con);

        echo "<script>
            location.href='msg_box.php?mode=send';
            </script>";
            }
    }
    elseif(!$row){//수신아이디없음
        echo "<script>
            alert('존재하지 않거나 가입되지 않은 아이디입니다.');
            history.go(-1);
            </script>";
    }
    


    
?>