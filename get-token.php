<?php
include "rendygoods.php";
	echo color("white","\e[61m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n");
	echo color("white","\e[61mHallo SgbTeam, Iam @Bananacreamy\n");
	echo color("white","\e[61m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n");
	echo color("white","\e[61mGunakan Awalan 62 Untuk Input Pada Kolom Nomor\n");
	echo color("white","\e[61m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n");
	echo "\n";
$secret = '83415d06-ec4e-11e6-a41b-6c40088ab51e';
$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'X-AppVersion: 3.48.2';
$headers[] = "X-Uniqueid: ac94e5d0e7f3f" . rand(111, 999);
$headers[] = 'X-Location: id_ID';
ulang:
 echo "[+] Masukin Nomor GOJEK Kamu Disini : ";
 $number = trim(fgets(STDIN));
 $login = curl('https://api.gojekapi.com/v3/customers/login_with_phone', '{"phone":"+' . $number . '"}', $headers);
 $logins = json_decode($login[0]);
 if ($logins->success == true) {
     otp:
         echo "[+] Masukin Kode OTP Kamu Disini : ";
         $otp = trim(fgets(STDIN));
         $data1 = '{"scopes":"gojek:customer:transaction gojek:customer:readonly","grant_type":"password","login_token":"' . $logins->data->login_token . '","otp":"' . $otp . '","client_id":"gojek:cons:android","client_secret":"' . $secret . '"}';
         $verif = curl('https://api.gojekapi.com/v3/customers/token', $data1, $headers);
         $verifs = json_decode($verif[0]);
         if ($verifs->success == true) {
             $token = $verifs->data->access_token;
             $headers[] = 'Authorization: Bearer ' . $token;
             $live = "token-akun.txt";
             $fopen1 = fopen($live, "a+");
             $fwrite1 = fwrite($fopen1, "Token Kamu : " . $token . "
Nomor GoJek Kamu : " . $number . "
");
             fclose($fopen1);
             echo "
";
             echo color("green"," Token Kamu : ".$token."\n\n");
";
             echo color("white","Token Berhasil Disimpan Di File ".$live."\n\n");" 
";
             echo "
";
         } else {
             echo "
";
             echo color("red","Yah Kode OTP Salah, Coba Kamu Ulangi Lagi Deh!");
";
             echo "
";
             goto otp;
         }
     } else {
         echo "
";
         echo color("red","Yah Gagal Mengirim Kode OTP, Gunakan Nomor Yang Sudah Terdaftar Di GOJEK Yah!");
";
         echo "
";
         goto ulang;
     }
}
