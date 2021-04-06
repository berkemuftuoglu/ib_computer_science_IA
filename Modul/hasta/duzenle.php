<?php
global $Response;
global $Site;
$Id = $Response->ReadUrl(3);

$Db = new \_core\Sql();
if (!$Db->CountQuery("Patient WHERE id='$Id'")) {
    header("location:/hata/404");
    exit();
}
if ($_POST) $Data = $Response->_Post($_POST);
if ($Data['adi']) {

    $Cond['id'] = $Id;
    $Data['pass']=password_hash($Data['pass'],PASSWORD_DEFAULT);
    $Sonuc = $Db->DBCommit('Duzenle', 'Patient', $Data, $Cond);

    if ($Sonuc)
        header("location:".$Site['url'].'/'.$Response->ReadUrl(1)."/#o");
    else
        header("location:".$Site['url'].'/'.$Response->ReadUrl(1)."/#n");
}

if (!$_POST) {
    $Data = $Db->CountQuery("SELECT * FROM Patient WHERE id='$Id'");
}


?>


<div class="content-body">
    <div class="container">
        <form action="" method="post">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <button type="submit" class="btn btn-primary pull-right ladda-button"
                                    data-style="expand-left">
                                <span class="ladda-label">Kaydet</span>
                                <span class="ladda-spinner"></span>
                            </button>
                        </li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><?php echo $Data['adi'] ?> Düzenle</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">


                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label>Adı</label>
                                        <input type="text" name="adi" class="form-control" placeholder="Adı" value="<?php echo $Data['adi']; ?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $Data['email']; ?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Şifre</label>
                                        <input type="password" name="pass" class="form-control" placeholder="Şifre">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Telefon</label>
                                        <input type="text" name="telefon" class="form-control" placeholder="Telefon" value="<?php echo $Data['telefon']; ?>">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label>Ameliyat</label>
                                        <input type="text" name="ameliyat" class="form-control" placeholder="Telefon" value="<?php echo $Data['ameliyat']; ?>">
                                    </div>

                                </div>



                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>


