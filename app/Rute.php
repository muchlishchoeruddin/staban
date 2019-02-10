<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rute extends Model
{
    //
    protected $primaryKey="id_rute";
    protected $guarded=["id_rute"];

    public function transportasi()
    {
    	return $this->belongsTo('App\Transportasi','id_transportasi','id_transportasi');
    }
}
