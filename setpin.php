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
	echo color("white","\e[61mGunakan Token Gojek Mu Untuk Set Pin Gopay Mu\n");
	echo color("white","\e[61m▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n");
	echo "\n";
sleep(2);
echo color("white","Token: ");
$token = trim(fgets(STDIN));
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
//  }
