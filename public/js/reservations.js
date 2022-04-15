$( document ).ready(function() {
    var urlController = appURL + "reservations/";

    $('#date-reservation').calendar({
        type: 'date',
        formatter: {
            date: function (date, settings) {
                if (!date) return '';
                var day = date.getDate();
                var month = date.getMonth() + 1;
                var year = date.getFullYear();

                if(day < 10) day = '0' + day;
                if(month < 10) month = '0' + month;

                return year + '-' + month + '-' + day;
            }
        }
    });

    $("#add-reservation").on("click", function(){
        var form = $("#form-create-reservation");
        var formData = form.serialize();
        var reservationMainGuest = form.find("input[name=name-guest]").val();

        if($('.ui.form').form('is valid')){
            $.ajax({
                method: 'POST',
                url: urlController+'store',
                data: { data_reservation: formData },
                beforeSend: function(){
                    blockUISection("#form-create-reservation", "Saving data, please wait...");
                }
            })
                .done(function( data ) {
                    var result = JSON.parse(data);

                    if(result.response == true){
                        $('#success-save-reservation').modal('show');
                    }else{
                        alert("Oops... Something went wrong.")
                    }

                    unblockUISection("#form-create-reservation")
                });
        }else{
            form.find(".error").show();
        }
    });

    $("#update-reservation").on("click", function(){
        var formData = $("#form-edit-reservation").serialize();
        var reservation_id = $(this).attr("data-reservation");

        if($('.ui.form').form('is valid')){
            $.ajax({
                method: 'POST',
                url: urlController+'update',
                data: { data_reservation: formData, reservation_id: reservation_id },
                beforeSend: function(){
                    blockUISection("#form-edit-reservation", "Updating data, please wait...")
                }
            })
                .done(function( data ) {
                    var result = JSON.parse(data);

                    if(result.response == true){
                        $('#success-update-reservation').modal('show');
                    }else{
                        alert("Oops... Something went wrong.")
                    }

                    unblockUISection("#form-edit-reservation");
                });
        }else{
            alert("ERROR: An error has occurred with our servers, try again, if the error persists contact the system administrator.");
        }


    });

    $("#delete-reservation").on("click", function(){
        var reservationsTable = $("#reservations-table");
        var reservation_id = $(this).attr("data-reservation");

        $.ajax({
            method: 'POST',
            url: urlController+'delete',
            data: { reservation_id: reservation_id },
            beforeSend: function(){
                blockUISection("#reservations-table", "Deleting data, please wait...");
            }
        })
            .done(function( data ) {
                var result = JSON.parse(data);

                if(result.response == true){
                    unblockUISection("#reservations-table");

                    reservationsTable.find("tr[data-reservation="+reservation_id+"]")
                        .css("background-color", "#e7bdbc");

                    setTimeout(
                        function()
                        {
                            reservationsTable.find("tr[data-reservation="+reservation_id+"]").remove();
                        }, 500);

                }else{
                    unblockUISection("#reservations-table");
                    alert("ERROR: An error has occurred with our servers, try again, if the error persists contact the system administrator.");
                }
            });
    });

    function blockUISection($section, $message = null){
        var container = $($section);
        if($message == null) $message = "Loading, please wait...";

        container.block({
            message: $message,
            overlayCSS: {
                backgroundColor: '#e9ecf6',
                opacity: 0.8,
                cursor: 'wait'
            },
            css: {
                border: 0,
                color: '#000',
                padding: 0,
                backgroundColor: 'transparent'
            }
        });
    }

    function unblockUISection($section){
        var container = $($section);
        container.unblock();
    }

    /*$('#form-create-reservation')
        .form({
            fields: {
                'name-guest': 'empty',
                phone: 'empty',
                adults: 'empty',
                children: 'empty',
                yacht: 'empty',
                'time-onboard': 'empty',
                date: 'empty'
            }
        })
    ;*/

    $('.ui.form')
        .form({
            fields: {
                name: {
                    identifier: 'name-guest',
                    rules: [
                        {
                            type   : 'empty',
                            prompt : 'Please enter your name'
                        }
                    ]
                }
            }
        })
    ;
})