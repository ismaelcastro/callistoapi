<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VisitaCom;
use App\VisitaMedico;
use Illuminate\Support\Facades\DB;

class VisitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visitas =  VisitaMedico::select('cdCliente', DB::raw('count(cdCliente) as q'))
            ->where('data','>=', '2019-01-06')
            ->where('data', '<=', '2019-30-06')
            ->groupBy('cdCliente')->get();

        $visitas_arr = [];

        foreach ($visitas as $v ) {
           $visita = array(
                'idCliente' => $v->cdCliente,
                'cliente' => $v->cliente->nmEntCli,
                'qtdV' => $v->q,
            );
           array_push($visitas_arr, $visita);            
        }
        
        return response()->json($visitas_arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
