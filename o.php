<?php
date_default_timezone_set('Asia/Jakarta');
include "rendygans.php";
echo color("purple","# # # # # # # # # # # # # # # # # # # # # # # \n");
echo color("nevy","  [♥]  Time  : ".date('[d-m-Y] [H:i:s]')."   \n");
echo color("nevy","   [♡] TOLONG DIBACA DULU SEBELUM MENGGUNAKAN SC \n");
echo color("nevy","[♥] KETIK NOMORNYA BEGINI YA 62xxxxxxxxxx \n");
echo color("nevy","  [♡] JANGAN LUPA FOLLOW IG GUE YA : @Bananacreamy \n");
echo color("nevy","[♥] KALO GA NGAMBIL OTOMATIS GAGAL BERARTI \n");
echo color("nevy"," [♡] MAKLUM LAH NAMANYA JUGA SC GRATISAN \n");
echo color("nevy"," [♥] SCRIPT INI GRATIS, BILA ADA YG JUAL CHAT TELEGRAM \n");
echo color("purple","# # # # # # # # # # # # # # # # # # # # # # # \n");
	echo "\n";
	echo color("purple","\e[61m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n");
	echo color("purple","\e[61m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n");
	echo color("nevy","\e[61mInput Nama Mu Disini ?: ");
	$input = trim(fgets(STDIN));
	echo color("purple","\e[61m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n");
		goto ulang;

	return rtrim( $input, "\n" );
ulang:
echo "\n";
echo color("nevy","\e[61m             (Hallo Mas $input Semoga Dapet Voc'a ya)               \n");
echo color("purple","\e[61m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n");
// function change(){
        $nama = nama();
        $email = str_replace(" ", "", $nama) . mt_rand(100, 999);
        echo color("green","[+] Token GOJEK Kamu Disini : ");
$token = trim(fgets(STDIN));
$secret = ''.$token.'';
$header = array();
$header[] = 'Content-Type: application/json';
$header[] = 'X-AppVersion: 3.46.2';
$header[] = "X-UniqueId: ".time()."57".mt_rand(1000,9999);
$header[] = 'X-Location: id_ID';
$header[] ='Authorization: Bearer '.$token;
$header[] = 'pin:'.$pin.'';
        echo color("purple","\n▬▬▬▬▬▬▬▬▬▬▬▬🔊AUTO CLAIM KAYANYA CUK🔊▬▬▬▬▬▬▬▬▬▬▬▬");
        echo "\n".color("nevy"," 🥂CLAIM VOC A🥂.");
        echo "\n".color("purple","⏳▶️ Please wait");
        for($a=1;$a<=3;$a++){
        echo color("nevy",".");
        sleep(3);
        }
        $code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"PESANGOFOOD2206"}');
        $message = fetch_value($code1,'"message":"','"');
        if(strpos($code1, 'Promo kamu sudah bisa dipakai')){
        echo "\n".color("purple","Message: ".$message);
        sleep(3);
        }
        sleep(3);
        $boba09 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"PESANGOFOOD2206"}');
        $messageboba09 = fetch_value($boba09,'"message":"','"');
        echo "\n".color("purple"," Message: ".$messageboba09);
        sleep(3);
        $cekvoucher = request('/gopoints/v3/wallet/vouchers?limit=13&page=1', $token);
        $total = fetch_value($cekvoucher,'"total_vouchers":',',');
        $voucher1 = getStr1('"title":"','",',$cekvoucher,"1");
        $voucher2 = getStr1('"title":"','",',$cekvoucher,"2");
        echo "\n".color("purple"," Total voucher ".$total." : ");
        echo "\n".color("nevy","                     1. ".$voucher1);
        echo "\n".color("purple","                     2. ".$voucher2);
//  }

// echo change()."\n";
