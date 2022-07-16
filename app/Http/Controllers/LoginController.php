<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
       
    }

    public function destroy()
    {
        auth()->logout();
        return redirect()->to('/');
    }
}
