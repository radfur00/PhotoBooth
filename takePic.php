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
$filename_temp = $config['folders']['temp'] . DIRECTORY_SEPARATOR . $file;

if($config['dev'] === false) {
	$shootimage = shell_exec(
		sprintf(
			$config['take_picture']['cmd'],
            $filename_temp
			)
		);
		if(strpos($shootimage, $config['take_picture']['msg']) === false) {
			die(json_encode(array('error' => true)));
		}
} else {
	$devImg = array('resources/img/bg.jpg');
	copy(
		$devImg[array_rand($devImg)],
        $filename_temp
	);
}
// send imagename to frontend
echo json_encode(array('success' => true, 'img' => $file));