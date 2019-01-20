<?php
?>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
    <title>Photobooth</title>


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
    <link rel="stylesheet" href="/resources/css/style.css" />
    <meta name="viewport" content="width=${WIDTH}, initial-scale=1"/>
    <style type="text/css">
        body {
            background: ${BGCOLOR};
            text-align: center;
            margin-top: 10%;
        }
        #videoCanvas {
            /* Always stretch the canvas to 640x480, regardless of its
            internal size. */
            width: ${WIDTH}px;
            height: ${HEIGHT}px;
        }
    </style>
    <script type="text/javascript">
        var isdev = true;
        var gallery_newest_first = <?php echo ($config['gallery']['newest_first']) ? 'true' : 'false'; ?>;
    </script>
</head>
<body>
<!-- The Canvas size specified here is the "initial" internal resolution. jsmpeg will
    change this internal resolution to whatever the source provides. The size the
    canvas is displayed on the website is dictated by the CSS style.
-->
<canvas id="videoCanvas" width="${WIDTH}" height="${HEIGHT}">
    <p>
        Please use a browser that supports the Canvas Element, like
        <a href="http://www.google.com/chrome">Chrome</a>,
        <a href="http://www.mozilla.com/firefox/">Firefox</a>,
        <a href="http://www.apple.com/safari/">Safari</a> or Internet Explorer 10
    </p>
</canvas>
<script type="text/javascript">
    // Show loading notice
    var canvas = document.getElementById('videoCanvas');
    var ctx = canvas.getContext('2d');
    ctx.fillStyle = '${COLOR}';
    ctx.fillText('Loading...', canvas.width/2-30, canvas.height/3);

    // Setup the WebSocket connection and start the player
    var client = new WebSocket('ws://' + window.location.hostname + ':${WS_PORT}/');
    var player = new jsmpeg(client, {canvas:canvas});
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
<script type="text/javascript" src="/resources/js/jsmpg.js"></script>
<script type="text/javascript" src="/resources/js/<?php echo $config['pic']; ?>.js"></script>
<script type="text/javascript" src="/lang/<?php echo $config['language']; ?>.js"></script>
</body>
</html>