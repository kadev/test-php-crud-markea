<!DOCTYPE html>
<html><head>
    <!-- Standard Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Reservations - Ana y José Yacht Collection</title>


	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>semantic/semantic.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/temp.css">

    <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
    <script src="<?php echo URL; ?>semantic/semantic.min.js"></script>
	<script src="<?php echo URL; ?>plugins/blockui/jquery.blockUI.min.js"></script>

    <style type="text/css">
        body {
            background-color: #FFFFFF;
        }
        .ui.menu .item img.logo {
            margin-right: 1.5em;
        }
        .main.container {
            margin-top: 7em;
        }
        .wireframe {
            margin-top: 2em;
        }
        .ui.footer.segment {
            margin: 5em 0em 0em;
            padding: 5em 0em;
        }

        .ui.visible.left.sidebar ~ .fixed, .ui.visible.left.sidebar ~ .pusher {
            -webkit-transform: translate3d(0px, 0, 0);
            transform: translate3d(0px, 0, 0);
            padding-left: 100px;
            padding-right: 30px;
        }
    </style>

	<script>
        var appURL = '<?php echo URL; ?>';
	</script>
</head>
<body>

<div class="ui inverted labeled icon left inline vertical demo sidebar menu uncover visible" style="background-color: #0d2f77;">
    <a class="item" style="padding-bottom: 2rem;padding-top: 2rem;">
        <img class="" style="width: 80px;" src="https://liderazgoefectivo.info/ayjy/include/images/logo-yates-blanco.png"
    </a>
    <a class="item" href="<?php echo URL; ?>">
        <i class="home icon"></i> Home
    </a>
    <a class="item" href="<?php echo URL; ?>reservations">
        <i class="tasks icon"></i> Reservations
    </a>
</div>

<div class="pusher">
