<?php global $Response; ?>
<div class="content-body">
    <div class="container">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="breadcrumb-range-picker">
                    <span><i class="icon-calender"></i></span>
                    <span class="ml-1">Takvim</span>
                </div>
            </div>
        </div>
        <!-- row -->


        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-sm-2">
                            <a href="javascript:void()" data-toggle="modal"
                               data-target="#randevumodal"
                               class="btn btn-primary btn-event w-100">
                                <span class="align-middle"><i class="ti-plus"></i></span>
                                Randevu Ekle
                            </a></div>
                        <div id="takvim" class="app-fullcalendar"></div>
                    </div>
                </div>


            </div>

        </div>

    </div>
</div>


<div class="modal fade none-border" id="randevumodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Yeni Randevu</strong></h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Başlangıç Tarihi</label>
                            <input type="text" class="form-control startdate" placeholder="Başlangıç Tarihi" id="min-date">
                        </div>

                        <div class="col-md-6">
                            <label>Bitiş Tarihi</label>
                            <input type="text" class="form-control enddate" placeholder="Bitiş Tarihi" id="min-date">
                        </div>


                        <div class="col-md-6">
                            <label class="control-label">Doktor</label>
                            <select class="form-control form-white" id="Doctor_id" <?php if($Response->Session('Doctor')) echo 'disabled'; ?>>
                                <?php
                                $Db = new \_core\Sql();
                                $Veri = $Db->MakeQuery("SELECT * FROM Doktor");
                                foreach ($Veri as $Data) {
                                    ?>
                                    <option value="<?php echo $Data['id']; ?>" <?php if($Response->Session('Doctor')==$Data['id']) echo 'SELECTED';?>><?php echo $Data['adi']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="control-label">Hasta</label>
                            <select class="form-control form-white" id="Patient_id" <?php if($Response->Session('Patient')) echo 'disabled'; ?>>
                                <?php
                                $Db = new \_core\Sql();
                                $Veri = $Db->MakeQuery("SELECT * FROM Patient");
                                foreach ($Veri as $Data) {
                                    ?>
                                    <option value="<?php echo $Data['id']; ?>" <?php if($Response->Session('Patient')==$Data['id']) echo 'SELECTED';?>><?php echo $Data['adi']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect"
                        data-dismiss="modal">Kapat
                </button>
                <button type="button" class="btn btn-danger waves-effect waves-light save-category" onclick="CreatePlan()"
                        data-dismiss="modal">Kaydet
                </button>
            </div>
        </div>
    </div>
</div>




<div class="modal fade none-border" id="randevubilgi">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Randevu Detay</strong></h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Başlangıç Tarihi</label>
                            <input type="text" class="form-control startdatedetay" placeholder="Başlangıç Tarihi" id="min-date" disabled>
                        </div>

                        <div class="col-md-6">
                            <label>Bitiş Tarihi</label>
                            <input type="text" class="form-control enddatedetay" placeholder="Bitiş Tarihi" id="min-date" disabled>
                        </div>


                        <div class="col-md-6">
                            <label class="control-label">Doktor</label>
                            <select class="form-control" id="Doctor_idbilgi" disabled>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="control-label">Hasta</label>
                            <select class="form-control" id="Patient_idbilgi" disabled>
                            </select>
                        </div>
                        <input type="hidden" value="" id="Event_id">

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect"
                        data-dismiss="modal">Kapat
                </button>
                <button type="button" class="btn btn-danger waves-effect waves-light save-category" onclick="PlanSil()"
                        data-dismiss="modal">Sil
                </button>
            </div>
        </div>
    </div>
</div>