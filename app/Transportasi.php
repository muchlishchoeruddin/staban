<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transportasi extends Model
{
    //
    protected $primaryKey = 'id_transportasi';
    protected $guarded = ['id_transportasi'];

    public function typetransportasi()
    {
    	return $this->belongsTo('App\Typetransportasi','id_tt','id_tt');
    }
}
