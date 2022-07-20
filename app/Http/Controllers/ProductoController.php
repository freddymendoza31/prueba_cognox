<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductoModel;

use LDAP\Result;

class ProductoController extends Controller
{
    public function consultProductos()
    {
        $result = ProductoModel::all();
        echo json_encode($result);
    }

}
