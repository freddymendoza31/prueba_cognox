<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AgregarCtaBancariasModel;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CuentasBancariasController;

class AgregarCtaBancariasController extends Controller
{
    public function  createCtaBancarias(Request $request)
    {
        $validar = AgregarCtaBancariasModel::where("cuenta_destino", "=", $request->input('nuemeroCuenta'), "AND", "id_usuario_origen ", "=", Auth()->id())->first();

        if ($request->input('insProducto') == 2) {
            if (empty($validar)) {
                $insert = new AgregarCtaBancariasModel();
                $insert->cuenta_destino  = $request->input('nuemeroCuenta');
                $insert->id_usuario_destino = $request->input('insUser');
                $insert->id_usuario_origen = Auth()->id();
                $insert->save();

                $result['error'] = false;
                $result['msj'] = 'Registro Exitoso';
            } else {
                $result['error'] = true;
                $result['msj'] = 'Esta cuenta se  encuentra registrada en listas de terceros';
            }
        } elseif ($request->input('insProducto') == 1) {
      
            if (empty($validar)) {
                CuentasBancariasController::crearCuentabc($request);
                $insert = new AgregarCtaBancariasModel();
                $insert->cuenta_destino     = $request->input('nuemeroCuenta');
                $insert->id_usuario_destino = Auth()->id();
                $insert->id_usuario_origen  = Auth()->id();
                $insert->save();

                $result['error'] = false;
                $result['msj'] = 'Registro Exitoso';
            } else {
                $result['error'] = true;
                $result['msj'] = 'Esta cuenta se  encuentra registrada en listas de terceros';
            }
        }
        echo json_encode($result);
    }


}
