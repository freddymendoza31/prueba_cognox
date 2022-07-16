$(document).ready(function () {
    $('#cedula', this).on('input', function () {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    $('#password', this).on('input', function () {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    validate()
});

function validate() {

    $("#login").validate({

        rules: {

            cedula: {
                required: true
            },
            password: {
                required: true,
                maxlength: 4,
                minlength: 4,
            }
        },
        messages: {

            cedula: "Este campo es obligatorio. digite su numero de codumento",
            password: "Este campo es obligatorio. (requiere 4 digitos )",
        },
        errorElement: 'span',
    });
}



$("#login").submit(function (e) {
    e.preventDefault();

    let data = [];
    data = $(this).serializeArray();
    data.push({ name: "opcn", value: 'save' });
    $.ajax({
        url: '/login',
        type: 'post',
        dataType: 'JSON',
        data: data,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    })
        .done(function ({ error, msj, url }) {
            if (!error) {
                Command: toastr["success"](msj)

                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                $(location).attr('href', url);
            }else{
                Command: toastr["error"](msj)

                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
            }
        })


});

