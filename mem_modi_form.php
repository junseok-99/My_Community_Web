<?php
    $mem_id=$_POST["mem_id"];
    $mem_point=$_POST["mem_po"];
    $mem_level=$_POST["mem_level"];
    $start=$_POST["start"];
    $scale=$_POST["scale"];
    $total=$_POST["total"];
    $page=$_POST["page"];


    $con=mysqli_connect("localhost","root","","jjsproject");
    $sql="select * from member ";
    $rs=mysqli_query($con,$sql);
    $num=mysqli_num_rows($rs);
    
    $j=0;
    
    for($i=$start; $i<$start+$scale&&$i<$total;$i++){
        
        if($mem_point[$j]=="")$mem_point[$j]=0;
        $sql2="update member set point='$mem_point[$j]' where id='$mem_id[$j]'";
        $sql3="update member set level='$mem_level[$j]' where id='$mem_id[$j]'";
        $rs2=mysqli_query($con,$sql2);
        $rs3=mysqli_query($con,$sql3);
        $j++;
       
    }
    
    

    echo "<script>
            alert('회원정보가 수정되었습니다.');
            location.href='member_modify.php?page=$page';
        </script>";
?>