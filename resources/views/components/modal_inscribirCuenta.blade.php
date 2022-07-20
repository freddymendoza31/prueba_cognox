<div class="modal" id="mdlInscribirCuenta" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Inscribir Cuentas Bancarias</h5>
                <button type="button" class="close btn btn-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmInscribirCta" method="POST">
                    @csrf
                    <div class="row">

                        <div class="col-md-12 text-center">

                            <div class="row pt-4">
                                <div class="col-md-6">
                                    <span for="origen">Producto</span>
                                    <select class="form-control" id="insProducto" name="insProducto"
                                        aria-label="Default select example">
                                    </select>
                                </div>
                            </div>
                            <div class="row pt-4 " id="entidadBancaria">
                                <div class="col-md-6">
                                    <span for="origen">Entidad Bancaria</span>
                                    <input class="form-control" id="nombreEntidad" name="nombreEntidad" type="text" required>
                                </div>
                            </div>
                            <div class="row pt-4 " >
                                <div class="col-md-6 hidden" id="usuariosins">
                                    <span for="origen">Usuarios</span>
                                    <select class="form-control" id="insUser" name="insUser"
                                        aria-label="Default select example">
                                    </select>

                                </div>
                                <div class="col-md-6 ">
                                    <span for="origen">Numero de Cuenta</span>
                                    <input class="form-control" id="nuemeroCuenta" name="nuemeroCuenta" type="number" required>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row pt-4">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-success">Inscribir</button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class='fas fa-backspace'></i>
                    Close</button>
            </div>
        </div>
    </div>
</div>
