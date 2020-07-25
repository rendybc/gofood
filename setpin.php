<?php
include "rendygoods.php";
	echo color("white","\e[61m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n");
	echo "\n";
echo color("white","░█▀▀█ ─█▀▀█ ░█▄─░█ ─█▀▀█ ░█▄─░█ ─█▀▀█ 
░█▀▀▄ ░█▄▄█ ░█░█░█ ░█▄▄█ ░█░█░█ ░█▄▄█ 
░█▄▄█ ░█─░█ ░█──▀█ ░█─░█ ░█──▀█ ░█─░█ 

░█▀▀█ ░█▀▀█ ░█▀▀▀ ─█▀▀█ ░█▀▄▀█ ░█──░█ 
░█─── ░█▄▄▀ ░█▀▀▀ ░█▄▄█ ░█░█░█ ░█▄▄▄█ 
░█▄▄█ ░█─░█ ░█▄▄▄ ░█─░█ ░█──░█ ──░█──");
	echo "\n";
	echo color("white","\e[61m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n");
	echo color("white","\e[61mHallo SgbTeam, Iam @Bananacreamy\n");
	echo color("white","\e[61m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n");
	echo color("white","\e[61mGunakan Awalan 62 Untuk Input Pada Kolom Nomor\n");
	echo color("white","\e[61mSehabis input nomor lalu tidak ada respon apapun, berarti nomor belum terdaftar\n");
	echo color("white","\e[61mOtp tidak masuk? Ada kesalahan pada nomor mu\n");
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
         sleep(3);
         setpin:
         echo "\n".color("white","SET PIN Gopay mu: y/n ");
         $pilih1 = trim(fgets(STDIN));
         if($pilih1 == "y" || $pilih1 == "Y"){
         //if($pilih1 == "y" && strpos($no, "628")){
         echo color("white","▬▬▬▬▬▬▬▬▬▬▬▬▬▬ Pin Gopay Mu = 666123 ▬▬▬▬▬▬▬▬▬▬▬▬")."\n";
         $data2 = '{"pin":"666123"}';
         $getotpsetpin = request("/wallet/pin", $token, $data2, null, null, $uuid);
         echo "Otp pin: ";
         $otpsetpin = trim(fgets(STDIN));
         $verifotpsetpin = request("/wallet/pin", $token, $data2, null, $otpsetpin, $uuid);
         echo $verifotpsetpin;
         echo color("green","-] Proses Telah Selesai [-\n");
	 echo "\n";
         }
         }
}
//  }
