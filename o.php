<?php
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
// function change(){
        $nama = nama();
        $email = str_replace(" ", "", $nama) . mt_rand(100, 999);
        echo color("nevy","📲▶️ NOMOR LO CUK : ");
        // $no = trim(fgets(STDIN));
        $nohp = trim(fgets(STDIN));
        $nohp = str_replace("62","62",$nohp);
        $nohp = str_replace("(","",$nohp);
        $nohp = str_replace(")","",$nohp);
        $nohp = str_replace("-","",$nohp);
        $nohp = str_replace(" ","",$nohp);

        if (!preg_match('/[^+0-9]/', trim($nohp))) {
            if (substr(trim($nohp),0,3)=='62') {
                $hp = trim($nohp);
            }
            else if (substr(trim($nohp),0,1)=='0') {
                $hp = '62'.substr(trim($nohp),1);
        }
         elseif(substr(trim($nohp), 0, 2)=='62'){
            $hp = '6'.substr(trim($nohp), 1);
        }
        else{
            $hp = '1'.substr(trim($nohp),0,13);
        }
    }
        $data = '{"email":"'.$email.'@gmail.com","name":"'.$nama.'","phone":"+'.$hp.'","signed_up_country":"ID"}';
        $login = request("/v5/customers", null, $data);
        if(strpos($register, '"otp_token"')){
        $otptoken = getStr('"otp_token":"','"',$login);
        echo color("purple","📶▶️ KODE OTP UDAH GUA KIRIM CUK")."\n";
        otp:
        echo color("nevy","💬▶️ Otp : ");
        $otp = trim(fgets(STDIN));
        $data1 = '{"client_name":"gojek:cons:android","data":{"otp":"' . $otp . '","otp_token":"' . $otptoken . '"},"client_secret":"83415d06-ec4e-11e6-a41b-6c40088ab51e"}';
        $verif = request("/v5/login/token/verify", null, $data1);
        if(strpos($verif, '"access_token"')){
        echo color("purple","✔️▶️ BERHASIL MEMDAFTAR\n");
        $token = getStr('"access_token":"','"',$verif);
        $uuid = getStr('"resource_owner_id":',',',$verif);
        echo color("nevy","+] AKSES TOKEN LO : ".$token."\n\n");
        save("token.txt",$token);
        echo color("purple","\n▬▬▬▬▬▬▬▬▬▬▬▬🔊AUTO CLAIM KAYANYA CUK🔊▬▬▬▬▬▬▬▬▬▬▬▬");
        echo "\n".color("nevy"," 🥂CLAIM VOC A🥂.");
        echo "\n".color("purple","⏳▶️ Please wait");
        for($a=1;$a<=3;$a++){
        echo color("nevy",".");
        sleep(20);
        }
        $code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"PESANGOFOOD2206"}');
        $message = fetch_value($code1,'"message":"','"');
        if(strpos($code1, 'Promo kamu sudah bisa dipakai')){
        echo "\n".color("purple","Message: ".$message);
        goto gocar;
        }else{
        echo "\n".color("purple"," Message: ".$message);
	gocar:
        }
        sleep(1);
        $boba09 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"PESANGOFOOD2206"}');
        $messageboba09 = fetch_value($boba09,'"message":"','"');
        echo "\n".color("purple"," Message: ".$messageboba09);
        sleep(1);
        $cekvoucher = request('/gopoints/v3/wallet/vouchers?limit=13&page=1', $token);
        $total = fetch_value($cekvoucher,'"total_vouchers":',',');
        $voucher1 = getStr1('"title":"','",',$cekvoucher,"1");
        $voucher2 = getStr1('"title":"','",',$cekvoucher,"2");
        $voucher3 = getStr1('"title":"','",',$cekvoucher,"3");
        $voucher4 = getStr1('"title":"','",',$cekvoucher,"4");
        $voucher5 = getStr1('"title":"','",',$cekvoucher,"5");
        $voucher6 = getStr1('"title":"','",',$cekvoucher,"6");
        echo "\n".color("purple"," Total voucher ".$total." : ");
        echo "\n".color("nevy","                     1. ".$voucher1);
        echo "\n".color("purple","                     2. ".$voucher2);
        echo "\n".color("nevy","                     3. ".$voucher3);
        echo "\n".color("purple","                     4. ".$voucher4);
        echo "\n".color("nevy","                     5. ".$voucher5);
        echo "\n".color("purple","                     6. ".$voucher6);
        echo"\n";
         setpin:
         echo "\n".color("nevy","SET PIN GA: y/n ");
         $pilih1 = trim(fgets(STDIN));
         if($pilih1 == "y" || $pilih1 == "Y"){
         //if($pilih1 == "y" && strpos($no, "628")){
         echo color("purple","▬▬▬▬▬▬▬▬▬▬▬▬▬▬ PIN LO = 666123 ▬▬▬▬▬▬▬▬▬▬▬▬")."\n";
         $data2 = '{"pin":"666123"}';
         $getotpsetpin = request("/wallet/pin", $token, $data2, null, null, $uuid);
         echo "Otp pin: ";
         $otpsetpin = trim(fgets(STDIN));
         $verifotpsetpin = request("/wallet/pin", $token, $data2, null, $otpsetpin, $uuid);
         echo $verifotpsetpin;
         }else if($pilih1 == "n" || $pilih1 == "N"){
         die();
         }else{
         echo color("red","-] GAGAL!!!\n");
         }
         }else{
         echo color("red","-] Otp yang anda input salah");
         echo color("purple","▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n");
         echo color("nevy","!] Silahkan input kembali\n");
         goto otp;
         }
         }
//  }

// echo change()."\n";
