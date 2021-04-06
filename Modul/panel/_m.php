<?php
    global $Response;
    global $Sql;
    $Patient=$Response->Session('Patient');
?>
<div class="content-body">
    <div class="container">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="breadcrumb-range-picker">
                    <span><i class="icon-calender"></i></span>
                    <span class="ml-1">Panel</span>
                </div>
            </div>
        </div>
        <!-- row -->


        <div class="row">

            <div class="col-lg-4">


                    <div class="card text-white bg-primary">
                        <div class="card-header">
                            <h5 class="card-title text-white">Hoş Geldiniz</h5>
                        </div>
                        <div class="card-body mb-0">
                            <p class="card-text">Adı: <?php echo $Response->Session('isim'); ?></p>
                            <p class="card-text">Email: <?php echo $Response->Session('email'); ?></p>
                            <p class="card-text">Telefon: <?php echo $Response->Session('telefon'); ?></p>
                            <p class="card-text">Tarih: <?php echo date("Y.m.d"); ?></p>
                            <?php if($Patient) { ?><p class="card-text">Ameliyat : <?php echo $Sql->CountQuery("SELECT * FROM Patient WHERE id='$Patient'")['surgery']; ?></p><?php } ?>
                        </div>
                    </div>

            </div>

        </div>

    </div>
</div>
