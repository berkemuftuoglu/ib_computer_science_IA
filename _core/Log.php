<?php
/**
 * Created by PhpStorm.
 * User: berke
 * Date: 2019-01-20
 * Time: 14:22
 */

namespace _core;

use _core\Response;
use _core\Sql;

class Log{


    public function LogIsle(){
        $Response = new Response();

        $Data['method'] = $Response->Method();
        $Data['Kullanici_id'] = $Response->RestCountQuery()['Kullanici_id'];
        $Data['url'] = $Response->ReadUrl();
        $Data['body'] = json_encode($Response->_Post(),JSON_UNESCAPED_UNICODE);



        $Sql = new Sql('TC_log');
        if(is_numeric($Data['Kullanici_id'])) {
            $Data['access_token'] = $Response->RestCountQuery()['access_token'];
            $Sql->DBCommit('Ekle', 'ApiLog', $Data);
        } else {
            $Data['sayfa']=$Data['Kullanici_id'];
            $Data['Kullanici_id']=NULL;
            $Sql->DBCommit('Ekle', 'AuthLog', $Data);

        }

    }
}