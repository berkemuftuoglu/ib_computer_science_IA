<?php
global $Response;
$Site = $Response->SiteInfo();
?>


<script src="<?php echo $Site['tasarim']; ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo $Site['tasarim']; ?>/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo $Site['tasarim']; ?>/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- Here is navigation script -->
<script src="<?php echo $Site['tasarim']; ?>/vendor/quixnav/quixnav.min.js"></script>
<script src="<?php echo $Site['tasarim']; ?>/js/quixnav-init.js"></script>
<script src="<?php echo $Site['tasarim']; ?>/js/custom.min.js"></script>
<!--removeIf(production)-->
<!-- Demo scripts -->
<script src="<?php echo $Site['tasarim']; ?>/js/styleSwitcher.js"></script>
<!--endRemoveIf(production)-->


<!-- Daterangepicker -->
<!-- momment js is must -->
<script src="<?php echo $Site['tasarim']; ?>/vendor/moment/moment.min.js"></script>
<script src="<?php echo $Site['tasarim']; ?>/vendor/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- clockpicker -->
<script src="<?php echo $Site['tasarim']; ?>/vendor/clockpicker/js/bootstrap-clockpicker.min.js"></script>
<!-- asColorPicker -->
<script src="<?php echo $Site['tasarim']; ?>/vendor/jquery-asColor/jquery-asColor.min.js"></script>
<script src="<?php echo $Site['tasarim']; ?>/vendor/jquery-asGradient/jquery-asGradient.min.js"></script>
<script src="<?php echo $Site['tasarim']; ?>/vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js"></script>
<!-- Material color picker -->
<script src="<?php echo $Site['tasarim']; ?>/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
<!-- pickdate -->
<script src="<?php echo $Site['tasarim']; ?>/vendor/pickadate/picker.js"></script>
<script src="<?php echo $Site['tasarim']; ?>/vendor/pickadate/picker.time.js"></script>
<script src="<?php echo $Site['tasarim']; ?>/vendor/pickadate/picker.date.js"></script>



<!-- Daterangepicker -->
<script src="<?php echo $Site['tasarim']; ?>/js/plugins-init/bs-daterange-picker-init.js"></script>
<!-- Clockpicker init -->
<script src="<?php echo $Site['tasarim']; ?>/js/plugins-init/clock-picker-init.js"></script>
<!-- asColorPicker init -->
<script src="<?php echo $Site['tasarim']; ?>/js/plugins-init/jquery-asColorPicker.init.js"></script>
<!-- Material color picker init -->
<script src="<?php echo $Site['tasarim']; ?>/js/plugins-init/material-date-picker-init.js"></script>
<!-- Pickdate -->
<script src="<?php echo $Site['tasarim']; ?>/js/plugins-init/pickadate-init.js"></script>









<script src="<?php echo $Site['tasarim']; ?>/vendor/jqueryui/js/jquery-ui.min.js"></script>

<script src="<?php echo $Site['tasarim']; ?>/vendor/fullcalendar/js/fullcalendar.min.js"></script>


<?php include 'takvim.php'; ?>


</body>
</html>