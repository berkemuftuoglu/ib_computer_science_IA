<?php
global $Response;
global $Site;
$Id=$Response->ReadUrl(3);
$Db= new \_core\Sql();
if(!$Db->CountQuery("Hasta WHERE id='$Id'")){
    header("location:/hata/404");
    exit();
} else {
    $Cond['id']=$Id;
    $Sonuc=$Db->DBCommit('Sil','Hasta','',$Cond);
    if($Sonuc)
        header("location:".$Site['url'].'/'.$Response->ReadUrl(1)."/#o");
    else
        header("location:".$Site['url'].'/'.$Response->ReadUrl(1)."/#n");
}