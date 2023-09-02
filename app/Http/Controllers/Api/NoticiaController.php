<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{

    public function index(){
        return response()->json(Noticia::all());

    }

    public function store(Request $request){

        $noticia = Noticia::create($request->all());
        return response()->json($noticia, 201);

    }

}