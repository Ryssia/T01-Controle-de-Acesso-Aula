<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller {

    public function index(){

        $noticias = Noticia::all();
        return response()->json($noticias,200);

    }

    public function store(Request $request){

        $novaNoticia = $request->all();
        $novaNoticia = Noticia::create($novaNoticia);
        return response()->json($novaNoticia, 201);
    }

    public function show(Noticia $noticia){

        return response()->json($noticia, 200);
    }

    public function update(Request $request, Noticia $noticia ){

        $noticia->titulo = $request->titulo;
        $noticia->descricao = $request->descricao;
        $noticia->user_id = $request->user_id;
        $noticia->save();
        return response()->json($noticia, 200);
    }

    public function destroy(Noticia $noticia){
        Noticia::destroy($noticia->id);
        return response()->noContent();
    }
}