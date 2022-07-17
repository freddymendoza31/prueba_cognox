<!-- Modal Fullscreen xl -->
<div class="modal" id="mdlTransaction" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Transacciones</h5>
                <button type="button" class="close btn btn-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-md-12 text-center">
                        <div class="row pt-4">
                            <div class="col-md-6">
                                <span for="origen">Cuenta de origen</span>
                                <select class="form-control" aria-label="Default select example">

                                    <option value="1">123456789666</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <span for="origen">Productos Inscritos</span>
                                <select class="form-control" aria-label="Default select example">
                                    <option value="1">Cuentas Propias</option>
                                    <option value="2">cuentas de terceros</option>
                                </select>
                            </div>
                        </div>
                        <div class="row pt-4">
                            <div class="col-md-6">
                                <span for="origen">Numero de cuenta</span>
                                <select class="form-control" aria-label="Default select example">
                                    <option value="1">123456890</option>
                                    <option value="2">98765</option>
                                    <option value="3">456789</option>
                                </select>
                            </div>
                            <div class="col-md-6 ">
                                <span for="origen">Valor a Transferir</span>
                                <input class="form-control" type="text">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row pt-4">
                    <div class="col-md-12 text-center">
                        <button class="btn btn-success">Transferir</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"> <i
                        class='fas fa-backspace'></i> Close</button>
            </div>
        </div>
    </div>
</div>
