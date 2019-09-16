<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Cache\CacheManager;

class StorageProcedureController extends Controller
{
    public function __construct(){
        header('Acess-Control-Allow-Origin: *');
    }
    public function c123_faturamento(Request $request){
    	
    	$filial = 0;
    	$dtInicial = '01-05-2019';
    	$dtFinal = '30-05-2019';

    	$params = [$filial,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1, $dtInicial, $dtFinal,"S", -1,-1,-1, "S"];
    	$faturamento = DB::select('SET NOCOUNT ON; EXEC dbo.spRelC123 ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?', $params);
    	
    	$totalFaturamento = 0;

    	foreach ($faturamento as $item ) {
    		$totalFaturamento = $totalFaturamento + $item->vlTotal;
    	}

        if($totalFaturamento){

            $response = [ 'status' => "success" ,'data' => $totalFaturamento];
        }else{
            $response = [ 'status' => "fail", 'data' => null];
        }

    	

        return response()->json($response);
    	
    }
}
