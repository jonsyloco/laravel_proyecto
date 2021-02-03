<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function verPagina()
    {       
     
       return view('components.vista_prueba',['variable_1'=>'Hola mundo']);
    }
}
