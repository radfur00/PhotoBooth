<?php
require_once('config.inc.php');
require_once('db.php');

$panel_dev = $_POST['customSwitch1'];
$panel_gal = $_POST['customSwitch2'];
$panel_prev = $_POST['customSwitch3'];
$panel_print = $_POST['customSwitch4'];
$panel_logo = $_POST['customSwitch5'];
$panel_qr_code = $_POST['customSwitch6'];
$panel_lang = $_POST['lang'];
$panel_label = $_POST['label'];
$panel_3_pic = $_POST['customSwitch7'];

if ($panel_dev != 'on'){
    $panel_dev = 'false';
}
else{
    $panel_dev = 'true';
}
if ($panel_gal != 'on'){
    $panel_gal = 'false';
}
else{
    $panel_gal = 'true';
}

if ($panel_prev != 'on'){
    $panel_prev = 'false';
}
else{
    $panel_prev = 'true';
}

if ($panel_print != 'on'){
    $panel_print = 'false';
    }
else{
    $panel_print = 'true';
    }

if ($panel_logo != 'on'){
    $panel_logo = 'false';
}
else{
    $panel_logo = 'true';
}

if ($panel_qr_code != 'on') {
    $panel_qr_code = 'false';
    }
else{
    $panel_qr_code = 'true';
    }

if ($panel_3_pic != 'on') {
    $panel_3_pic = 'false';
}
else{
    $panel_3_pic = 'true';
}

// insert into database
$admin_panel_config = [$panel_dev, $panel_gal, $panel_prev, $panel_print, $panel_logo, $panel_qr_code, $panel_lang, $panel_3_pic, $panel_label];
file_put_contents('config.txt', json_encode($admin_panel_config));


header ('Content-Type: image/png');
$im = @imagecreatetruecolor(400, 30)
or die('Cannot Initialize new GD image stream');
$text_color = imagecolorallocate($im, 233, 14, 91);
imagestring($im, 1, 5, 5,  $panel_label, $text_color);
imagejpeg($im, $img_nameb,80);

header('refresh:1; url=/index.php');

?>
