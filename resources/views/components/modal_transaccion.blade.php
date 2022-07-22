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
                <form id="transferir" method="POST">
                    @csrf
                    <div class="row">

                        <div class="col-md-12 text-center">
                            <div class="row pt-4"><div class="colmd-12"><span id="saldo"></span></div></div>
                            <div class="row pt-4">
                                <div class="col-md-6">
                                    <span for="origen">Cuenta de origen</span>
                                    <select class="form-control" id="cuenta_origen" name="cuenta_origen" aria-label="Default select example">
                                        <option value="1">123456789666</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <span for="origen">Productos Inscritos</span>
                                    <select class="form-control" id="producto" name="producto" aria-label="Default select example" required>
                                    </select>
                                </div>
                            </div>
                            <div class="row pt-4">
                                <div class="col-md-6">
                                    <span for="origen">Cuenta Destino</span>
                                    <select class="form-control" id="cuenta_destino" name="cuenta_destino" aria-label="Default select example" required>
                                    </select>
                                    <input type="hidden" id="id_destino" name ="id_destino">
                                </div>
                                <div class="col-md-6 ">
                                    <span for="origen">Valor a Transferir</span>
                                    <input class="form-control" id="valor" name="valor" type="number"  required>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row pt-4">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-success">Transferir</button>
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
