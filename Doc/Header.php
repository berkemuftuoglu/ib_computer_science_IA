<?php global $Response; ?>
<?php global $Site; ?>
<div id="main-wrapper">

    <!--**********************************
        Nav header start
    ***********************************-->
    <div class="nav-header">
        <a href="<?php echo $Site['url']; ?>" class="brand-logo">

            <span class="logo-compact">Doktor</span>
            <span class="brand-title">Doktor</span>
        </a>

        <div class="nav-control">
            <div class="hamburger">
                <span class="toggle-icon"><i class="icon-menu"></i></span>
            </div>
        </div>
    </div>

<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">

                </div>

                <ul class="navbar-nav header-right">

                    <li class="nav-item dropdown header-profile">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $Response->Session('isim'); ?>
                            <i class="mdi mdi-account"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="hesap/cikis" class="dropdown-item">

                                <span>Çıkış</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>



    <div class="quixnav">
        <div class="quixnav-scroll">
            <ul class="metismenu" id="menu">
                <li class="nav-label">Navigation</li>
                <li><a href="<?php echo $Site['url']; ?>/panel"><i class="mdi mdi-home"></i><span class="nav-text">Panel</span></a></li>
                <li><a href="<?php echo $Site['url']; ?>/takvim"><i class="icon-calender"></i><span class="nav-text">Takvim</span></a></li>
                <li><a class="has-arrow" href="<?php echo $Site['url']; ?>/hasta" aria-expanded="false"><i class="mdi mdi-apps"></i><span class="nav-text">Hasta</span></a>
                </li>
                <?php if(!$Response->Session('Hasta')){ ?><li><a class="has-arrow" href="<?php echo $Site['url']; ?>/doktor" aria-expanded="false"><i class="mdi mdi-power-plug"></i><span class="nav-text">Doktor</span></a></li><?php } ?>
            </ul>
        </div>
    </div>
