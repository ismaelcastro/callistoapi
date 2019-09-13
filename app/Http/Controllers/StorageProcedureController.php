<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StorageProcedureController extends Controller
{
    public function c123_faturamento(){
    
    	$params = [0,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1, '01-06-2019', '30-06-2019',"S", -1,-1,-1, "S"];
    	$faturamento = DB::select('SET NOCOUNT ON; EXEC dbo.spRelC123 ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?', $params);
    	dd($faturamento);
    	
    }
}
