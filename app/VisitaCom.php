<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisitaCom extends Model
{
    protected $table = 'VisitaCom';

    public function cliente(){
    	return $this->hasOne(Cliente::class, 'cdCliente', 'cdCliente');
    }
    public function visitamedico(){
    	return $this->belongsTo(VisitaMedico::class, 'cd', 'cd');
    }
}
