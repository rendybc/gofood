<?php
include "rendygans.php";
echo color("green","[+] Token GOJEK Kamu Disini : ");
$number = trim(fgets(STDIN));
$secret = 'xxxx-xx-xxx-xxxx-xxxxxx'; //TOKEN AKUN VERIF GOPAY LO
$headers = array();
$header[] = 'Content-Type: application/json';
$header[] = 'X-AppVersion: 3.46.2';
$header[] = "X-UniqueId: ".time()."57".mt_rand(1000,9999);
$header[] = 'X-Location: id_ID';
$header[] ='Authorization: Bearer '.$token;
$header[] = 'pin:'.$pin.'';
// function change(){
function claim($token)
    {
    $data = '{"promo_code":"eatlah"}';    
    $claim = request("/go-promotions/v1/promotions/enrollments", $token, $data);
    if ($claim['success'] == 1)
        {
        return $claim['data']['message'];
        }
      else
        {
      save("error_log.txt", json_encode($claim));
        return false;
        }
    }

?>
