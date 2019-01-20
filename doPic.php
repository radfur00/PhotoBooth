<?php

require_once('db.php');
require_once('config.inc.php');

$file = md5(time()).'.jpg';

switch($config['file_format']){
	case 'date':
		$file = date('Ymd_His').'.jpg';
		break;
	default:
		$file = md5(time()).'.jpg';
		break;
 }

$filename_photo = $config['folders']['images'] . DIRECTORY_SEPARATOR . $file;
$filename_thumb = $config['folders']['thumbs'] . DIRECTORY_SEPARATOR . $file;
$filename_temp = $config['folders']['temp'] . DIRECTORY_SEPARATOR . $file;


//pobranie zdjęć
$directory='temp';
$dir=opendir($directory);

$img_name1 = null;
$img_name2 = null;
$img_name3 = null;
while($jpg_name=readdir($dir))
{
    if(($jpg_name!='.')&&($jpg_name!='..'))
    {
        $img = 'temp/'.$jpg_name;
        //test
        if($img_name2) {
            $img_name3 = $img;
        } else if($img_name1) {
            $img_name2 = $img;
        } else {
            $img_name1 = $img;
        }
    }
}
closedir($dir);

//skalowanie i łączenie zdjęć
$img1 = imagecreatefromjpeg($img_name1);  // zdjecie 1
$img2 = imagecreatefromjpeg($img_name2);  // zdjęcie 2
$img3 = imagecreatefromjpeg($img_name3);  // zdjęcie 3
$imgb = imagecreatefromjpeg($img_nameb);  // baner

$w_img1  = imagesx($img1);  // szerokość zdj 1
$h_img1 = imagesy($img1);  //  wysokośc zdj 1

$w_img2  = imagesx($img2); // szerkość zdj 2
$h_img2 = imagesy($img2);  // wysokość zdj 2

$w_img3  = imagesx($img3);  // szerokość zdj 3
$h_img3 = imagesy($img3);  //  wysokośc zdj 3

$w_imgb  = imagesx($imgb);  // szerokość zdj 3
$h_imgb = imagesy($imgb);  //  wysokośc zdj 3

$h_mini = 320;  // stąła wysokość 320px po zmniejszeniu
$w_mini = $w_img1 * ($h_mini / $h_img1); // stala szerokosc, liczona wzgledem wysokosci
$h_baner = 30;  // stąła wysokość banera 30px po zmniejszeniu
$w_baner = $w_imgb * ($h_baner / $h_imgb); // stala szerokosc, liczona wzgledem wysokosci
$hw_margin = 20;

$final_img = imagecreatetruecolor($w_mini+2*$hw_margin, 3*$h_mini+$h_baner+5*$hw_margin);
// wklej zdjecia
imagecopyresampled($final_img, $img1, $hw_margin, $hw_margin, 0, 0, $w_mini, $h_mini, $w_img1, $h_img1);
imagecopyresampled($final_img, $img2, $hw_margin, $hw_margin+1*($hw_margin+$h_mini), 0, 0, $w_mini, $h_mini, $w_img2, $h_img2);
imagecopyresampled($final_img, $img3, $hw_margin, $hw_margin+2*($hw_margin+$h_mini), 0, 0, $w_mini, $h_mini, $w_img3, $h_img3);
// wklej hulka!!!
imagecopyresampled($final_img, $imgb, $hw_margin, $hw_margin+3*($hw_margin+$h_mini), 0, 0, $w_mini, $h_baner, $w_imgb, $h_imgb);
imagejpeg($final_img,"images/final.jpg",80);

imagedestroy($img1);
imagedestroy($img2);
imagedestroy($img3);
imagedestroy($imgb);
imagedestroy($final_img);
//usuwanie
unlink($img_name1);
unlink($img_name2);
unlink($img_name3);

echo json_encode(array('success' => true, 'img' => 'final.jpg'));

// image scale
list($width, $height) = getimagesize('images/final.jpg');
$newwidth = 200;
$newheight = $width * (1 / $width * 300);
$source = imagecreatefromjpeg('images/final.jpg');
$thumb = imagecreatetruecolor($newwidth, $newheight);
imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
imagejpeg($thumb, 'thumbs/final.jpg');




