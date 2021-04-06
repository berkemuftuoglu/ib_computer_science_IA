<?php
global $Response;
global $Sql;

$Data = $Response->_Post($_POST);
if ($Data) {
    if (!$Data['email']) $Hata['email'] = 'Email Boş Bırakılamaz';
    if (!$Data['pass']) $Hata['pass'] = 'Şifre Boş Bırakılamaz';
    if (!$Hata) {

        $Doctor = $Sql->CountQuery("SELECT * FROM Doctor WHERE email='$Data[email]'");
        $Patient = $Sql->CountQuery("SELECT * FROM Patient WHERE email='$Data[email]'");

        if ($Doctor) {

            if (password_verify($Data['pass'], $Doctor['pass'])) {
                $Response->Session('doctor', $Doctor['id']);
                $Response->Session('name', $Doctor['name']);
                $Response->Session('email', $Doctor['email']);
                $Response->Session('phone', $Doctor['phone']);
                header("location:panel");

            } else {
                $Result['Error']="Parola hatalı";
                $Result['Status'] = "danger";
            }
        }elseif ($Patient) {

            if (password_verify($Data['pass'], $Patient['pass'])) {

                $Response->Session('patient', $Patient['id']);
                $Response->Session('name', $Patient['name']);
                $Response->Session('email', $Patient['email']);
                $Response->Session('phone', $Patient['phone']);
                header("location:panel");

            } else {
                $Result['Error']="Parola hatalı";
                $Result['Status'] = "danger";
            }


        }else{
            $Result['Error'] = "Hesap bulunamadı.";
            $Result['Status'] = "danger";
        }

    }
}
?>
<div class="authincation h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-10">
                <div class="authincation-content">
                    <div class="row no-gutters">
                        <div class="col-xl-6">
                            <div class="welcome-content" style="background: none;">
                                <div class="brand-logo">
                                    <a href="index.html">Doctor Patient Takip</a>
                                </div>
                                <h3 class="welcome-title"> Hoş Geldiniz</h3>

                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="auth-form">
                                <?php if($Result['Error']) echo '<div class="alert alert-'.$Result['Status'].'">'.$Result['Error'].'</div>'; ?>
                                <h4 class="text-center mb-4">Giriş </h4>
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label><strong>Email</strong></label>
                                        <input type="email" class="form-control" value="" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label><strong>Şifre</strong></label>
                                        <input type="password" class="form-control" value="" name="pass">
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-block">Giriş Yap</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>