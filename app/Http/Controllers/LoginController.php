<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\LoginModel;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CuentasBancariasModel;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }

    public function home(){
        return redirect('/');
    }

    public function loginsession(Request $request){

        if (Auth()->attempt(Request(['cedula', 'password'])) == false) {

            $result['error'] = true;
            $result['msj'] = 'Contraseña o cédula son incorrectos';

        }else{

            $result['error'] = false;
            $result['msj'] = 'Iniciando sistema...';
            $result['url'] =  '/';

        }

        echo json_encode($result);
        LoginController::usuario();

    }

    public function destroy()
    {
        auth()->logout();
        return redirect()->to('/');
    }

    public static function allUSer(){
       $user = LoginModel::select('users.id','users.name','cuentas_bancarias.cuenta','cuentas_bancarias.estado')
       ->leftjoin('cuentas_bancarias', 'users.id', '=', 'cuentas_bancarias.user_id')
       ->where('users.id', '<>', Auth()->id())->get();

       echo json_encode($user);
    }

    public function usuario(){
        $user = LoginModel::where('id',Auth()->id())->first();
        Session::put(['sessionName' =>  $user->name]);
    }
}
