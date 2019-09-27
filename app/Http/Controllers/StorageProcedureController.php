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

    public function faturamentoTotal(){
       $faturamentoProel = $this->c123FaturamentoVtTotal(0, '01-09-2019', '30-09-2019');
       $faturamentoSH = $this->c123FaturamentoVtTotal(1, '01-09-2019', '30-09-2019');
       $faturamentoSelect = $this->c123FaturamentoVtTotal(3, '01-09-2019', '30-09-2019');
       $faturamentoRep = $this->c123FaturamentoVtTotal(2, '01-09-2019', '30-09-2019');

       return response()->json([
        'status' => 'sucess', 
        'faturamentoProel' => $faturamentoProel,
        'faturamentoSH' => $faturamentoSH,
        'faturamentoSelect' => $faturamentoSelect,
        'faturamentoRep' => $faturamentoRep,
        ]);
        
    }


    public function c123FaturamentoVtTotal($filial, $dtInicial, $dtFinal){

    	$params = [$filial,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1, $dtInicial, $dtFinal,"S", -1,-1,-1, "S"];
    	$faturamento = DB::select('SET NOCOUNT ON; EXEC dbo.spRelC123 ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?', $params);
    	
    	$totalFaturamento = 0;

    	foreach ($faturamento as $item ) {
    		$totalFaturamento = $totalFaturamento + $item->vlTotal;
    	}

        if($totalFaturamento){

            return $totalFaturamento;
        }else{
            return 'error';
        }
    	
    }
}
