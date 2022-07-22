<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CuentasBancariasModel;
use App\Models\User;
use App\Http\Controllers\AgregarCtaBancariasController;
use Illuminate\Support\Facades\Auth;

use LDAP\Result;

class CuentasBancariasController extends Controller
{
    public function consultCuentas(Request $request)
    {
        $result = User::find(Auth::user()->id);

        if ($request->id == 2) {
            // terceros
            $data['terceros'] = $result->registradas;
        } elseif ($request->id == 1) {
            // propias
            $data['propias'] = $result->misCuentas;
        }
        echo json_encode($data);
    }

    public function cuentaOrigen()
    {

        $result = CuentasBancariasModel::where([
                "user_id"=> auth()->id(),
                "tipo_producto"=> 1]) ->first();
        echo json_encode($result);
    }

    public static function resta($valor, $Cuenta_destino, $cuenta_origen)
    {

        $resultDestino = CuentasBancariasModel::where('cuenta', '=', $Cuenta_destino)->first();
        $result = CuentasBancariasModel::where('cuenta', '=', $cuenta_origen)->first();

        $result->saldo = $result->saldo - $valor;
        $resultDestino->saldo = $resultDestino->saldo + $valor;

        $result->save();
        $resultDestino->save();
        return ($result);
    }

    public static function crearCuentabc(Request $request)
    {
        $result = CuentasBancariasModel::where("user_id", Auth()->id())->first();

        if (empty($result)) {
            $insert = new CuentasBancariasModel();
            $insert->nombre  = $request->input('nombreEntidad');
            $insert->cuenta  = $request->input('nuemeroCuenta');
            $insert->saldo   = 500000;
            $insert->estado  = 1;
            $insert->user_id  = Auth()->id();
            $insert->tipo_producto = 1;
            $insert->save();
        }else{
            $insert = new CuentasBancariasModel();
            $insert->nombre  = $request->input('nombreEntidad');
            $insert->cuenta  = $request->input('nuemeroCuenta');
            $insert->saldo   = 0;
            $insert->estado  = 1;
            $insert->user_id  = Auth()->id();
            $insert->tipo_producto = 2;
            $insert->save();
        }
    }
}
