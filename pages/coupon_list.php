<?php

  include_once('./_common.php');
  include_once(G5_PATH.'/head.php');

  if(!$member['mb_id']){
    goto_url(G5_URL);
  }

  $cpstateArr['0']="발행";
  $cpstateArr['1']="사용";
  $cpstateArr['2']="취소";

  $sql_search = " (1) ";

  if($member['mb_level'] == 2){
    $sql_search .= "and cp_public_mb_id = '{$member['mb_id']}'";
  }

  if($member['mb_level'] == 3){
    $sql_search .= "and cp_inst_region = '{$member['mb_memo']}'";
  }

  if($sfl && $stx){
	  if($sfl=='cp_parent_tel') $stx=hyphen_hp_number($stx);
	  $sql_search .= " and {$sfl} like '%{$stx}%' ";
  }

  $sql = " SELECT COUNT(*) AS `cnt` FROM coupon_data WHERE {$sql_search} ";
  $row = sql_fetch($sql);
  if(!$page) $page=1;
  $total_count = $row['cnt'];
  $page_rows = 10; //10개씩 리스팅
  $total_page = ceil($total_count / $page_rows);  // 전체 페이지 계산
  $from_record = ($page - 1) * $page_rows; // 시작 열을 구함

  $sql = " SELECT * FROM coupon_data WHERE {$sql_search} ORDER BY cp_id DESC LIMIT {$from_record}, {$page_rows}";
  $result = sql_query($sql);
  $cnt = sql_num_rows($result);

  $total_0_sql = "SELECT COUNT(*) AS `cnt` FROM coupon_data WHERE cp_use_state = 0";
  $total_1_sql = "SELECT COUNT(*) AS `cnt` FROM coupon_data WHERE cp_use_state = 1";
  // $total_2_sql = "SELECT COUNT(*) AS `cnt` FROM coupon_data WHERE cp_use_state = 2";

  $total_0 = sql_fetch($total_0_sql)['cnt'];
  $total_1 = sql_fetch($total_1_sql)['cnt'];
  // $total_2 = sql_fetch($total_2_sql)['cnt'];

