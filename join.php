<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>회원가입</title>
</head>
<body>
    <?php include "header.php"?>
    <section>
        <h1 id="join_h1">회원가입</h1>
        <h4 id="join_h1">★이 들어간 항목은 필수입력란 입니다.</h4> 
        <div id="join_div">
            <form action="join_form.php" method="POST" name="join_fo">
            <ul>
            
              <li> ★ 아이디<input type="text" name="id" id="j_id" >
                     <input type="button" value="중복체크" onclick="check_id()" id="id_bt">
                     <input type="button" value="ID변경" onclick="del_id()" id="id_del_bt"></li>
                    <li> ★ 비밀번호<input type="password" name="pass1" id="j_ps1" onkeyup="check_pass()"></li>
                    <li> ★ 비밀번호 확인<input type="password" name="pass2" id="j_ps2" onkeyup="check_pass()">
                <span id="ps_msg"></span>
                <input type="hidden" name="pass_ck" id="pass_ck">
                <input type="hidden" name="id_ck" id="id_ck">
                </li>
               <li> ★ 이메일 <input type="text" name="email1" id="email1"><b>@</b><input type="text" name="email2" id="email2">
                        <select name="email" id="email" onclick="email2_rg()" >
                            <option value="" selected>직접 입력</option>
                            <option value="naver.com" >naver.com</option>
                            <option value="gmail.com" >gmail.com</option>
                            <option value="nate.com" >nate.com</option>
                            <option value="daum.net" >daum.net</option>
                            </select>
                            <input type="button" value="중복체크" onclick="check_email()" ></li>
               <li> ★ 핸드폰 번호 <select name="phn1" id="phn1">
                            <option value="010" selected>010</option>
                            <option value="011" >011</option>
                            <option value="016" >016</option>
                            <option value="019" >019</option>
                            </select> -
                          <input type="text" maxlength="4" onkeypress="onnum();" name="phn2" id="phn2"> -
                          <input type="text" maxlength="4" onkeypress="onnum();" name="phn3" id="phn3">
                          <input type="button" value="중복체크" onclick="check_phn()" ></li>
               <li> 주소<input type="text" name="add" size="50"></li>
               <li> ★ 나만의 질문<select name="secret_ques">
                            <option value="" selected>---------질문 선택---------</option>
                            <option value="내 생에 보물 1호는?" >내 생에 보물 1호는?</option>
                            <option value="현재 키우는 애완동물의 이름은?" >현재 키우는 애완동물의 이름은?</option>
                            <option value="내가 다닌 중학교 이름은?" >내가 다닌 중학교 이름은?</option>
                            <option value="내가 제일 사랑하는 사람은?" >내가 제일 사랑하는 사람은?</option>
                            </select> ※ 아이디와 비밀번호를 잊었을 때 도움이 됩니다.</li>
                           <li> ★ 정답<input type="text" name="secret_res"></li>
               <li> <input type="submit" value="회원가입">
               &nbsp;&nbsp;
               <input type="button" value="취소" onclick="location.href='index2.php'"></li>

                </ul>
            </form>
        </div>
        <script src="./js/login.js"></script>
    </section>
    
    <?php include "footer.php"?>
</body>
</html>