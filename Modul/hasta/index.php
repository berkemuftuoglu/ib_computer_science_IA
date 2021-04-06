<?php
$Db = new \_core\Sql();
global $Response;
global $Site;
$Magaza_id = $Response->Session('Magaza_id');
?>

<div class="content-body">
    <div class="container">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="breadcrumb-range-picker">
                    <span class="ml-1"></span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <?php if(!$Response->Session('Patient')) { ?><a href="<?php echo $Site['url'].'/'.$Response->ReadUrl(1) ;?>/yeni" class="btn btn-primary pull-right">
                            Yeni Hasta
                        </a><?php } ?>
                    </li>
                </ol>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Hasta Listesi</h4>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-sm">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Adi</th>
                                    <th>Email</th>
                                    <th>Telefon</th>
                                    <th>İşlem</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $Doctor_id=$Response->Session('Patient');
                                if($Doctor_id) $Doktor="WHERE id='$Doctor_id'"; else $Doktor=NULL;
                                $Veri = $Db->MakeQuery("SELECT * FROM Hasta $Doktor");
                                foreach ($Veri as $Data) {
                                    echo '<tr>
                                        <td>' . $Data['id'] . '</td>
                                        <td>' . $Data['adi'] . '</td>
                                        <td>' . $Data['email'] . '</td>
                                        <td>' . $Data['telefon'] . '</td>
                                        <td>
                                        <div class="btn-group btn-group-xs" role="group">
                                        <a href="'.$Site['url'].'/'.$Response->ReadUrl(1).'/duzenle/' . $Data['id'] . '" class="btn btn-primary btn-xs">Düzenle</i></a>';
                                if(!$Response->Session('Patient')) { echo '<a href="'.$Site['url'].'/'.$Response->ReadUrl(1).'/sil/' . $Data['id'] . '" id="SilButon" class="btn btn-danger btn-xs">Sil</a>'; }
                                    echo '</div>
                                        </td>
                                    </tr>';
                                }
                                ?>


                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>