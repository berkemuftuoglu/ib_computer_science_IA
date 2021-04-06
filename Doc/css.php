<?php
    global $Response;
$Site = $Response->SiteInfo();
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?php echo $Site['title']; ?></title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $Site['tasarim']; ?>/images/favicon.png">
    <link href="<?php echo $Site['tasarim']; ?>/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $Site['tasarim']; ?>/vendor/bootstrap-daterangepicker/daterangepicker.css">

    <link href="<?php echo $Site['tasarim']; ?>/vendor/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
    <!-- asColorpicker -->
    <link href="<?php echo $Site['tasarim']; ?>/vendor/jquery-asColorPicker/css/asColorPicker.min.css" rel="stylesheet">
    <!-- Material color picker -->
    <link href="<?php echo $Site['tasarim']; ?>/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <!-- Pick date -->
    <link rel="stylesheet" href="<?php echo $Site['tasarim']; ?>/vendor/pickadate/themes/default.css">
    <link rel="stylesheet" href="<?php echo $Site['tasarim']; ?>/vendor/pickadate/themes/default.date.css">



    <link href="<?php echo $Site['tasarim']; ?>/vendor/fullcalendar/css/fullcalendar.min.css" rel="stylesheet">
    <link href="<?php echo $Site['tasarim']; ?>/css/style.css" rel="stylesheet">
</head>
<body>
