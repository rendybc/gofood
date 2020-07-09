<?php
###Ini Copyright###
###https://github.com/osyduck/Gojek-Register###

include ("rendygans.php");

function nama()
	{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://api.gojek.co.id/gojek/customer/login");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_REFERER, $site);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
        curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
        curl_setopt($ch, CURLOPT_VERBOSE, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "userName=".$username."&password=".$password);
            $data = json_decode(curl_exec($ch),true);
            if($data['customerId']){
                  $jData = $this->history($data['customerId']);
                  print_r($this->jsonData($jData));
	$ex = curl_exec($ch);
	// $rand = json_decode($rnd_get, true);
	preg_match_all('~(&bull; (.*?)<br/>&bull; )~', $ex, $name);
	return $name[2][mt_rand(0, 14) ];
	}
function register($no)
	{
	$nama = nama();
	$email = str_replace(" ", "", $nama) . mt_rand(100, 999);
	$data = '{"name":"' . $nama . '","email":"' . $email . '@gmail.com","phone":"+' . $no . '","signed_up_country":"ID"}';
	$register = request("/v5/customers", "", $data);
	//print_r($register);
	if ($register['success'] == 1)
		{
		return $register['data']['otp_token'];
		}
	  else
		{
      save("error_log.txt", json_encode($register));
		return false;
		}
	}
function verif($otp, $token)
	{
	$data = '{"client_name":"gojek:cons:android","data":{"otp":"' . $otp . '","otp_token":"' . $token . '"},"client_secret":"83415d06-ec4e-11e6-a41b-6c40088ab51e"}';
	$verif = request("/v5/customers/phone/verify", "", $data);
	if ($verif['success'] == 1)
		{
		return $verif['data']['access_token'];
		}
	  else
		{
      save("error_log.txt", json_encode($verif));
		return false;
		}
	}
	function login($no)
	{
	$nama = nama();
	$email = str_replace(" ", "", $nama) . mt_rand(100, 999);
	$data = '{"phone":"+'.$no.'"}';
	$register = request("/v4/customers/login_with_phone", "", $data);
	//print_r($register);
	if ($register['success'] == 1)
		{
		return $register['data']['login_token'];
		}
	  else
		{
      save("error_log.txt", json_encode($register));
		return false;
		}
	}
function veriflogin($otp, $token)
	{
	$data = '{"client_name":"gojek:cons:android","client_secret":"83415d06-ec4e-11e6-a41b-6c40088ab51e","data":{"otp":"'.$otp.'","otp_token":"'.$token.'"},"grant_type":"otp","scopes":"gojek:customer:transaction gojek:customer:readonly"}';
	$verif = request("/v4/customers/login/verify", "", $data);
	if ($verif['success'] == 1)
		{
		return $verif['data']['access_token'];
		}
	  else
		{
      save("error_log.txt", json_encode($verif));
		return false;
		}
	}
function claim($token, $data)
	{
	// $voucher = [
	// 	"1" => 'GOFOODBOBA19',
	// 	"2" => 'GOFOODBOBA10',
	// 	"3" => 'GOFOODBOBA07'
	// ];

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
echo "Choose Login? Register = 1: ";
$type = trim(fgets(STDIN));
if($type == 1){
echo "It's Login Way\n";
echo "Input 62 For ID and 1 For US Phone Number\n";
echo "Enter Number: ";
$nope = trim(fgets(STDIN));
$login = login($nope);
if ($login == false)
	{
	echo "Failed to Get OTP!\n";
	}
  else
	{
	echo "Enter Your OTP: ";
	// echo "Enter Number: ";
	$otp = trim(fgets(STDIN));
	$verif = veriflogin($otp, $login);
	if ($verif == false)
		{
		echo "Failed to Login with Your Number!\n";
		}
	  else
		{
		echo "Ready to Claim GOFOODBOBA19\n";
		$data = '{"promo_code":"GOFOODBOBA19"}';
		$claim = claim($verif, $data);
		if ($claim == false){
			echo "Failed to Claim Voucher GOFOODBOBA19, Coba redeem voucher lain\n";
			echo "Sleep 10 seconds\n";
			sleep(10);
			echo "Ready to Claim GOFOODBOBA10\n";
			$data = '{"promo_code":"GOFOODBOBA10"}';
			$claim2 = claim($verif, $data);
			if($claim2 == false) {
				echo "Failed to claim voucher GOFOODBOBA10";
				echo "Sleep 10 seconds\n";
				sleep(10);
				echo "Ready to Claim GOFOODBOBA07\n";
				$data = '{"promo_code":"GOFOODBOBA07"}';
				$claim3 = claim($verif, $data);
				if($claim3 == false) {
					echo "Failed to claim voucher GOFOODBOBA07";
				}else{
					echo $claim3 . "\n";
				}
			}else{
				echo $claim2 . "\n";
			}
			}else{
			echo $claim . "\n";
			}
		}
	}
}else{
	die("error");
}
