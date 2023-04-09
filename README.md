# My_Community_Web
<p>PHP를 사용해 만든 나만의 커뮤니티 사이트 입니다.</p>

<h2>1.Intro</h2>
<p><b>- 홈페이지에 첫 접속한 사진이다. 기본적으로 회원가입, ID/PW찾기, 로그인, 최근게시물 보여주기, 메뉴 바 기능을 포함한다.</b></p>
<img width="80%" src="https://user-images.githubusercontent.com/81612834/230772700-8e6e91d9-cc05-4a13-b53a-b28b5c030c45.png"/>

<p><b>- DB에 아이디와 비밀번호가 존재하지 않거나, 입력한 아이디와 비밀번호가 일치하지 않으면 경고창을 띄워준다.</b></p>
<table>
  <tr>
    <td><img width="80%" src="https://user-images.githubusercontent.com/81612834/230772773-a37702ca-96ba-44bb-8e81-694abf80783e.png"/></td>
    <td><img width="80%" src="https://user-images.githubusercontent.com/81612834/230772772-4aeff3e1-ce91-40a3-a022-c4eec3f6c78d.png"/></td>
  <tr>
</table>

<p><b>- 로그인에 성공하게되면 로그인폼의 데이터가 바뀐다.</b></p>
<img width="80%" src="https://user-images.githubusercontent.com/81612834/230772984-11304926-9425-4ef8-9af4-2f8e2fc53b51.png"/>

<br>
<h2>2.Sign Up</h2>
<p><b>- 다음은 회원가입창이다.</b></p>
<p><b>- 필수항목을 입력하지 않으면 회원가입 진행이 되지 않는다.</b></p>
<img width="80%" src="https://user-images.githubusercontent.com/81612834/230773073-27d900aa-1683-41f0-98be-35a15df92c11.png"/>
<p><b>- 추가로 Javascript를 사용하여 실시간으로 비밀번호란과 비밀번호확인란의 일치하는지 알려준다.</b></p>
<table>
  <tr>
    <td><img width="80%" src="https://user-images.githubusercontent.com/81612834/230773130-cefba29d-76c3-4860-bf33-302692794ee9.png"/></td>
    <td><img width="80%" src="https://user-images.githubusercontent.com/81612834/230773131-786cb38d-4f66-4c9c-86f2-49f2b747e46c.png"/></td>
  <tr>
</table>

<br>
<h2>3.ID/PW 찾기</h2>
<p><b>- 아이디와 비밀번호찾기 기능은 회원가입시 입력하였던 정보들을 이용해 아이디와 비밀번호를 찾아주도록 하였다.</b></p>
<img width="80%" src="https://user-images.githubusercontent.com/81612834/230773230-962f1aa8-d8c3-4202-a457-0064ebdb7c4c.png"/>

<h3>3-1.ID 찾기</h3>
<img width="80%" src="https://user-images.githubusercontent.com/81612834/230773379-5afc6089-5ee5-435b-a95f-16d5da8ebeb5.png"/>
<img width="80%" src="https://user-images.githubusercontent.com/81612834/230773311-a8a53694-72d2-4465-a4cb-9f77ed92913e.png"/>
<img width="80%" src="https://user-images.githubusercontent.com/81612834/230773312-4bcbf90b-04df-4394-a08d-2854efbf7b93.png"/>

<h3>3-2.PW 찾기</h3>
<img width="80%" src="https://user-images.githubusercontent.com/81612834/230773425-5343138e-b236-46c9-8973-401a84138c3d.png"/>
<img width="80%" src="https://user-images.githubusercontent.com/81612834/230773426-315eed62-bb80-44f5-886f-9adb5c594d0d.png"/>
<img width="80%" src="https://user-images.githubusercontent.com/81612834/230773423-4cd0a0e1-e6ac-4ae5-b403-25839eb37f71.png"/>

<br>
<h2>4.My Page</h2>
<p><b>- 로그인 후 마이페이지에 들어가면 회원가입시 입력했던 정보들을 확인할 수 있고, 비밀번호, 질문, 답은 수정이 가능하다.</b></p>
<img width="80%" src="https://user-images.githubusercontent.com/81612834/230773502-0c3e478a-3cd2-45fd-8629-78beae7874b4.png"/>

<br>
<h2>5.쪽지함</h2>
<p><b>-  나의 쪽지함에 접속하면 수신, 송신 쪽지함을 확인할 수 있고 쪽지함에서 제목을 클릭하게 되면 쪽지의 내용을 확인할 수 있다.</b></p>
<p><b>- 쪽지함 내의 쪽지가 일정 개수를 넘으면 다음페이지에 표시하도록 하였다.</b></p>
<img width="80%" src="https://user-images.githubusercontent.com/81612834/230773600-bba8f309-d638-474b-b898-bf6b89ea9de8.png"/>
<img width="80%" src="https://user-images.githubusercontent.com/81612834/230773598-99273b32-3af6-46ce-a69c-b1ebc306108d.png"/>
<p><b>- 삭제도 가능하다.</b></p>
<p><b>- 쪽지를 보낼 때 받는 사람의 아이디가 db에 존재하지 않으면 보낼 수 없게 된다.</b></p>
<img width="80%" src="https://user-images.githubusercontent.com/81612834/230773654-aa1e714b-3de4-45c3-98c3-818ef30216c4.png"/>
<img width="80%" src="https://user-images.githubusercontent.com/81612834/230773652-22d36fa4-763a-4242-8def-4db7be8a5200.png"/>

