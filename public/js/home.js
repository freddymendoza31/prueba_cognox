$(document).ready(function () {
    consultcuentaOrigen()
    consultar_transacciones()
    consultar_consultCuentasBancarias()
    consultar_productos()

});

let saldo;

function consultcuentaOrigen(data) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "get",
        url: "/cuentaOrigen",
        data: ({ 'id': data }),
        dataType: "json",
    }).done(function (data) {

        let select = '';
        for (var i = 0; i < data.length; i++) {
            saldo = data[i].saldo;
            $('#saldo').html('Saldo $' + data[i].saldo)
            select += '<option value="' + data[i].cuenta + '">' + data[i].cuenta + ' </option>';
        }
        $('#cuenta_origen').html(select)
    }).fail(function () {
        console.log('erro');
    });
}

function consultar_productos() {
    $.ajax({
        type: "get",
        url: "/consultProductos",
        data: "data",
        dataType: "json",
    }).done(function (data) {
        console.log(data)
        let select = '';

        for (var i = 0; i < data.length; i++) {
            select += '<option value="' + data[i].id + '">' + data[i].tipo_producto + ' </option>';
        }

        $('#producto').html(select)
        $('#insProducto').html(select)

    }).fail(function () {
        console.log('erro');
    });
}

$('#producto').change(function (e) {
    e.preventDefault();
    let data = $(this).val();
    consultar_consultCuentasBancarias(data)
});

function consultar_consultCuentasBancarias(data) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: "/consultCuentas",
        data: ({ 'id': data }),
        dataType: "json",
    }).done(function (data) {

        let select = '';
        for (var i = 0; i < data.length; i++) {
            $('#id_destino').val(data[i].id)
            select += '<option value="' + data[i].cuenta + '">' + data[i].cuenta + ' </option>';
        }
        $('#cuenta_destino').html(select)
    }).fail(function () {
        console.log('erro');
    });
}



function consultar_transacciones() {
    $.ajax({
        type: "get",
        url: "/init",
        data: "data",
        dataType: "json",
    }).done(function ({ data }) {
        console.log(data.length)
        let table = '';
        if (data.length !== 0) {
            for (var i = 0; i < 0; i++) {
                table = "<tr>"
                table += "<td> </td>"
                table += "<td> </td>"
                table += "<td> </td>"
                table += "<td> </td>"
                table = "<tr>"
            }

        } else {

            table = "<span class ='text-center'> No hay movimientos</span>"
        }
        $('#tbl_movimientosbank tbody').html(table)
    }).fail(function (data) {

    });
}

//-------------Tranferir------------//
$('#imgtransfer').click(function () {
    $('#mdlTransaction').modal('show')
});

$('#transferir').submit(function (e) {
    e.preventDefault();
    let data = [];
    data = $(this).serializeArray();
    if (saldo > 0) {
        if ($('#valor').val() <= saldo) {
            $.ajax({
                url: '/transferir',
                type: 'post',
                dataType: 'JSON',
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            }).done(function ({ error, msj, url }) {
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
                    $("#transferir")[0].reset();
                } else {
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
        } else {

            Command: toastr["error"]('No tienes suficiente fondo para hacer la transferencia')

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


});

//-------------inscrbir cuenta propias y de terceros-------//
$('#insProducto').change(function (e) {
    e.preventDefault();
    let data = $(this).val();
    if (data == 2) {
        $('#usuariosins').removeClass( "hidden" )
        $('#entidadBancaria').addClass( "hidden" )
        $('#nombreEntidad').removeAttr("required");
        consultar_usuariosTerceros()
    }else{
        $('#usuariosins').addClass( "hidden" )
        $('#entidadBancaria').removeClass( "hidden" )
        $('#nombreEntidad').prop("required", true);

    }
});

function consultar_usuariosTerceros() {
    $.ajax({
        type: "get",
        url: "/alluser",
        data: 'data',
        dataType: "json",
    }).done(function (data) {

        let select = '';
        for (var i = 0; i < data.length; i++) {

            select += '<option value="' + data[i].id + '">' + data[i].name + ' </option>';
            $('#nuemeroCuenta').val( data[i].cuenta )
        }
        $('#insUser').html(select)
    }).fail(function () {
        console.log('erro');
    });
}

$('#frmInscribirCta').submit(function (e) {
    e.preventDefault();
    let data = $(this).serializeArray();

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "post",
        url: "InscribirCta",
        data: data,
        dataType: "json",
        success: function ({error, msj}) {

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
                $('#mdlInscribirCuenta').modal('hide')
                $("#frmInscribirCta")[0].reset();
            } else {
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
        }
    });
});
