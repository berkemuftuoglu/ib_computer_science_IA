<?php

global $Response;
$Module = $Response->ReadUrl(2);
require_once('Modul/Api/Kod/'.$Module.'.php');