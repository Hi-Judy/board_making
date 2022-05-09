<?php 

include_once('./_common.php');
include_once('./header.php');

?>


<hr>

<!-- 콘텐츠 시작 { -->
<div id="wrapper">
    <div id="container_wr">
   
    <div id="container">
        <h2 id="container_title"><span title="자유게시판 글쓰기">자유게시판 글쓰기</span></h2><!-- skin : basic -->
<section id="bo_w">
    <h2 class="sound_only">자유게시판 글쓰기</h2>

    <!-- 게시물 작성/수정 시작 { -->
    <form name="fwrite" id="fwrite" action="http://localhost/gnuboard5-5.5.7.1/gnuboard5-5.5.7.1/bbs/write_update.php" onsubmit="return fwrite_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off" style="width:100%">
    <input type="hidden" name="uid" value="2022050616461540">
    <input type="hidden" name="w" value="">
    <input type="hidden" name="bo_table" value="free">
    <input type="hidden" name="wr_id" value="0">
    <input type="hidden" name="sca" value="">
    <input type="hidden" name="sfl" value="">
    <input type="hidden" name="stx" value="">
    <input type="hidden" name="spt" value="">
    <input type="hidden" name="sst" value="">
    <input type="hidden" name="sod" value="">
    <input type="hidden" name="page" value="">
    
    
    <div class="bo_w_info write_div">
	    	        <label for="wr_name" class="sound_only">이름<strong>필수</strong></label>
	        <input type="text" name="wr_name" value="" id="wr_name" required="" class="frm_input half_input required" placeholder="이름">
	    	
	    	        <label for="wr_password" class="sound_only">비밀번호<strong>필수</strong></label>
	        <input type="password" name="wr_password" id="wr_password" required="" class="frm_input half_input required" placeholder="비밀번호">
	    	
	    			<label for="wr_email" class="sound_only">이메일</label>
			<input type="text" name="wr_email" value="" id="wr_email" class="frm_input half_input email " placeholder="이메일">
	    	    
	
	    	        <label for="wr_homepage" class="sound_only">홈페이지</label>
	        <input type="text" name="wr_homepage" value="" id="wr_homepage" class="frm_input half_input" size="50" placeholder="홈페이지">
	    	</div>
	
        <div class="write_div">
        <span class="sound_only">옵션</span>
        <ul class="bo_v_option">
        
<li class="chk_box"><input type="checkbox" id="html" name="html" onclick="html_auto_br(this);" class="selec_chk" value="">
<label for="html"><span></span>html</label></li>        </ul>
    </div>
    
    <div class="bo_w_tit write_div">
        <label for="wr_subject" class="sound_only">제목<strong>필수</strong></label>
        
        <div id="autosave_wrapper" class="write_div">
            <input type="text" name="wr_subject" value="" id="wr_subject" required="" class="frm_input full_input required" size="50" maxlength="255" placeholder="제목">
                    </div>
        
    </div>

    <div class="write_div">
        <label for="wr_content" class="sound_only">내용<strong>필수</strong></label>
        <div class="wr_content ">
                        <span class="sound_only">웹에디터 시작</span>
<textarea id="wr_content" name="wr_content" class="" maxlength="65536" style="width:100%;height:300px"></textarea>
<span class="sound_only">웹 에디터 끝</span>                    </div>
        
    </div>

        <div class="bo_w_link write_div">
        <label for="wr_link1"><i class="fa fa-link" aria-hidden="true"></i><span class="sound_only"> 링크  #1</span></label>
        <input type="text" name="wr_link1" value="" id="wr_link1" class="frm_input full_input" size="50">
    </div>
        <div class="bo_w_link write_div">
        <label for="wr_link2"><i class="fa fa-link" aria-hidden="true"></i><span class="sound_only"> 링크  #2</span></label>
        <input type="text" name="wr_link2" value="" id="wr_link2" class="frm_input full_input" size="50">
    </div>
    
        <div class="bo_w_flie write_div">
        <div class="file_wr write_div">
            <label for="bf_file_1" class="lb_icon"><i class="fa fa-folder-open" aria-hidden="true"></i><span class="sound_only"> 파일 #1</span></label>
            <input type="file" name="bf_file[]" id="bf_file_1" title="파일첨부 1 : 용량 1,048,576 바이트 이하만 업로드 가능" class="frm_file ">
        </div>
        
                
    </div>
        <div class="bo_w_flie write_div">
        <div class="file_wr write_div">
            <label for="bf_file_2" class="lb_icon"><i class="fa fa-folder-open" aria-hidden="true"></i><span class="sound_only"> 파일 #2</span></label>
            <input type="file" name="bf_file[]" id="bf_file_2" title="파일첨부 2 : 용량 1,048,576 바이트 이하만 업로드 가능" class="frm_file ">
        </div>
        
                
    </div>
    


    
    <div class="btn_confirm write_div">
        <a href="http://localhost/gnuboard5-5.5.7.1/gnuboard5-5.5.7.1/bbs/board.php?bo_table=free" class="btn_cancel btn">취소</a>
        <button type="submit" id="btn_submit" accesskey="s" class="btn_submit btn">작성완료</button>
    </div>
    </form>

    <script>
        function html_auto_br(obj)
    {
        if (obj.checked) {
            result = confirm("자동 줄바꿈을 하시겠습니까?\n\n자동 줄바꿈은 게시물 내용중 줄바뀐 곳을<br>태그로 변환하는 기능입니다.");
            if (result)
                obj.value = "html2";
            else
                obj.value = "html1";
        }
        else
            obj.value = "";
    }

    function fwrite_submit(f)
    {
        var wr_content_editor = document.getElementById('wr_content');
if (!wr_content_editor.value) { alert("내용을 입력해 주십시오."); wr_content_editor.focus(); return false; }

        var subject = "";
        var content = "";
        $.ajax({
            url: g5_bbs_url+"/ajax.filter.php",
            type: "POST",
            data: {
                "subject": f.wr_subject.value,
                "content": f.wr_content.value
            },
            dataType: "json",
            async: false,
            cache: false,
            success: function(data, textStatus) {
                subject = data.subject;
                content = data.content;
            }
        });

        if (subject) {
            alert("제목에 금지단어('"+subject+"')가 포함되어있습니다");
            f.wr_subject.focus();
            return false;
        }

        if (content) {
            alert("내용에 금지단어('"+content+"')가 포함되어있습니다");
            if (typeof(ed_wr_content) != "undefined")
                ed_wr_content.returnFalse();
            else
                f.wr_content.focus();
            return false;
        }

        if (document.getElementById("char_count")) {
            if (char_min > 0 || char_max > 0) {
                var cnt = parseInt(check_byte("wr_content", "char_count"));
                if (char_min > 0 && char_min > cnt) {
                    alert("내용은 "+char_min+"글자 이상 쓰셔야 합니다.");
                    return false;
                }
                else if (char_max > 0 && char_max < cnt) {
                    alert("내용은 "+char_max+"글자 이하로 쓰셔야 합니다.");
                    return false;
                }
            }
        }

        if (!chk_captcha()) return false;

        document.getElementById("btn_submit").disabled = "disabled";

        return true;
    }
    </script>
</section>
<!-- } 게시물 작성/수정 끝 -->
    </div>
    <div id="aside">
        
<!-- 로그인 전 아웃로그인 시작 { -->
<section id="ol_before" class="ol">
	<div id="ol_be_cate">
    	<h2><span class="sound_only">회원</span>로그인</h2>
    	<a href="http://localhost/gnuboard5-5.5.7.1/gnuboard5-5.5.7.1/bbs/register.php" class="join">회원가입</a>
    </div>
    <form name="foutlogin" action="http://localhost/gnuboard5-5.5.7.1/gnuboard5-5.5.7.1/bbs/login_check.php" onsubmit="return fhead_submit(this);" method="post" autocomplete="off">
    <fieldset>
        <div class="ol_wr">
            <input type="hidden" name="url" value="%2Fgnuboard5-5.5.7.1%2Fgnuboard5-5.5.7.1%2Fbbs%2Fwrite.php%3Fbo_table%3Dfree">
            <label for="ol_id" id="ol_idlabel" class="sound_only ol_idlabel">회원아이디<strong>필수</strong></label>
            <input type="text" id="ol_id" name="mb_id" required="" maxlength="20" placeholder="아이디">
            <label for="ol_pw" id="ol_pwlabel" class="sound_only ol_pwlabel">비밀번호<strong>필수</strong></label>
            <input type="password" name="mb_password" id="ol_pw" required="" maxlength="20" placeholder="비밀번호">
            <input type="submit" id="ol_submit" value="로그인" class="btn_b02">
        </div>
        <div class="ol_auto_wr"> 
            <div id="ol_auto" class="chk_box">
                <input type="checkbox" name="auto_login" value="1" id="auto_login" class="selec_chk">
                <label for="auto_login" id="auto_login_label"><span></span>자동로그인</label>
            </div>
            <div id="ol_svc">
                <a href="http://localhost/gnuboard5-5.5.7.1/gnuboard5-5.5.7.1/bbs/password_lost.php">ID/PW 찾기</a>
            </div>
        </div>
        
    </fieldset>
    </form>
</section>

<script>
jQuery(function($) {

    var $omi = $('#ol_id'),
        $omp = $('#ol_pw'),
        $omi_label = $('#ol_idlabel'),
        $omp_label = $('#ol_pwlabel');

    $omi_label.addClass('ol_idlabel');
    $omp_label.addClass('ol_pwlabel');

    $("#auto_login").click(function(){
        if ($(this).is(":checked")) {
            if(!confirm("자동로그인을 사용하시면 다음부터 회원아이디와 비밀번호를 입력하실 필요가 없습니다.\n\n공공장소에서는 개인정보가 유출될 수 있으니 사용을 자제하여 주십시오.\n\n자동로그인을 사용하시겠습니까?"))
                return false;
        }
    });
});

function fhead_submit(f)
{
    if( $( document.body ).triggerHandler( 'outlogin1', [f, 'foutlogin'] ) !== false ){
        return true;
    }
    return false;
}
</script>
<!-- } 로그인 전 아웃로그인 끝 -->
            </div>
</div>

</div>
<!-- } 콘텐츠 끝 -->

<hr>


<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>

<!-- 하단 -->
<?php 
    include_once('./foot.php');
?>
