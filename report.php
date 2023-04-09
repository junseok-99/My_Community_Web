<?php
    $id=$_POST["id"];
    $re_id=$_POST["report_id"];
    $content=$_POST["content"];
    $time = date("Y-m-d (H:i)");
    $report_check=0;

    if(!$content){
        echo "<script>
                    alert('사유를 입력해주세요.');
                    history.go(-1);
                </script>";
    }
    else{
    $con=mysqli_connect("localhost","root","","jjsproject");
    $sql="select * from member where id='$re_id'";
    $rs=mysqli_query($con,$sql);
    $num=mysqli_num_rows($rs);
    if(!$num){
        echo "<script>
                    alert('신고대상 아이디가 존재하지 않습니다.');
                    history.go(-1);
                </script>";
    }
    else{
    $sql2="insert into reportlist (id, content,report_id, regist_day,report_check) values('$id','$content','$re_id','$time','$report_check')";
    $rs2=mysqli_query($con,$sql2);
    mysqli_close($con);

    echo "<script>
                    alert('신고가 접수되었습니다.');
                    location.href='report_box.php';
                </script>";
            }
}
    ?>