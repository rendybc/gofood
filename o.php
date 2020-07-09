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
//CHECKER DETAIL AKUN
$info = curl('https://api.gojekapi.com/v1/chat/profile', null, $header);
    $verifs = json_decode($info[0]);
         $akun = $verifs->data->name;
         $nope = $verifs->data->phone;
   echo "\n";
   echo color("yellow","nama : ".$akun." \n");
   echo color("yellow","nomer : 0".$nope." \n");
//CHECKER SALDO GOPAY
$detail = curl('https://api.gojekapi.com/wallet/profile/detailed', null, $header);
         $saldoo = json_decode($detail[0]);
                $saldo = $saldoo->data->balance;
                    echo color("yellow","Sisa Saldo Gopay = $saldo \n");
