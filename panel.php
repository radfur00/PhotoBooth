<?php
require_once('config.inc.php');
require_once('db.php');
?>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
    <title>Photobooth - panel</title>


    <!-- Favicon + Android/iPhone Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="/resources/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/resources/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/resources/img/favicon-16x16.png">
    <link rel="manifest" href="/resources/img/site.webmanifest">
    <link rel="mask-icon" href="/resources/img/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <meta http-equiv="Pragma" content="no-cache">
    <link rel="stylesheet" href="/resources/css/normalize.css" />
    <link rel="stylesheet" href="/resources/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/resources/css/photoswipe.css">
    <link rel="stylesheet" href="/resources/css/default-skin/default-skin.css">
    <link rel="stylesheet" href="/resources/css/bootstrap.min.css"
    <link rel="stylesheet" href="/resources/css/style.css" />
    <script type="text/javascript">
        var isdev = true;
        var gallery_newest_first = <?php echo ($config['gallery']['newest_first']) ? 'true' : 'false'; ?>;
    </script>
</head>
<body class="deselect">
<div id="wrapper">
    <?php if($config['show_fork']){ ?>
        <a target="_blank" href="https://ibitroot.pl/"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://ibitroot.pl/wp-content/uploads/2018/11/cropped-logo-czarne-800x800.png" width="200px"></a>
    <?php } ?>
    <div class="container">
        <div class="row justify-content-md-center m-2 ">
    <form action="update_config.php" method="post">
    <select class="custom-select" name="lang">
        <option selected>Język</option>
        <option value="pl" selected>PL</option>
        <option value="en">EN</option>
        <option value="de">DE</option>
    </select>
        <br><div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" id="customSwitch1" name="customSwitch1" <?php if($admin_panel_config[0]=="true") {echo ' checked';} ?>>
        <label class="custom-control-label" for="customSwitch1"><div data-l10n="Dev-Mode"></div></label>
    </div>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="customSwitch7" name="customSwitch7" <?php if($admin_panel_config[7]=="true") {echo ' checked';} ?>>
            <label class="custom-control-label" for="customSwitch7"><div data-l10n="3_pic"></div></label>
        </div>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="customSwitch2" name="customSwitch2" <?php if($admin_panel_config[1]=="true") {echo ' checked';} ?>>
            <label class="custom-control-label" for="customSwitch2"><div data-l10n="gallery"></div></label>
        </div>
    <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" id="customSwitch3" name="customSwitch3" <?php if($admin_panel_config[2]=="true") {echo ' checked';} ?>>
        <label class="custom-control-label" for="customSwitch3"><div data-l10n="preview"></div></label>
    </div>
    <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" id="customSwitch4" name="customSwitch4" <?php if($admin_panel_config[3]=="true") {echo ' checked';} ?>>
        <label class="custom-control-label" for="customSwitch4"><div data-l10n="printer"></div></label>
    </div>
    <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" id="customSwitch5" name="customSwitch5" <?php if($admin_panel_config[4]=="true") {echo ' checked';} ?>>
        <label class="custom-control-label" for="customSwitch5"><div data-l10n="logo"></div></label>
    </div>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="customSwitch6" name="customSwitch6" <?php if($admin_panel_config[5]=="true") {echo ' checked';} ?>>
            <label class="custom-control-label" for="customSwitch6"><div data-l10n="qr"></div></label>
        </div>
        <br><input class="form-control" type="text" name="label" placeholder="Podpis pod zdjęciem"><br>
        <div class="btn-group btn-group-lg" role="group" aria-label="Basic example">
            <button type="submit" class="btn btn-primary btn-secondary"><div data-l10n="apply"></div></button> <button type="button" class="btn btn-danger btn-secondary" name="reboot" onclick="/restart.php"><div data-l10n="reboot"> <button type="button" class="btn btn-danger btn-secondary" name="off" onclick="off"><div data-l10n="off"></div></button>
        </div>
		
    </form>
        <div>
        <?php 
        echo $ip;
        echo ':';
        echo $port; 
        ?>
        </div>
        </div>
    </div>
</div>
</div>
<script>
function (off){
$(document).ready(function(){
$("#off").click(function(){
  $.get("off.php");}}}
</script>
<script type="text/javascript" src="/resources/js/jquery.js"></script>
<script type="text/javascript" src="/resources/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="/resources/js/TweenLite.min.js"></script>
<script type="text/javascript" src="/resources/js/EasePack.min.js"></script>
<script type="text/javascript" src="/resources/js/jquery.gsap.min.js"></script>
<script type="text/javascript" src="/resources/js/CSSPlugin.min.js"></script>
<script type="text/javascript" src="/resources/js/photoswipe.min.js"></script>
<script type="text/javascript" src="/resources/js/photoswipe-ui-default.min.js"></script>
<script type="text/javascript" src="/resources/js/photoinit.js"></script>
<script type="text/javascript" src="/resources/js/<?php echo $config['pic']; ?>.js"></script>
<script type="text/javascript" src="/resources/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/lang/<?php echo $config['language']; ?>.js"></script>
</body>
</html>
