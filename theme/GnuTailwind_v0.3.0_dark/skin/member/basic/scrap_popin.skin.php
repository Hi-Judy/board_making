<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>

<!-- 스크랩 시작 { -->
<div id="scrap_do" class="new_win container mx-auto">
    <h1 id="win_title">스크랩하기</h1>
    <form name="f_scrap_popin" action="./scrap_popin_update.php" method="post">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="wr_id" value="<?php echo $wr_id ?>">
    <div class="new_win_con">
	    <h2 class="sound_only">제목 확인 및 댓글 쓰기</h2>
	    <ul>
<!-- 		    margin-bottom:10px;background:#f3f3f3;padding:10px 15px;font-size:1.2em;font-weight:bold -->
	        <li class="mb-3 bg-indigo-50 py-3 px-4 text-base font-semibold">
	            <span class="sound_only">제목</span>
	            <?php echo get_text(cut_str($write['wr_subject'], 255)) ?>
	        </li>
	        <li>
	            <label for="wr_content">댓글작성</label>
	            <textarea name="wr_content" id="wr_content"></textarea>
	        </li>
	    </ul>
	</div>
    <p class="win_desc">스크랩을 하시면서 감사 혹은 격려의 댓글을 남기실 수 있습니다.</p>

    <div class="win_btn">
        <button type="submit" class="leading-8 h-8 px-3 text-center font-normal border-0 text-base transition transition-colors duration-300 ease-out text-white bg-indigo-500 hover:bg-indigo-600 rounded">스크랩 확인</button>
    </div>
    </form>
</div>
<!-- } 스크랩 끝 -->