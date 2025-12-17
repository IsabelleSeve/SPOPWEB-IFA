<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;

class CadastrarController extends Controller
{
    //

    public function salvar(Request $request){
        $request->validate(
            [
            "nome" => "required|min:2|max:100",
            "sobrenome" => "required|"

        ],
        );

        $objeto = new registrar();
        $objeto->fill($request->all());
        $objeto->save();

        return view("Registro Salvo"); 

        // dd($request);
    }
}
