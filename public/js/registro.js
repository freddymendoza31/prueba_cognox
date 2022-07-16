$(document).ready(function () {
    validate()
    $('#cedula', this).on('input', function () {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    $('#password', this).on('input', function () {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
    $('#password2', this).on('input', function () {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
    
});

function validate() {

    $("#registro").validate({

        rules: {

            password: {
                required: true,
                maxlength: 4
            },
            password2: {
                required: true,
                maxlength: 4
                
            }
        },
        messages: {

            password2: "Este campo es obligatorio. (requiere 4 digitos )",
            password: "Este campo es obligatorio. (requiere 4 digitos )",
        },
        errorElement: 'span',
    });
}
$(".login_btn").on("click", notify);

function notify() {
    jQuery('input').each(function () {
        if (jQuery(this).prop('value') == '') {

            Command: toastr["warning"]("Digite su " + jQuery(this).prop('name'), "error")

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

    });

    if ($('#password').val() !== $('#password2').val()) {
        Command: toastr["error"]("el campo  contraseña no coincide", "error")

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


}

$('#registro').submit(function (e) {
    e.preventDefault();
   let data = [];
   data = $(this).serializeArray();
    $.ajax({
        url: '/registro',
        data: data,
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: 'JSON',
    }) .done(function ({ error, msj, url }) {
        console.log(error)
        if (!error) {
            console.log('el error es falso')
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
            console.log('el error es verdadero')

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