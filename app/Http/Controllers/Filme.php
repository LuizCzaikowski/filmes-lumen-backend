<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        if(isset($request->nome)){
            $filme = new \App\Models\Filme();
            $filme->nome = $request->nome;
            $filme->save();
            return response($filme, 201, [
                'Content-Type' => 'application/json'
            ]);
        }
        return response([
            'error' => 'nome nao foi informado!'
        ], 404, [
            'Content-Type' => 'application/json'
        ]);
    }


}