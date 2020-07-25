<?php
include "rendygoods.php";
echo "Script ini dibuat untuk set pin gopay mu apa bila pin gopay mu belum tersetting";
$secret = '83415d06-ec4e-11e6-a41b-6c40088ab51e';
$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'X-AppVersion: 3.48.2';
$headers[] = "X-Uniqueid: ac94e5d0e7f3f" . rand(111, 999);
$headers[] = 'X-Location: id_ID';
ulang:
 echo "[+] Masukin Nomor GOJEK Kamu Disini : 62";
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
         sleep(5);
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
         }else if($pilih1 == "n" || $pilih1 == "N"){
         die();
         }else{
         echo color("red","-] GAGAL!!!\n");
         }
         }
         }else{
         echo color("red","-] Kode Otp mu salah..");
         echo"\n▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n\n";
         echo color("yellow","!] Input kembali kode otp mu..\n");
         echo"\n▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n\n";
         goto otp;
         }
         echo color("red","-] Nomor salah / Error by System..");
         echo"\n▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n\n";
         echo color("yellow","!] Masukan kembali mu dengan awalan 62 \n");
         echo"\n▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n\n";
         goto ulang;
//  }