<br>
<h2>6.회원관리</h2>
<p><b>- 관리자로 로그인하게 되면 회원관리를 할 수 있다. 포인트, 등급을 수정할 수 있고, 아이디를 정지시킬 수 있다.</b></p>
<p><b>- 회원의 수가 일정개수를 넘으면 다음페이지에 표시된다.</b></p>
<img width="80%" src="https://user-images.githubusercontent.com/81612834/230773747-9dadf563-ff2a-4d9f-93d4-39c2709a0aaf.png"/>

<br>
<h2>7.자유게시판</h2>
<p><b>- 자유게시판에서 회원들은 글을 작성할 수 있고, 확인할 수 있다.</b></p>
<p><b>- 번호, 제목, 글쓴이, 등급, 작성시간, 조회 수, 댓글 수를 확인 할 수 있다.</b></p>
<img width="80%" src="https://user-images.githubusercontent.com/81612834/230773896-ed6b3a5e-0bf0-4a12-9360-7b04a8536d2a.png"/>
<p><b>- 내 글보기, 등록순, 조회순 중에 원하는 순서로 정렬 할 수 있다.</b></p>
<img width="80%" src="https://user-images.githubusercontent.com/81612834/230773939-116c42bc-c26e-47d7-8f08-2e39e1012b29.png"/>
<p><b>- 찾고 싶은 제목을 검색하여 찾을 수 있다.</b></p>
<img width="80%" src="https://user-images.githubusercontent.com/81612834/230773971-b30e5054-95be-4822-8b3e-ae81889d63f2.png"/>
<p><b>- 게시글에 접속하게 되면 조회수가 올라간다.</b></p>
<p><b>- 자유게시판에서 글을 선택하여 내용을 확인할 수 있고, 로그인 아이디와 작성아이디가 같으면 글을 수정하거나 삭제할 수 있다.</b></p>
<img width="80%" src="https://user-images.githubusercontent.com/81612834/230774027-c09da406-619f-45b6-840f-58195da3823d.png"/>
<p><b>- 모든 회원들은 게시글에 댓글을 달 수 있다. 댓글이 일정개수를 초과하면 다음페이지에 표시된다. 마음에 들지 않은 댓글은 삭제가 가능하다. 단 로그인 아이디와 작성아이디가 다르면 삭제는 불가능하다.</b></p>
<p><b>- 관리자는 모든 댓글과 게시글들을 삭제할 수 있다.</b></p>
<img width="80%" src="https://user-images.githubusercontent.com/81612834/230774021-d177ffbd-6399-4633-92b7-0c8cf48993fb.png"/> 
<img width="80%" src="https://user-images.githubusercontent.com/81612834/230774026-008747a9-af2f-488a-a24a-63b0cffa67b5.png"/>
<img width="80%" src="https://user-images.githubusercontent.com/81612834/230774025-d5ace787-88e3-4955-a351-c1e1ab54ddd2.png"/>

<br>
<h2>8.회원탈퇴</h2>
<p><b>- 관리자를 제외한 모든 회원들은 회원탈퇴를 할 수 있다. 탈퇴한 이유는 DB에서 확인이 가능하다.</b></p>
<img width="80%" src="https://user-images.githubusercontent.com/81612834/230774504-e2e5aa59-a395-41f1-9bb1-a94a901b08ee.png"/>
<img width="80%" src="https://user-images.githubusercontent.com/81612834/230774501-19b03950-4e5a-4f92-8bc6-203d7042fba9.png"/>

<br>
<h2>9.등업하기</h2>
<p><b>- 관리자를 제외한 모든 회원들은 일정한 포인트를 획득하면 다음 등급으로 등업할 수 있다.</b></p>
<img width="80%" src="https://user-images.githubusercontent.com/81612834/230774559-d79412a0-553d-4879-997b-a88dde3ee1d0.png"/>

<br>
<h2>10.신고하기 및 신고함</h2>
<p><b>- 모든 회원들은 회원들을 신고할 수 있다. DB에 존재하지 않는 아이디는 신고할 수 없다. 신고가 완료되면 신고함에서 확인이 가능하다.</b></p>
<img width="80%" src="https://user-images.githubusercontent.com/81612834/230774632-716f1b3a-7b84-4875-84d5-035f564eebce.png"/>
<img width="80%" src="https://user-images.githubusercontent.com/81612834/230774631-12300d86-640b-4232-b33b-9c8eead6e58a.png"/>
<img width="80%" src="https://user-images.githubusercontent.com/81612834/230774625-f07f30f9-d113-4126-a6db-3484b6db499a.png"/>

<p><b>- 신고가 접수되면 관리자는 신고함에서 답변을 달아줄 수 있다. 답변이 달리면 처리여부의 상태가 바뀌고, 회원들은 관리자가 작성한 답변을 확인할 수 있다.</b></p>
<img width="80%" src="https://user-images.githubusercontent.com/81612834/230774700-0b84e7e4-155d-458a-816e-29f013bfc954.png"/>
<img width="80%" src="https://user-images.githubusercontent.com/81612834/230774701-7128c2f2-e009-4f59-b768-b465a74ce4ce.png"/>
<img width="80%" src="https://user-images.githubusercontent.com/81612834/230774702-fc547e01-3640-4dda-8adc-8b1d7085ab04.png"/>



