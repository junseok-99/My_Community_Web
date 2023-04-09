
        id=document.getElementById("j_id");
        ps1=document.getElementById("j_ps1"); ps2=document.getElementById("j_ps2");
        ps_msg=document.getElementById("ps_msg");
        ps_ck=document.getElementById("pass_ck");
        id_ck=document.getElementById("id_ck");
        email=document.getElementById("email");
        email1=document.getElementById("email1");
        email2=document.getElementById("email2");
        phn1=document.getElementById("phn1");
        phn2=document.getElementById("phn2");
        phn3=document.getElementById("phn3");
        

        function email2_rg(){//이메일 입력도우미
            email2.value=email.value;
            email2.readOnly=true;
            if(email2.value=="")
            email2.readOnly=false;
        }
        function onnum(){//한글입력 X
            if ((event.keyCode < 48) || (event.keyCode > 57))
            event.returnValue = false;   
        }
        
        function check_id(){//아이디 중복체크           
            if(id.value==""){
                alert("아이디를 입력해주세요!");
            }
            else{
                window.open("check_id.php?id="+id.value,"IDcheck","left=1000,width=300, height=300"); 
            } 
        }
        function check_email(){//이메일 중복체크   
            if(email1.value==""||email2.value==""){
                alert("이메일을 입력해주세요!");
            
            }
            else{
                window.open("check_email.php?email="+email1.value+"@"+email2.value,"Emailcheck","left=1000,width=300, height=300");
            } 
        }
        function check_phn(){//핸드폰번호 중복체크   
            if(phn1.value==""||phn2.value==""||phn3.value==""){
                alert("핸드폰 번호를 입력해주세요!");   
            }
            else{
                phn=phn1.value+"-"+phn2.value+"-"+phn3.value;
                window.open("check_phn.php?phn="+phn,"Phncheck","left=1000,width=300, height=300");
            } 
        }
        
        function del_id(){//아이디 변경
            id.value="";
            id.readOnly=false;
            id.style.backgroundColor="white";
        }
   