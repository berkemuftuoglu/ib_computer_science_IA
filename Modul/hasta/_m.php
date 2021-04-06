<?php
global $Response;

$Include = $Response->ReadUrl(2);
if(!$Include) $Include = 'index';

require_once('Modul/hasta/'.$Include.'.php');
