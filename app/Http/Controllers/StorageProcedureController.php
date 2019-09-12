<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StorageProcedureController extends Controller
{
    public function c123_faturamento(){
    	$faturamento = DB::select(DB::raw('call dbo.spRelC123(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)', [0,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,"01/07/2019","31/07/2019","S",-1,-1,-1,"S"]));
    	dd($faturamento);
    }
}