?>

  <link href="/theme/GnuTailwind_v0.3.0_dark/assets/theme.css" rel="stylesheet">
  <link href="/theme/GnuTailwind_v0.3.0_dark/css/coupon.css" rel="stylesheet">

  <div id="container" class="container mx-auto sm:px-4 scrolled-offset">
    <h2 id="container_title" class="relative text-center mt-6">
      <span title="쿠폰발행 이력 1 페이지" class="text-xl font-semibold mb-4 block">
        쿠폰발행 이력  </span>
    </h2>

    <?php if ($is_admin) { ?>
    <div style="float:right">
      총 발행 쿠폰: <? echo $total_0 + $total_1 ?>,
      사용대기 쿠폰: <? echo $total_0 ?>,
      사용등록 쿠폰: <? echo $total_1 ?>
    </div>
    <?php } ?>
  </div>

  <!-- 게시판 목록 시작 { -->
  <div id="bo_list" class="pt-4 pb-6">

    <!-- 게시판 페이지 정보 및 버튼 시작 { -->
    <div id="bo_btn_top" class="mt-3 mx-0">
      <div id="bo_list_total" class="float-left leading-10 text-gray-700">
			<form name="fsearch" method="get" class="">
		        <span class="text-base">Total <?php echo number_format($total_count)?>건</span>
		        <span class="text-base"><?php echo number_format($page)?> 페이지</span>
				<select name="sfl" id="sfl" class="py-2 border bg-white">
					<option value="">선택</option>
					<option value="cp_inst_name">복지센터</option>
					<option value="cp_inst_region">지역</option>
					<option value="cp_code">쿠폰번호</option>
					<option value="cp_child_name">아이이름</option>
					<option value="cp_parent_name">부모이름</option>
					<option value="cp_parent_tel">부모전화번호</option>
					<option value="cp_use_id">쿠폰사용아이디</option>
				</select>
				<?php if($stx) echo "<script>sfl.value='{$sfl}'</script>";?>
				<label for="stx" class="sr-only">검색어<strong class="sr-only"> 필수</strong></label>
				<input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" required id="stx" class="sch_input bg-white w-60 h-9 border-1 p-0" size="25" maxlength="20" placeholder=" 검색어를 입력해주세요">
				<button type="submit" value="검색" class="sch_btn h-10 text-gray-700 bg-none border-0 w-10 text-base"><i class="fa fa-search text" aria-hidden="true"></i><span class="sr-only">검색</span></button>
				<?php if($stx){?>
				<button type="button" value="검색취소" class="sch_btn h-10 text-gray-700 bg-none border-0 w-10 text-base" onclick="location.href='<?php echo $PHP_SELF;?>';"><i class="fa fa-refresh text" aria-hidden="true"></i><span class="sr-only">취소</span></button>
				<?php } ?>
			</form>

      </div>
        <ul class="btn_bo_user float-right m-0 p-0 inline-flex">
          <?php if ($member['mb_level'] >= 3) { ?>
          <li class="h-10 leading-10 transition-colors duration-300 ease-out text-white bg-red-400 hover:bg-red-500 rounded m-1">
            <a href='../pages/excel/coupon_excel.php' onclick="return excelform(this.href);" class="leading-8 h-8 px-3 text-center font-normal border-0 text-base transition" target='_blank'>
              <i class="fa fa-upload" aria-hidden="true"></i> 엑셀일괄등록 - 준비중
            </a>
          </li>
          <li class="h-10 leading-10 transition-colors duration-300 ease-out text-white bg-red-400 hover:bg-red-500 rounded m-1">
            <a href='../pages/excel/excel_list_down.php' class="leading-8 h-8 px-3 text-center font-normal border-0 text-base transition" target='_blank'>
              <i class="fa fa-download" aria-hidden="true"></i> 리스트 다운로드
            </a>
          </li>

          <li class="h-10 leading-10 transition-colors duration-300 ease-out text-white bg-red-400 hover:bg-red-500 rounded m-1">
            <a class="leading-8 h-8 px-3 text-center font-normal border-0 text-base transition" href="./coupon_public_test.php">주민번호TEST</a>
          </li>

          <?php } ?>
          <li class="h-10 leading-10 transition-colors duration-300 ease-out text-white bg-red-400 hover:bg-red-500 rounded m-1">
            <a class="leading-8 h-8 px-3 text-center font-normal border-0 text-base transition" href="./coupon_public.php">쿠폰발행</a>
          </li>
        </ul>
    </div>
    <!-- } 게시판 페이지 정보 및 버튼 끝 -->

    <div class="tbl_wrap">
      <table class="table-auto w-full">
        <caption>쿠폰발행 이력 목록</caption>
        <thead>
          <tr class="border-t border-b font-semibold text-gray-500">
            <th scope="col" class="text-center whitespace-nowrap py-3 px-3">번호</th>
            <th scope="col" class="show-cell py-3 text-center px-3">지역</th>
            <th scope="col" class="show-cell py-3 text-center px-3">복지센터</th>
            <th scope="col" class="show-cell whitespace-nowrap py-3 text-center px-3">쿠폰번호</th>
            <th scope="col" class="py-3 text-center px-3">아이-이름</th>
            <th scope="col" class="show-cell py-3 text-center px-3">아이-주민번호</th>
            <th scope="col" class="show-cell py-3 text-center px-3">부모-이름<br><span class="text-sm">쿠폰받는 사람</span></th>
            <th scope="col" class="py-3 text-center px-3">부모-전화번호<br><span class="text-sm">쿠폰받는 사람</span></th>
            <th scope="col" class="show-cell py-3 text-center px-3">날짜
              <!-- <a href="/gnuboard5/bbs/board.php?bo_table=coupon&amp;sop=and&amp;sst=wr_datetime&amp;sod=desc&amp;sfl=&amp;stx=&amp;sca=&amp;page=1">날짜 </a> -->
            </th>
            <th scope="col" class="show-cell py-3 text-center px-3">쿠폰상태</th>
            <th scope="col" class="show-cell py-3 text-center px-3"></th>
          </tr>
        </thead>
        <tbody>
      <?php
        for($i=0;$row = sql_fetch_array($result);$i++){
          $num=$total_count - (($page-1) * $page_rows) -$i;
      ?>

            <tr class=" even border-b">

              <!-- 번호 -->
              <td class="py-3 px-3 text-center"><?php echo $num;?></td>

              <!-- 지역 -->
              <td class="show-cell td_name sv_use show-cell px-3 text-center whitespace-nowrap">
                <?php echo $row['cp_inst_region'];?>
              </td>

              <!-- 복지센터 -->
              <td class="show-cell td_name sv_use show-cell px-3 text-center whitespace-nowrap">
                <span class="sv_member"><?php echo $row['cp_inst_name'];?></span>
              </td>

              <!-- 쿠폰번호 -->
              <td class="show-cell td_num px-3 text-center whitespace-nowrap">

              <?php
              if($row['cp_use_state'] != 0){
                echo '<div class="used_coupon line-through">';
              } else{
                echo '<div class="">';
              }
              ?>
                  <?php echo $row['cp_code']; ?>
                  <?php if ($row['cp_use_state'] == 1){
                    echo '<div class="tooltiptext bg-red-400">';
                    echo '<p>쿠폰 사용자 정보</p>';
                    echo '<p>이름 : '.$row['cp_use_name'].'</p>';
                    echo '<p>전화번호 : '.$row['cp_use_tel'].'</p>';
                    echo '<p>사이소 ID : '.$row['cp_use_id'].'</p>';
                    echo '<p>쿠폰등록일 : '.$row['cp_use_date'].'</p>';
                    // echo '<span class="tooltiptext">쿠폰 사용자 : '.$row['cp_use_name'].' '.$row['cp_use_tel'].' '.$row['cp_use_id'].'</span>';
                    echo '</div>';
                  }
                  ?>
                </div>
              </td>

              <!-- 아이-이름 -->
              <td class="td_num px-3 text-center whitespace-nowrap"><?php echo $row['cp_child_name'];?></td>

              <!-- 아이-주민번호 -->
              <td class="show-cell td_num px-3 text-center whitespace-nowrap"><?php echo $row['cp_child_idnum1'].'-*******';?></td>

              <!-- 부모-이름 -->
              <td class="td_num show-cell px-3 text-center whitespace-nowrap"><?php echo $row['cp_parent_name'];?></td>

              <!-- 부모-전화번호 -->
              <td class="td_num px-3 text-center whitespace-nowrap"><?php echo $row['cp_parent_tel'];?></td>

              <!-- 날짜 -->
              <td class="show-cell td_datetime show-cell px-3 text-center align-middle whitespace-nowrap">
                <?php echo substr($row['cp_public_date'], 6, 5);?>
              </td>

              <!-- 상태 -->
              <td class="show-cell td_num show-cell px-3 text-center whitespace-nowrap">
                <?php
                if($row['cp_use_state'] == 0){
                  echo '<div class="resend_tooltip">';
                  echo '<button class="resend_btn" name="'.$row['cp_code'].'">발행</button>';
                  echo '<span class="resend_tooltiptext bg-red-400">재발행시 클릭</span>';
                  echo '</div>';
                }else{
                  echo $cpstateArr[$row['cp_use_state']];
                }
                ?>
              </td>

              <!-- 쿠폰 취소하기 -->
              <td class="td_num px-3 text-center whitespace-nowrap">
                <?php
                if($row['cp_use_state'] == 0){
                echo '<div class="resend_tooltip">';
                echo '<button class="cancle_btn" name="'.$row['cp_code'].'">발급취소</button>';
                echo '<span class="resend_tooltiptext bg-red-400">발행 취소시 클릭</span>';
                echo '</div>';
                } else{
                  echo '';
                }
                ?>
              </td>
            </tr>
      <?php } ?>
            <?php if ($cnt == 0) {
              echo '<tr><td colspan="11" class="empty_table text-center pt-8" style="height:200px;">발행된 쿠폰이 없습니다.</td></tr>';
            }?>
        </tbody>
      </table>
    </div>

    <!-- 페이지 -->
    <div class="mt-6 flex justify-center">
      <?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, '?'.$qstr.'&amp;page=');?>
    </div>
    <!-- 페이지 -->

    <div class="clear-both"></div>

  </div>
  <!-- 게시판 목록 끝 { -->
	<script>

    function excelform(url)
    {
        var opt = "width=600,height=450,left=10,top=10";
        window.open(url, "win_excel", opt);
        return false;
    }

    $('.resend_btn').click(function(){
      if(confirm('재발행 문자를 발송할까요?')){
        let tel = $(this).parents().parents().prev().prev().html();
        let code = $(this).parents().parents().prev().prev().prev().prev().prev().prev().children().html();
        let clean_code = code.replace(/(\r\n|\n|\r)/gm, "").replaceAll(' ', '');

        if(tel.length == 13 && clean_code.length == 19){
          $.ajax({
            type: "POST",
            url: "<?=G5_URL.'/pages'?>/ajax_resend_coupon.php",
            cache: false,
            async: false,
            data: {
              'tel': tel,
              'code': clean_code,
            }
          }).done(function() {
            alert('재전송 하였습니다.');
          }).fail(function() {
            alert('다시 시도해 주세요.');
          });
        } else{
          alert('에러가 발생하였습니다. 위팩토리로 문의하여 주세요.')
        }
      }
    });

    $('.cancle_btn').click(function(){
      let coupon_state = $(this).parents().prev().children().children().first().html();
      let clean_coupon_state = coupon_state.replace(/(\r\n|\n|\r)/gm, "").replaceAll(' ', '');

      if(clean_coupon_state == '취소'){
        alert('이미 취소된 쿠폰입니다.');
      } else if(clean_coupon_state == '사용'){
        alert('사용된 쿠폰은 취소할수 없습니다.');
      } else {
        // 쿠폰 취소 로직 동작
        var delConfirm = confirm('발행된 쿠폰을 취소(삭제)하시겠습니까?');
        if (delConfirm) {
          let code = $(this).parents().prev().prev().prev().prev().prev().prev().prev().children().html();
          let clean_code = code.replace(/(\r\n|\n|\r)/gm, "").replaceAll(' ', '');

          if(clean_code.length == 19){
            $.ajax({
              type: "POST",
              url: "<?=G5_URL.'/pages'?>/ajax_cancle_coupon.php",
              cache: false,
              async: false,
              data: {
                'code': clean_code,
              }
            }).done(function() {
	           location.reload();
              alert('쿠폰을 취소 하였습니다.');
            }).fail(function() {
              alert('다시 시도해 주세요.');
            });
          } else{
            alert('에러가 발생하였습니다. 위팩토리로 문의하여 주세요.')
          }
        }
      }
    });

	</script>
</div>
<?php
include_once(G5_PATH.'/tail.php');
?>