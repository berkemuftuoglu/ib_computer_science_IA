<?php

use _core\Response;
use _core\Sql;

ob_start();
session_start();

ini_set('display_errors',0);
error_reporting(E_ERROR | E_WARNING);
setlocale(LC_TIME, 'tr_TR.UTF-8');
date_default_timezone_set('Europe/Istanbul');

require_once('_core/Autoloader.php');
_core\Autoloader::register();
$Response= new _core\Response();
$Sql= new _core\Sql();

$Site = $Response->SiteInfo();

if((!$Response->Session('Doktor') AND !$Response->Session('Hasta')) AND $Response->ReadUrl(1)!='giris'){
    header("location:/doktor/giris");
}

if(!$Response->ReadUrl(1)){
    header("location:/doktor/panel");
	}
if($Response->ReadUrl(1)!='Api' AND $Response->ReadUrl(1)!='Cron') {
    include 'Doc/css.php';
    if($Response->Session('Doktor') OR $Response->Session('Hasta')) include 'Doc/Header.php';
}

$Response->Modul();

if($Response->ReadUrl(1)!='Api' AND $Response->ReadUrl(1)!='Cron') {
    include 'Doc/js.php';
    if($Response->Session('Doktor') OR $Response->Session('Hasta')) include 'Doc/Footer.php';
}

