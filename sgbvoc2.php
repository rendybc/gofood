<?php
date_default_timezone_set('Asia/Jakarta');
include "rendytampans.php";
echo color("purple","                                                                       ...........                  
                                                         .......'',,;;::ccclllllcc:,..              
                                          .......''',,;;::cccllllllllllllllllllllllllc,.            
                            ......''',,;;::ccclllllllllllllllllllllllllllllllllllllllllc'.          
                 ...'',,,;;::ccclllllllllllllllllllllllllllllllllllllllllllllllllllllllll,.         
              ..,:cllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllc'         
            .':llllllllllllllllllllllllllllllllllllllllllllllllllllllllcc:::;:llllllllllll;.        
           .;llllllllllllllllllllllllllllllllllllllllllllllllll:,,''.......  .,cllllllllll;.        
          .;llllllllllllllllllllllllllllllllc:;;;,,,''...,cllll'              .:llllllllll;.        
          ,lllllllllllllllllcc::;;;;:lllll:'.             'cllc'    .......   .:llllllllll;.        
         .;lllllllllllc;'......     .;lllc'         .     .cllc'   .,clll:.   .:llllllllll;.        
         .:llllllllllc'.             ,lllc.   .';;;;:,.   'clll'   .;llll:.   .:llllllllll;.        
         .:llllllllll:.   ....''.    ,lllc.   .:lllllc,',,:llll'   .;llllc.   .:llllllllll;.        
         .:llllllllll:.   .:llll;....;lllc.   .:lllllllllllllll'   .;llll:.   .:llllllllll;.        
         .:llllllllll:.   .;llllcccclllllc.   .:lllllllllllllll'   .';;,,'.  .,lllllllllll;.        
         .:llllllllll:.    .'clllllllllllc.   .:lllcc:::;;:llll'             .:lllllllllll;.        
         .:llllllllllc'.     .;clllllllllc.   .:l:;'...   'clll'              .cllllllllll;.        
         .:lllllllllllc;.     ..:llllllllc.   .:l:'.      .clll'    .,,;;,.   .:llllllllll;.        
         .:lllllllllllllc,.     .':llllllc.   .:lc;'.     .clll'   .;llll:.   .:llllllllll;.        
         .:lllllllllllllll:'.     .,cllllc.   .:llll;.    .clll'   .;llll:.   .:llllllllll;.        
         .:llllllllllllllllc;.      .:lllc.   .:llll;.    .clll'   .;llllc.   .:llllllllll;.        
         .:llllllllllllllllllc,.     ,lllc.   .:llll;.    .clll'   .';;;,'.   .:llllllllll;.        
         .:llllllllllllllllllll:.    ,lllc.   .:lllc,.    .clll'              .cllllllllll;.        
         .:llllllllllc,'..,cllll,.   ,lllc.   .......     .clll'           ..':lllllllllll;.        
         .:llllllllll:.   .,;,,'.    ,lllc.              .;llll,...'',,;;;::cllllllllllllc'         
         .;llllllllll:.             .;llll;..........'',;clllllllllllllllllllllllllllllll;.         
         .;llllllllllc.        .....;llllllc:::ccllllllllllllllllllllllllllllllllllllllc,.          
         .;lllllllllllc,'',,;;::ccclllllllllllllllllllllllllllllllllllllllllllllllllll:..           
         .,lllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllll:'.             
          .:llllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllll:'.               
           .:lllllllllllllllllllllllllllllllllllllllllllllllccc::;;cllllllllllll:,.                 
            .'cllllllllllllllllllllllllllllllccc::;;;,,'''......  .;llllllllll:,.                   
              .';:lllllllllllllccc::;;,,''.......                 .:llllllll:'.                     
                 ..'',,,,,''.......                               .;llllll:'.                       
                                                                  .:llll:'.                         
                                                                  .:lc;..                           
                                                                  .,;..                             
                                                                   .                                
                                                                                                     ");
echo color("nevy","Token mu taro sini a: ");
$token = trim(fgets(STDIN));
        echo color("purple","\n▬▬▬▬▬▬▬▬▬▬▬▬🔊AUTO CLAIM KAYANYA CUK🔊▬▬▬▬▬▬▬▬▬▬▬▬");
        echo "\n".color("nevy"," 🥂CLAIM VOC A🥂.");
        echo "\n".color("purple","⏳▶️ Please wait");
        for($a=1;$a<=3;$a++){
        echo color("nevy",".");
        sleep(20);
        }
        $code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"PESANGOFOOD0607"}');
        $message = fetch_value($code1,'"message":"','"');
        if(strpos($code1, 'Promo kamu sudah bisa dipakai')){
        echo "\n".color("purple","Message: ".$message);
        }else{
        echo "\n".color("purple"," Message: ".$message);
        sleep(1);
        $cekvoucher = request('/gopoints/v3/wallet/vouchers?limit=13&page=1', $token);
        $total = fetch_value($cekvoucher,'"total_vouchers":',',');
        $voucher1 = getStr1('"title":"','",',$cekvoucher,"1");
        $voucher2 = getStr1('"title":"','",',$cekvoucher,"2");
        $voucher3 = getStr1('"title":"','",',$cekvoucher,"3");
        $voucher4 = getStr1('"title":"','",',$cekvoucher,"4");
        $voucher5 = getStr1('"title":"','",',$cekvoucher,"5");
        $voucher6 = getStr1('"title":"','",',$cekvoucher,"6");
        $voucher7 = getStr1('"title":"','",',$cekvoucher,"7");
        $voucher8 = getStr1('"title":"','",',$cekvoucher,"8");
        $voucher9 = getStr1('"title":"','",',$cekvoucher,"9");
        $voucher10 = getStr1('"title":"','",',$cekvoucher,"10");
        $voucher11 = getStr1('"title":"','",',$cekvoucher,"11");
        $voucher12 = getStr1('"title":"','",',$cekvoucher,"12");
        $voucher13 = getStr1('"title":"','",',$cekvoucher,"13");
        echo "\n".color("purple"," Total voucher ".$total." : ");
        echo "\n".color("nevy","                     1. ".$voucher1);
        echo "\n".color("purple","                     2. ".$voucher2);
        echo "\n".color("nevy","                     3. ".$voucher3);
        echo "\n".color("purple","                     4. ".$voucher4);
        echo "\n".color("nevy","                     5. ".$voucher5);
        echo "\n".color("purple","                     6. ".$voucher6);
        echo "\n".color("nevy","                     7. ".$voucher7);
        echo "\n".color("purple","                     8. ".$voucher8);
        echo "\n".color("nevy","                     9. ".$voucher9);
        echo "\n".color("purple","                     10. ".$voucher10);
	echo "\n".color("nevy","                     11. ".$voucher11);
        echo "\n".color("purple","                     12. ".$voucher12);
        echo "\n".color("purple","                     13. ".$voucher13);
        echo"\n";
         }
//  }
