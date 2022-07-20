<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CuentasBancariasModel;
use Illuminate\Support\Facades\Auth;

use LDAP\Result;

class CuentasBancariasController extends Controller
{
    public function consultCuentas(Request $request)
    {
        if ($request->id == 1) {
            $result = CuentasBancariasModel::where("tipo_producto", "=", $request->id)
                ->where('nombre', 'like', '%Ahorro a la mano%')->get();
        } else {
            $result = CuentasBancariasModel::where("tipo_producto", "=", $request->id)->get();
        }

        echo json_encode($result);
    }

    public function cuentaOrigen()
    {

        $result = CuentasBancariasModel::where('nombre', 'like', '%bancolombia%')
            ->where('user_id', '=', auth()->id())->get();
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
        return($result);
    }

    public static function crearCuentabc($request){
                $insert = new CuentasBancariasModel();
                $insert->nombre  = $request->input('nombreEntidad');
                $insert->cuenta  = $request->input('nuemeroCuenta');
                $insert->saldo   = 0;
                $insert->estado  = 1;
                $insert->user_id  = Auth()->id();
                $insert->tipo_producto = $request->input('insProducto');
                $insert->save();
    }
}
