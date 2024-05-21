<?php

namespace App\Http\Controllers;

use App\Models\Supplyer;
use Illuminate\Http\Request;

class SupplyerController extends Controller
{
    //
    public function index(){

        $Supplyers=Supplyer :: get();
        return response()->json(["status"=>"success","data"=>$Supplyers]);
    }
}
