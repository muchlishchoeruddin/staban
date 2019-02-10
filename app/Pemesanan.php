<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    //

    protected $primaryKey="id_pemesanan";
    protected $guarded=["id_pemesanan"];
    public $timestamps = false;

    public function rute()
    {
    	return $this->belongsTo('App\Rute','id_rute','id_rute');
    }
    public function user()
    {
    	return $this->belongsTo('App\User','id_user','id');
    }
}
