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
        file_put_contents("token/".$verif['data']['customer']['name'].".txt", $verif['data']['access_token']);
        echo "\e[93m[X] Mencoba Redeem : PAKEGOFOOD\n";
        sleep(3);
        $claim = claim($verif);
        if ($claim == false)
            {
            echo "\e[92m[!]".$voucher."\n";
            sleep(3);
            }
            else{
                echo "\e[92m[X] ".$claim."\n";
                sleep(3);
            }
    }
    }


?>
