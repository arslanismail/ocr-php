<?php


 require_once "vendor/autoload.php";

 use thiagoalessio\TesseractOCR\TesseractOCR;



 $user_agent     =   $_SERVER['HTTP_USER_AGENT'];

 function getOS() { 
 
     global $user_agent;
 
     $os_platform    =   "Unknown OS Platform";
 
     $os_array       =   array(
                             '/windows nt 10/i'     =>  'Windows',
                             '/windows nt 6.3/i'     =>  'Windows',
                             '/windows nt 6.2/i'     =>  'Windows',
                             '/windows nt 6.1/i'     =>  'Window',
                             '/windows nt 6.0/i'     =>  'Windows',
                             '/windows nt 5.2/i'     =>  'Windows',
                             '/windows nt 5.1/i'     =>  'Windows',
                             '/windows xp/i'         =>  'Windows',
                             '/windows nt 5.0/i'     =>  'Windows',
                             '/windows me/i'         =>  'Windows',
                             '/win98/i'              =>  'Windows',
                             '/win95/i'              =>  'Windows',
                             '/win16/i'              =>  'Windows',
                             '/macintosh|mac os x/i' =>  'Mac',
                             '/mac_powerpc/i'        =>  'Mac',
                             '/linux/i'              =>  'Linux',
                             '/ubuntu/i'             =>  'Ubuntu',
                             '/iphone/i'             =>  'iPhone',
                             '/ipod/i'               =>  'iPod',
                             '/ipad/i'               =>  'iPad',
                             '/android/i'            =>  'Android',
                             '/blackberry/i'         =>  'BlackBerry',
                             '/webos/i'              =>  'Mobile'
                         );
 
     foreach ($os_array as $regex => $value) { 
 
         if (preg_match($regex, $user_agent)) {
             $os_platform    =   $value;
         }
 
     }   
 
     return $os_platform;
 
 }
 
 
 
 $user_os  =   getOS();
 
 
 



 $tesseract = new TesseractOCR('text.png');

 if($user_os=="Windows"){
     $tesseract->executable('C:\Program Files (x86)\Tesseract-OCR\tesseract.exe');
     $tesseract->tessdataDir('C:\Program Files (x86)\Tesseract-OCR\tessdata');
     
     }
     else if($user_os=="Linux"){
       echo "Linux";
     }
     else if($user_os=="Ubuntu"){

      echo " ubuntu";
     }
     else{
       echo $user_os;
     }

  echo $tesseract->run();
//$tesseract->run();



?>