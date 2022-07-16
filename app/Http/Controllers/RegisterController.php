<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterCreateRequest as RequestsRegisterCreateRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Requests\RegisterCreateRequest;
class RegisterController extends Controller
{
    public function registro()
    {
        return view('auth.registro');
    }
    
    public function create(Request $request )
    {
       
        $validar = User::whereCedulaOrEmail($request->input('cedula'), $request->input('email'))->first();
      
       
        if (empty($validar)) {
            $insert = new user();
            $insert->cedula= $request->input('cedula');
            $insert->name= $request->input('nombre');
            $insert->email= $request->input('email');
            $insert->password= $request->input('password');
            $insert->save();
            auth()->login($insert);
           // return redirect()->to('/');
           $result['error'] = false;
           $result['msj'] = 'Registro Exitoso, Iniciando sistema...';
           $result['url'] =  '/';
        }else {
            $result['error'] = true;
            $result['msj'] = 'Su Identificacion o Email ya se encuentra registrado en nuestra base de datos';   
        }
        
        echo json_encode($result);
    }

  
   
}
