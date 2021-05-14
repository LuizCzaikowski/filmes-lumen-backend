<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

header("Access-Control-Allow-Headers: Authorization, Content-Type");
header("Access-Control-Allow-Origin: *");
header('content-type: application/json; charset=utf-8');

class filme extends Controller{
    
    public function lista($id = null){
        if($id){
            $filme = \App\Models\Filme::find($id);
        }else{
            $filme = \App\Models\Filme::all();
        }
        return response($filme, 200, [
            'Content-Type' => 'application/json'
        ]);
    }

    public function create(Request $request){
            $filme = new \App\Models\Filme();
            $filme->Nome = $request->Nome;
            $filme->Nota = $request->Nota;
            $filme->Ano = $request->Ano;
            $filme->save();
    }

    public function update(Request $request, $id){
        if(isset($id)){
            $filme = \App\Models\Filme::find($id);
            $filme->Nome = $request->Nome;
            $filme->Nota = $request->Nota;
            $filme->Ano = $request->Ano;
            $filme->save();
            return response($filme, 200, [
                'Content-Type' => 'application/json'
            ]);
        }
        return response([
            'error' => 'Nome da aula ou id nao foi informado!'
        ], 404, [
            'Content-Type' => 'application/json'
        ]);
    }

    public function destroy($id){
        if($id){
            $filme = \App\Models\Filme::find($id);
            $filme->delete();
            return response($filme, 200, [               //resposta true, retorna 1, $aula retorna o objeto deletado
                'Content-Type' => 'application/json'
            ]);
        }
        return response([
            'error' => 'id nao foi informado!'
        ], 404, [
            'Content-Type' => 'application/json'
        ]);
    }

}