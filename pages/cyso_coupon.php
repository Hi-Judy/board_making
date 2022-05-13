<?php

//yjmarket에 특정월에 가입한 회원찾기
$sql = "select mb_id
        from {$g5['member_table'] }
        where store_id = 'yjmarket'
        and SUBSTR(mb_open_date, 1,7) IN 
            (select SUBSTR(mb_open_date, 1,7) mb_month from g5_member where SUBSTR(mb_open_date, 1,7) = '2022-01')"
$mb_id = sql_fetch($sql);


//쿠폰 아이디_ 난수 생성 함수
$cp_id = get_coupon_id();


//쿠폰 생성하는 flag 변수
$issue_coupon = false;


//쿠폰 아이디 유일값 갯수 
$sql2 = "select count(*) as coupon_cnt from {$g5['g5_shop_coupon_table']} where cp_id = '$cp_id' ";
$result2 = sql_fetch($sql2);

//발행된 쿠폰이 없다면
if(!$reslut2['coupon_cnt']){
    $issue_coupon = true;
}

//쿠폰 발행하기
if($issue_coupon){
    $cp_subject = '가입축하쿠폰';
    $cp_method = '2';
    $cp_start = '2022-01-01';
    $cp_end = '2022-03-31';
    $cp_price = 4500;
    $cp_type = 0;
    $cp_trunc = 1;
    $cp_minimum = 21000;
    $cp_maximum = 0; 
    $od_id = 0;
    $cp_datetime = '2022-01-01';

    //신규회원쿠폰 데이터 불러오기
    $sql3 =  "select * from {$g5['g5_shop_coupon_table']} where cp_subject = $cp_subject";
    $result3 = sql_fetch($sql3);

    //신규발행된 쿠폰이 없을 때
    if(!$result3[$result'cp_id'] == ''){
        //yjmarket에 특정월에 가입한 회원에게 쿠폰 발행
        $sql4 = "insert into {$g5['g5_shop_coupon_table']}
                    (cp_subject,
                    cp_method,
                    mb_id,
                    cp_start,
                    cp_end,
                    cp_price,
                    cp_type,
                    cp_trunc,
                    cp_minimum ,
                    cp_maximum ,
                    od_id,
                    cp_datetime )
                values
                    ($cp_subject,
                    $cp_method,
                    $mb_id,
                    $cp_start,
                    $cp_end,
                    $cp_price,
                    $cp_type,
                    $cp_trunc,
                    $cp_minimum,
                    $cp_maximum,
                    $od_id,
                    $cp_datetime
                    ) "

        $reseult4 = sql_fetch($sql4);


    }



}




?>