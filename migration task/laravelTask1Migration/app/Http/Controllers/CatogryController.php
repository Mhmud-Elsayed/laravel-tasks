<?php

namespace App\Http\Controllers;

use App\Models\Catogry;
use Illuminate\Http\Request;

class CatogryController extends Controller
{
    //
    public function index(){

        $Catogries=Catogry:: get();
        return response()->json(["status"=>"success","data"=>$Catogries]);
    }
}
