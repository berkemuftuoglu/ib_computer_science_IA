<?php
global $Response;
global $Site;
$Id=$Response->ReadUrl(3);
$Db= new \_core\Sql();
if(!$Db->CountQuery("Doctor WHERE id='$Id'")){
    header("location:/hata/404");
    exit();
} else {
    $Cond['id']=$Id;
    $Result=$Db->DBCommit('Sil','Doktor','',$Cond);
    if($Result)
        header("location:".$Site['url'].'/'.$Response->ReadUrl(1)."/#o");
    else
        header("location:".$Site['url'].'/'.$Response->ReadUrl(1)."/#n");
}