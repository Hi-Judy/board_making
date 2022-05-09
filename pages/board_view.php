
<?php 
    include_once('./_common.php');
    include_once('./header.php');
    //include_once(G5_PATH.'/head.sub.php');

    echo $_GET['wr_id'];

    $wr_id = $_GET['wr_id'];

    $sql = "select * from g5_board_table where wr_id = ".$wr_id;
    $row = sql_fetch($sql);

    //add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
    

?>

<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>


<hr>

<!-- 콘텐츠 시작 { -->
<div id="wrapper">
    <div id="container_wr">
   
    <div id="container">
        <h2 id="container_title"><span title="sadasd > 자유게시판">자유게시판</span></h2>
<script src="http://localhost/gnuboard5-5.5.7.1/gnuboard5-5.5.7.1/js/viewimageresize.js"></script>

<!-- 게시물 읽기 시작 { -->

<article id="bo_v" style="width:100%">
    <header>
        <h2 id="bo_v_title">
            <span class="bo_v_tit">
                <?php echo $row['wr_seo_title']; ?>
            </span>
        </h2>
    </header>

    <section id="bo_v_info">
        <h2>페이지 정보</h2>
        <div class="profile_info">
        	<div class="pf_img"><img src="http://localhost/gnuboard5-5.5.7.1/gnuboard5-5.5.7.1/img/no_profile.gif" alt="profile_image"></div>
        	<div class="profile_info_ct">
        		<span class="sound_only">작성자</span> <strong><span class="sv_guest"><?php echo $row['wr_subject']; ?></span></strong><br>
       		 	<span class="sound_only">댓글</span><strong><a href="#bo_vc"> <i class="fa fa-commenting-o" aria-hidden="true"></i> 0건</a></strong>
        		<span class="sound_only">조회</span><strong><i class="fa fa-eye" aria-hidden="true"></i> <?php echo $row['wr_hit']; ?></strong>
        		<strong class="if_date"><span class="sound_only">작성일</span><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $row['wr_datetime']; ?></strong>
    		</div>
    	</div>

    	<!-- 게시물 상단 버튼 시작 { -->
	    <div id="bo_v_top">
	        
	        <ul class="btn_bo_user bo_v_com">
				<li><a href="http://localhost/gnuboard5-5.5.7.1/gnuboard5-5.5.7.1/bbs/board.php?bo_table=free" class="btn_b01 btn" title="목록"><i class="fa fa-list" aria-hidden="true"></i><span class="sound_only">목록</span></a></li>
	            <li><a href="http://localhost/gnuboard5-5.5.7.1/gnuboard5-5.5.7.1/bbs/write.php?w=r&amp;bo_table=free&amp;wr_id=6" class="btn_b01 btn" title="답변"><i class="fa fa-reply" aria-hidden="true"></i><span class="sound_only">답변</span></a></li>	            <li><a href="http://localhost/gnuboard5-5.5.7.1/gnuboard5-5.5.7.1/bbs/write.php?bo_table=free" class="btn_b01 btn" title="글쓰기"><i class="fa fa-pencil" aria-hidden="true"></i><span class="sound_only">글쓰기</span></a></li>	        		        	<li>
	        		<button type="button" class="btn_more_opt is_view_btn btn_b01 btn"><i class="fa fa-ellipsis-v" aria-hidden="true"></i><span class="sound_only">게시판 리스트 옵션</span></button>
		        	<ul class="more_opt is_view_btn" style="display: none;"> 
			            <li><a href="http://localhost/gnuboard5-5.5.7.1/gnuboard5-5.5.7.1/bbs/password.php?w=u&amp;bo_table=free&amp;wr_id=6&amp;page=">수정<i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></li>			            <li><a href="http://localhost/gnuboard5-5.5.7.1/gnuboard5-5.5.7.1/bbs/password.php?w=d&amp;bo_table=free&amp;wr_id=6&amp;page=" onclick="del(this.href); return false;">삭제<i class="fa fa-trash-o" aria-hidden="true"></i></a></li>			            			            			            			        </ul> 
	        	</li>
	        		        </ul>
	        <script>

            jQuery(function($){
                // 게시판 보기 버튼 옵션
				$(".btn_more_opt.is_view_btn").on("click", function(e) {
                    e.stopPropagation();
				    $(".more_opt.is_view_btn").toggle();
				})
;
                $(document).on("click", function (e) {
                    if(!$(e.target).closest('.is_view_btn').length) {
                        $(".more_opt.is_view_btn").hide();
                    }
                });
            });
            </script>
	        	    </div>
	    <!-- } 게시물 상단 버튼 끝 -->
    </section>

    <section id="bo_v_atc">
        <h2 id="bo_v_atc_title">본문</h2>
        <div id="bo_v_share">
        		        	    </div>

        <div id="bo_v_img">
</div>

        <!-- 본문 내용 시작 { -->
        <div id="bo_v_con"><?php echo $row['wr_content']?> </div>
                <!-- } 본문 내용 끝 -->

        

        <!--  추천 비추천 시작 { -->
                <!-- }  추천 비추천 끝 -->
    </section>

    
    
        
        <ul class="bo_v_nb">
        <li class="btn_next"><span class="nb_tit"><i class="fa fa-chevron-down" aria-hidden="true"></i> 다음글</span><a href="http://localhost/gnuboard5-5.5.7.1/gnuboard5-5.5.7.1/bbs/board.php?bo_table=free&amp;wr_id=5">asdasd3333</a>  <span class="nb_date">22.05.04</span></li>    </ul>
    
    
<script>
// 글자수 제한
var char_min = parseInt(0); // 최소
var char_max = parseInt(0); // 최대
</script>
<button type="button" class="cmt_btn"><span class="total"><b>댓글</b> 0</span><span class="cmt_more"></span></button>
<!-- 댓글 시작 { -->
<section id="bo_vc">
    <h2>댓글목록</h2>
        <p id="bo_vc_empty">등록된 댓글이 없습니다.</p>
</section>
<!-- } 댓글 끝 -->

<!-- 댓글 쓰기 시작 { -->
<aside id="bo_vc_w" class="bo_vc_w">
    <h2>댓글쓰기</h2>
    
<form name="fviewcomment" id="fviewcomment" action="http://localhost/gnuboard5-5.5.7.1/gnuboard5-5.5.7.1/bbs/write_comment_update.php" onsubmit="return fviewcomment_submit(this);" method="post" autocomplete="off">
    <input type="hidden" name="w" value="c" id="w">
    <input type="hidden" name="bo_table" value="free">
    <input type="hidden" name="wr_id" value="6">
    <input type="hidden" name="comment_id" value="" id="comment_id">
    <input type="hidden" name="sca" value="">
    <input type="hidden" name="sfl" value="">
    <input type="hidden" name="stx" value="">
    <input type="hidden" name="spt" value="">
    <input type="hidden" name="page" value="">
    <input type="hidden" name="is_good" value="">

    <span class="sound_only">내용</span>
        <textarea id="wr_content" name="wr_content" maxlength="10000" required="" class="required" title="내용" placeholder="댓글내용을 입력해주세요"></textarea>
        <script>
    $(document).on("keyup change", "textarea#wr_content[maxlength]", function() {
        var str = $(this).val()
        var mx = parseInt($(this).attr("maxlength"))
        if (str.length > mx) {
            $(this).val(str.substr(0, mx));
            return false;
        }
    });
    </script>
    <div class="bo_vc_w_wr">
        <div class="bo_vc_w_info">
                        <label for="wr_name" class="sound_only">이름<strong> 필수</strong></label>
            <input type="text" name="wr_name" value="" id="wr_name" required="" class="frm_input required" size="25" placeholder="이름">
            <label for="wr_password" class="sound_only">비밀번호<strong> 필수</strong></label>
            <input type="password" name="wr_password" id="wr_password" required="" class="frm_input required" size="25" placeholder="비밀번호">
                                                    
<script>var g5_captcha_url  = "http://localhost/gnuboard5-5.5.7.1/gnuboard5-5.5.7.1/plugin/kcaptcha";</script>
<script src="http://localhost/gnuboard5-5.5.7.1/gnuboard5-5.5.7.1/plugin/kcaptcha/kcaptcha.js"></script>
<fieldset id="captcha" class="_comment">
<legend><label for="captcha_key">자동등록방지</label></legend>
<img src="http://localhost/gnuboard5-5.5.7.1/gnuboard5-5.5.7.1/plugin/kcaptcha/kcaptcha_image.php?t=1651817444268" alt="" id="captcha_img"><input type="text" name="captcha_key" id="captcha_key" required="" class="captcha_box required" size="6" maxlength="6">
<button type="button" id="captcha_mp3"><span></span>숫자음성듣기</button>
<button type="button" id="captcha_reload"><span></span>새로고침</button>
<span id="captcha_info">자동등록방지 숫자를 순서대로 입력하세요.</span>
</fieldset>                    </div>
        <div class="btn_confirm">
        	<span class="secret_cm chk_box">
	            <input type="checkbox" name="wr_secret" value="secret" id="wr_secret" class="selec_chk">
	            <label for="wr_secret"><span></span>비밀글</label>
            </span>
            <button type="submit" id="btn_submit" class="btn_submit">댓글등록</button>
        </div>
    </div>
    </form></aside>

<script>
var save_before = '';
var save_html = document.getElementById('bo_vc_w').innerHTML;

function good_and_write()
{
    var f = document.fviewcomment;
    if (fviewcomment_submit(f)) {
        f.is_good.value = 1;
        f.submit();
    } else {
        f.is_good.value = 0;
    }
}

function fviewcomment_submit(f)
{
    var pattern = /(^\s*)|(\s*$)/g; // \s 공백 문자

    f.is_good.value = 0;

    var subject = "";
    var content = "";
    $.ajax({
        url: g5_bbs_url+"/ajax.filter.php",
        type: "POST",
        data: {
            "subject": "",
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

    if (content) {
        alert("내용에 금지단어('"+content+"')가 포함되어있습니다");
        f.wr_content.focus();
        return false;
    }

    // 양쪽 공백 없애기
    var pattern = /(^\s*)|(\s*$)/g; // \s 공백 문자
    document.getElementById('wr_content').value = document.getElementById('wr_content').value.replace(pattern, "");
    if (char_min > 0 || char_max > 0)
    {
        check_byte('wr_content', 'char_count');
        var cnt = parseInt(document.getElementById('char_count').innerHTML);
        if (char_min > 0 && char_min > cnt)
        {
            alert("댓글은 "+char_min+"글자 이상 쓰셔야 합니다.");
            return false;
        } else if (char_max > 0 && char_max < cnt)
        {
            alert("댓글은 "+char_max+"글자 이하로 쓰셔야 합니다.");
            return false;
        }
    }
    else if (!document.getElementById('wr_content').value)
    {
        alert("댓글을 입력하여 주십시오.");
        return false;
    }

    if (typeof(f.wr_name) != 'undefined')
    {
        f.wr_name.value = f.wr_name.value.replace(pattern, "");
        if (f.wr_name.value == '')
        {
            alert('이름이 입력되지 않았습니다.');
            f.wr_name.focus();
            return false;
        }
    }

    if (typeof(f.wr_password) != 'undefined')
    {
        f.wr_password.value = f.wr_password.value.replace(pattern, "");
        if (f.wr_password.value == '')
        {
            alert('비밀번호가 입력되지 않았습니다.');
            f.wr_password.focus();
            return false;
        }
    }

    if (!chk_captcha()) return false;

    set_comment_token(f);

    document.getElementById("btn_submit").disabled = "disabled";

    return true;
}

function comment_box(comment_id, work)
{
    var el_id,
        form_el = 'fviewcomment',
        respond = document.getElementById(form_el);

    // 댓글 아이디가 넘어오면 답변, 수정
    if (comment_id)
    {
        if (work == 'c')
            el_id = 'reply_' + comment_id;
        else
            el_id = 'edit_' + comment_id;
    }
    else
        el_id = 'bo_vc_w';

    if (save_before != el_id)
    {
        if (save_before)
        {
            document.getElementById(save_before).style.display = 'none';
        }

        document.getElementById(el_id).style.display = '';
        document.getElementById(el_id).appendChild(respond);
        //입력값 초기화
        document.getElementById('wr_content').value = '';
        
        // 댓글 수정
        if (work == 'cu')
        {
            document.getElementById('wr_content').value = document.getElementById('save_comment_' + comment_id).value;
            if (typeof char_count != 'undefined')
                check_byte('wr_content', 'char_count');
            if (document.getElementById('secret_comment_'+comment_id).value)
                document.getElementById('wr_secret').checked = true;
            else
                document.getElementById('wr_secret').checked = false;
        }

        document.getElementById('comment_id').value = comment_id;
        document.getElementById('w').value = work;

        if(save_before)
            $("#captcha_reload").trigger("click");

        save_before = el_id;
    }
}

function comment_delete()
{
    return confirm("이 댓글을 삭제하시겠습니까?");
}

comment_box('', 'c'); // 댓글 입력폼이 보이도록 처리하기위해서 추가 (root님)

</script>
<!-- } 댓글 쓰기 끝 -->
<script>
jQuery(function($) {            
    //댓글열기
    $(".cmt_btn").click(function(e){
        e.preventDefault();
        $(this).toggleClass("cmt_btn_op");
        $("#bo_vc").toggle();
    });
});
</script><script src="http://localhost/gnuboard5-5.5.7.1/gnuboard5-5.5.7.1/js/md5.js"></script>
</article>
<!-- } 게시판 읽기 끝 -->

<script>
$(function() {
    $("a.view_file_download").click(function() {
        if(!g5_is_member) {
            alert("다운로드 권한이 없습니다.\n회원이시라면 로그인 후 이용해 보십시오.");
            return false;
        }

        var msg = "파일을 다운로드 하시면 포인트가 차감(-20점)됩니다.\n\n포인트는 게시물당 한번만 차감되며 다음에 다시 다운로드 하셔도 중복하여 차감하지 않습니다.\n\n그래도 다운로드 하시겠습니까?";

        if(confirm(msg)) {
            var href = $(this).attr("href")+"&js=on";
            $(this).attr("href", href);

            return true;
        } else {
            return false;
        }
    });
});

function board_move(href)
{
    window.open(href, "boardmove", "left=50, top=50, width=500, height=550, scrollbars=1");
}
</script>

<script>
$(function() {
    $("a.view_image").click(function() {
        window.open(this.href, "large_image", "location=yes,links=no,toolbar=no,top=10,left=10,width=10,height=10,resizable=yes,scrollbars=no,status=no");
        return false;
    });

    // 추천, 비추천
    $("#good_button, #nogood_button").click(function() {
        var $tx;
        if(this.id == "good_button")
            $tx = $("#bo_v_act_good");
        else
            $tx = $("#bo_v_act_nogood");

        excute_good(this.href, $(this), $tx);
        return false;
    });

    // 이미지 리사이즈
    $("#bo_v_atc").viewimageresize();
});

function excute_good(href, $el, $tx)
{
    $.post(
        href,
        { js: "on" },
        function(data) {
            if(data.error) {
                alert(data.error);
                return false;
            }

            if(data.count) {
                $el.find("strong").text(number_format(String(data.count)));
                if($tx.attr("id").search("nogood") > -1) {
                    $tx.text("이 글을 비추천하셨습니다.");
                    $tx.fadeIn(200).delay(2500).fadeOut(200);
                } else {
                    $tx.text("이 글을 추천하셨습니다.");
                    $tx.fadeIn(200).delay(2500).fadeOut(200);
                }
            }
        }, "json"
    );
}
</script>
<!-- } 게시글 읽기 끝 -->
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
            <input type="hidden" name="url" value="%2Fgnuboard5-5.5.7.1%2Fgnuboard5-5.5.7.1%2Fbbs%2Fboard.php%3Fbo_table%3Dfree%26wr_id%3D6">
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

<!-- 하단-->
<?php include_once('./foot.php');?>

<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>



<!-- ie6,7에서 사이드뷰가 게시판 목록에서 아래 사이드뷰에 가려지는 현상 수정 -->
<!--[if lte IE 7]>
<script>
$(function() {
    var $sv_use = $(".sv_use");
    var count = $sv_use.length;

    $sv_use.each(function() {
        $(this).css("z-index", count);
        $(this).css("position", "relative");
        count = count - 1;
    });
});
</script>
<![endif]-->





