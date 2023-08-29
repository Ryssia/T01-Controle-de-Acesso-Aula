<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Requests;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class PapeisController extends Controller
{
    public function index(){
        $roles = Role::all();
        return view('viewsControleAcesso.papeis', compact('roles'));
    }

    public function create(){
        echo "create";
    }
}
