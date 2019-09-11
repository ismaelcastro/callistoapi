<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'Cliente';

    public function visitaMedico(){
    	return $this->belongsTo(VisitaMedico::class, 'cdCliente');
    }

}
