<script>



    $("#takvim").fullCalendar({
        events: '/doktor/Api/takvim/takvimcek',
        locale: 'tr',
        header: {
            left: "prev,next today",
            left: 'prev,next today',
            center: 'title',
            right: 'month agendaWeek agendaDay listWeek '
        },

        monthNames: [ "Ocak", "Şubat", "Mart", "Nisan", "Mayıs", "Haziran", "Temmuz", "Ağustos", "Eylül", "Ekim", "Kasım", "Aralık" ],
        dayNames: [ "Pa", "Pt", "Sl", "Ça", "Pe", "Cu", "Ct" ],
        dayNamesShort: [ "Pazar", "Pazartesi", "Salı", "Çarşamba", "Perşembe", "Cuma", "Cumartesi" ],
        buttonText: {
            prev: "geri",
            next: "ileri",
            today: "bugün",
            month: "Ay",
            week: "Hafta",
            day: "Gün",
            list: "Ajanda"
        },

        weekLabel: "Hf",
        allDayText: "Tüm gün",
        eventLimitText: "daha fazla",
        noEventsMessage: "Gösterilecek etkinlik yok",
        editable: false,
        navLinks: true, // can click day/week names to navigate views
        eventLimit: true, // allow "more" link when too many events
        droppable: false,
        allDaySlot: false,


        eventClick:  function(event, jsEvent, view) {

            endtime = $.fullCalendar.moment(event.end).format('DD.MM.YYYY HH:mm:ss');
            starttime = $.fullCalendar.moment(event.start).format('DD.MM.YYYY HH:mm:s');

            $('.startdatedetay').val(starttime);
            $('.enddatedetay').val(endtime);

            $.post('/doktor/Api/takvim/takvimbilgi',{id:event.id},
                function(result){

                    var veri=jQuery.parseJSON(result);
                    console.log(veri.doktor);
                    $("#Doctor_idbilgi option").remove();
                    $("#Patient_idbilgi option").remove();

                    $("#Doctor_idbilgi").append(veri.doktor);
                    $("#Patient_idbilgi").append(veri.hasta);

                    $("#Event_id").val(event.id);


                });

            $('#randevubilgi').modal();
        }



    });



    function CreatePlan()
    {
        enddate=$(".enddate").val();
        startdate=$(".startdate").val();

        Doctor_id=$("#Doctor_id").val();
        Patient_id=$("#Patient_id").val();

        if (enddate!='' && startdate!='' && Doctor_id>0 && Patient_id>0) {
            $.post('/doktor/Api/takvim/takvimolustur',{enddate:enddate,startdate:startdate,Doctor_id:Doctor_id,Patient_id:Patient_id},
                function(result){


                    $("#enddate").val('');
                    $("#startdate").val('');
                    $("#Doctor_id").val('');
                    $("#Patient_id").val('');

                    var veri=jQuery.parseJSON(result);
                    $("#takvim").fullCalendar('renderEvent',
                        {

                            id: veri.id,
                            title: veri.adi,
                            start: (startdate),
                            end: (enddate), //'2018-08-04'
                            description: enddate,
                            editable:true,
                            className: 'm-fc-event--danger m-fc-event--solid-warning',

                        }, true);
                    $('#randevumodal').modal('hide');
                });
        }

    }


    function SqlDate(date)
    {
        var EventDate = date;
        var array = new Array();
        array = EventDate.split('.');

        var year = new Array();
        var yeardef=array[2];
        year = yeardef.split(' ');



        var newDate = (year[0] + "-" + array[1] + "-" + array[0] + " " + year[1]);
        return newDate;
    }
    
    function PlanSil() {
        Plan_id=$("#Event_id").val();
        $.post('/doktor/Api/takvim/PlanSil',{Plan_id:Plan_id},
            function(result){
                $("#takvim").fullCalendar('removeEvents',Plan_id);
            });
    }



</script>