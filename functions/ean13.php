<?php 

$kod=array 
    (	// штрих-код цифр (3 исполнения) 
        "0" => array("a"=>"0001101","b"=>"0100111","c"=>"1110010"), 
        "1" => array("a"=>"0011001","b"=>"0110011","c"=>"1100110"), 
        "2" => array("a"=>"0010011","b"=>"0011011","c"=>"1101100"), 
        "3" => array("a"=>"0111101","b"=>"0100001","c"=>"1000010"), 
        "4" => array("a"=>"0100011","b"=>"0011101","c"=>"1011100"), 
        "5" => array("a"=>"0110001","b"=>"0111001","c"=>"1001110"), 
        "6" => array("a"=>"0101111","b"=>"0000101","c"=>"1010000"), 
        "7" => array("a"=>"0111011","b"=>"0010001","c"=>"1000100"), 
        "8" => array("a"=>"0110111","b"=>"0001001","c"=>"1001000"), 
        "9" => array("a"=>"0001011","b"=>"0010111","c"=>"1110100") 
    ); 
$isp=array 
    (	// исполнение левой части кода в зависимости от первой цифры 
        "0" => array("2"=>"a","3"=>"a","4"=>"a","5"=>"a","6"=>"a","7"=>"a"), 
        "1" => array("2"=>"a","3"=>"a","4"=>"b","5"=>"a","6"=>"b","7"=>"b"), 
        "2" => array("2"=>"a","3"=>"a","4"=>"b","5"=>"b","6"=>"a","7"=>"b"), 
        "3" => array("2"=>"a","3"=>"a","4"=>"b","5"=>"b","6"=>"b","7"=>"a"), 
        "4" => array("2"=>"a","3"=>"b","4"=>"a","5"=>"a","6"=>"b","7"=>"b"), 
        "5" => array("2"=>"a","3"=>"b","4"=>"b","5"=>"a","6"=>"a","7"=>"b"), 
        "6" => array("2"=>"a","3"=>"b","4"=>"b","5"=>"b","6"=>"a","7"=>"a"), 
        "7" => array("2"=>"a","3"=>"b","4"=>"a","5"=>"b","6"=>"a","7"=>"b"), 
        "8" => array("2"=>"a","3"=>"b","4"=>"a","5"=>"b","6"=>"b","7"=>"a"), 
        "9" => array("2"=>"a","3"=>"b","4"=>"b","5"=>"a","6"=>"b","7"=>"a") 
    ); 

// Здесь все понятно, не так ли? Теперь пишем функцию для контрольной суммы: 

function get_control_digit($nomer) 
    {	// расчет контрольной суммы 
        $j=0;$chet=0; 
    for ($i=1;$i<12;$i=$i+2) {$j++;$chet=$chet+substr($nomer,$i,1);}; 
    $j=0;$nechet=0; 
    for ($i=0;$i<12;$i=$i+2) {$j++;$nechet=$nechet+substr($nomer,$i,1);}; 
    $total=$chet*3+$nechet; 
    $contr_digit=10-substr($total,strlen($total)-1,1); 
    if ($contr_digit==10) $contr_digit=0; 
        return $contr_digit; 
       }; 

// Теперь задаем двенадцать цифр кода (первая цифра определяет исполнение): 

$nomer="481027900007"; 
$nomer.=get_control_digit($nomer);	// добавка контрольной суммы 
$first=substr($nomer,0,1); 

// Определимся с будущим изображением: 

$height=75; // высота поля 
$wight=105; // ширина поля 
$im=imagecreate($wight,$height); // создание изображения 
$p=imagecolorallocate($im,255,255,255);	// цвет поля 
$s=imagecolorallocate($im,0,0,0); // цвет символов (штрихов и букв) 
imagefill($im,0,0,$p);	// окраска поля 
$isp_=""; 
for ($j=2;$j<8;$j++) $isp_.=$isp[$first][$j];	// "исполнение" цифр в первой шестерке (слева) 

// Теперь формируем сам код: 

imagefilledrectangle($im,6,0,6,$height-5,$s); 
imagefilledrectangle($im,8,0,8,$height-5,$s); 
for ($i=1;$i<strlen($nomer)-6;$i++) 
    { 
        $curr=substr($nomer,$i,1); 
        $is=substr($isp_,$i-1,1); 
        $curr_code=$kod["$curr"]["$is"]; 
        $nach=9+7*($i-1); 
        for ($j=1;$j<8;$j++) {if (substr($curr_code,$j-1,1)=="1") 
imagefilledrectangle($im,$nach+($j-1),0,$nach+($j-1),$height-10,$s);}; 
        imagestring($im,2,$nach+1,64,$curr,$s); 
        }; 
imagefilledrectangle($im,52,0,52,$height-5,$s); 
imagefilledrectangle($im,54,0,54,$height-5,$s); 
for ($i=7;$i<strlen($nomer);$i++) 
    { 
        $curr=substr($nomer,$i,1); 
        $curr_code=$kod["$curr"]["c"]; 
        $nach=14+7*($i-1); 
        for ($j=1;$j<8;$j++) {if (substr($curr_code,$j-1,1)=="1") 
imagefilledrectangle($im,$nach+($j-1),0,$nach+($j-1),$height-10,$s);}; 
        imagestring($im,2,$nach+1,64,$curr,$s); 
        }; 
imagefilledrectangle($im,98,0,98,$height-5,$s); 
imagefilledrectangle($im,100,0,100,$height-5,$s); 
imagestring($im,2,0,64,$first,$s); 

// Выводим полученный код: 

header ('Content type:image/png'); 
imagepng($im);	// на экран 
imagepng($im,"code.png"); // в файл 

// И убираем за собой: 

imagedestroy($im); 
?> 