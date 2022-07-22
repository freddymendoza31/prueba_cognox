<div>
    <span class="btn btn-danger"><i class="fas fa-user"></i> {{ucfirst(Session::get('sessionName')) }}</span>
    <h2 class="text-center"><i class="fas fa-circle iconfm"></i> Estado de la Cuenta</h2>
    <div class="row tabla">
        <col-md-12 class="estado"><span class="center">activa</span></col-md-12>
    </div>
    <h3 class="text-center">Últimos movimientos</h3>
    <div class="row tabla">
        <col-md-12 class="historial">
            <table id="tbl_movimientosbank" class="table">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Cuenta Origen</th>
                        <th>Cuenta Destino</th>
                        <th>Monto</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </col-md-12>
    </div>
</div>
