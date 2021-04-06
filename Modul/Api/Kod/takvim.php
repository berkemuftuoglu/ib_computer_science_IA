<?php


global $Response;
$Mod = $Response->ReadUrl(3);
$Db = new \_core\Sql();


if ($Response->SearchUrl('takvimcek')) {

    $A = explode('=', $_SERVER['REQUEST_URI']);
    $SDate = explode('&', $A[1])[0];
    $EDate = explode('&', $A[2])[0];


    $data = '';
    $Doctor_id=$Response->Session('Doctor');
    $Patient_id=$Response->Session('Patient');

    if($Doctor_id) $Query="AND Doctor_id='$Doctor_id'"; else $Query="AND Patient_id='$Patient_id'";

    $sql = $Db->MakeQuery("SELECT * FROM Events WHERE  (DATE(startdate)>='$SDate' OR DATE(enddate)>='$SDate') AND (DATE(startdate)<='$EDate' OR DATE(enddate)<='$EDate') $Query");
    foreach ($sql as $index => $result) {

        if($Doctor_id) {
            $Name = $Db->GetInfo("SELECT name FROM Patient WHERE id='$result[Patient_id]' ")['name'];
        }else {
            $Name = $Db->GetInfo("SELECT name FROM Doctor WHERE id='$result[Doctor_id]' ")['name'];
        }



            $color = 'danger';
            $color1 = 'warning';
            $status = 'false';

        $data .= '{
        "id":"' . $result['id'] . '",
        "title":"'.$Name. ' ",
        "start":"' . $result['startdate'] . '",
        "description":"' .$result['enddate'] . '",
        "className": "m-fc-event--' . $color . ' m-fc-event--solid-' . $color1 . '",
        "editable": ' . $status . ',
        "end":"' . $result['enddate'] . '"
        },';

    }

    $data = rtrim($data, ',');

    echo '[ ' . $data . ' ]';


}

if($Response->ReadUrl('3')=='takvimolustur'){
    $Data=$Response->_Post($_POST);
    $Result['id']=$Db->DBCommit('Ekle','Events',$Data);

    $Doctor_id=$Response->Session('Doctor');
    $Patient_id=$Response->Session('Patient');


    if($Doctor_id) {
        $Result['name'] = $Db->GetInfo("SELECT name FROM Patient WHERE id='$Data[Patient_id]' ")['name'];
    }else {
        $Result['name'] = $Db->GetInfo("SELECT name FROM Doctor WHERE id='$Data[Doctor_id]' ")['name'];
    }
    echo json_encode($Result,JSON_UNESCAPED_UNICODE);

}

if($Response->ReadUrl('3')=='takvimbilgi'){
    $Doctor_id=$Response->Session('Doctor');
    $Patient_id=$Response->Session('Patient');
    $id=$_POST['id'];
    $Data=$Db->GetInfo("SELECT * FROM Events WHERE id='$id'");

        $Result['hasta'] = '<option value="0">'.$Db->GetInfo("SELECT name FROM Patient WHERE id='$Data[Patient_id]' ")['name'].'</option>';

        $Result['doktor'] = '<option value="0">'.$Db->GetInfo("SELECT name FROM Doctor WHERE id='$Data[Doctor_id]' ")['name'].'</option>';
    echo json_encode($Result,JSON_UNESCAPED_UNICODE);
}

if($Response->ReadUrl('3')=='PlanSil'){

    $Cond['id']=$_POST['Plan_id'];

    echo $Db->DBCommit('Sil','Events','',$Cond);
}