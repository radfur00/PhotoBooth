<?php
// get data from temp.txt
if(!file_exists('config.txt')){
    file_put_contents('config.txt', json_encode(array()));
}

//odczyt pliku config.txt
$admin_panel_config = json_decode(file_get_contents('config.txt'));


if($admin_panel_config[0] == 'true')
    {
    $config['dev'] = true;
    }
    else{
    $config['dev'] = false;
}

if($admin_panel_config[1] == 'true')
{
    $config['gallery'] = true;
}
else{
    $config['gallery'] = false;
}

if($admin_panel_config[2] == 'true')
{
    $config['preview'] = true;
    $config['preview2'] = false;
}
else{
    $config['preview'] = false;
    $config['preview2'] = true;
}

if($admin_panel_config[3] == 'true')
{
    $config['use_print'] = true;
}
else{
    $config['use_print'] = false;

}if($admin_panel_config[4] == 'true')
{
    $config['show_fork'] = true;
}
else{
    $config['show_fork'] = false;
}
if($admin_panel_config[5] == 'true')
{
    $config['use_qr'] = true;
}
else{
    $config['use_qr'] = false;
}
if($admin_panel_config[7] == 'true')
{
    $config['pic'] = "3_core";
}
else{
    $config['pic'] = "1_core";
}

//$config = array();
$config['os'] = (DIRECTORY_SEPARATOR == '\\') || (strtolower(substr(PHP_OS, 0, 3)) === 'linux') ? 'windows' : 'linux';
#$config['file_format'] = 'date'; // comment in to get dateformat images

// LANGUAGE
// possible values: pl, en, de, fr
$config['language'] = $admin_panel_config[6];

//lokalizacja baner
$baner = 'testowy baner';
$img_nameb = 'images/banner.jpg';
// FOLDERS
// change the folders to whatever you like
$config['folders']['images'] = 'images';
$config['folders']['thumbs'] = 'thumbs';
$config['folders']['temp'] = 'temp';
$config['folders']['qrcodes'] = 'qrcodes';
$config['folders']['print'] = 'print';

// GALLERY
// should the gallery list the newest pictures first?
$config['gallery']['newest_first'] = true;

// COMMANDS and MESSAGES
switch($config['os']) {
	case 'windows':
	$config['take_picture']['cmd'] = 'digicamcontrol\CameraControlCmd.exe /capture /filename %s';
	$config['take_picture']['msg'] = 'Photo transfer done.';
	$config['print']['cmd'] = 'mspaint /pt "%s"';
	$config['print']['msg'] = 'Wydrukowano';
	break;
	case 'linux':
	default:
	$config['take_picture']['cmd'] = 'sudo gphoto2 --capture-image-and-download --filename=%s images';
	$config['take_picture']['msg'] = 'New file is in location';
	/* $config['print']['cmd'] = 'sudo lp -o landscape fit-to-page %s';*/
	$config['print']['cmd'] = 'lp -o fit-to-page -d pi-printer %s';
	$config['print']['msg'] = 'pobrano zdjęcie';
	break;
}

// DON'T MODIFY
// preparation
foreach($config['folders'] as $directory) {
	if(!is_dir($directory)){
		mkdir($directory, 0777);
	}
}
//pobranie ip
//function getIP(){
//	static $ip;
//	if(!$ip){
//    if(iddet($_SERVER['HTTP_CLIENT_IP']}}
$ip = $_SERVER['SERVER_NAME'];

//PORT LIVEPREVIEW
$port = 8082;             

?>