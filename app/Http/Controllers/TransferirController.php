<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransferirModel;
use App\Http\Controllers\CuentasBancariasController;
use LDAP\Result;

class TransferirController extends Controller
{
    public function transferir(Request $request)
    {


        $insert = new transferirModel();
        $insert->cuenta_origen = $request->input('cuenta_origen');
        $insert->cuenta_destino = $request->input('cuenta_destino');
        $insert->saldo = $request->input('valor');
        $insert->user_id = auth()->id();
        $insert->id_cuenta_destino = $request->input('id_destino');
        $insert->save();

        if ($insert) {
            $result['saldo'] = cuentasBancariasController::resta($request->input('valor'), $request->input('cuenta_destino'), $request->input('cuenta_origen'));
            $result['error'] = false;
            $result['msj'] = 'Transferencia Exitosa...';
        } else {
            $result['error'] = true;
            $result['msj'] = 'No se pudo realizar la Transferencia';
        }

        echo json_encode($result);
    }

    public function init()
    {
        $result['data'] =  TransferirModel::all();
        echo json_encode($result);
    }
}
