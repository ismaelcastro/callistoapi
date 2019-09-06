<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisitaMedico extends Model
{
    protected $table = "VisitaMedico";

    public function cliente(){
    	return $this->hasOne(Cliente::class, 'cdCliente', 'cdCliente');
    }
    public function visitacomercial(){
    	return $this->hasOne(VisitaCom::class, 'cd', 'cd');
    }
}
