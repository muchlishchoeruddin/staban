<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    //
    protected $primaryKey = 'id_notifikasi';
    protected $guarded = [];

    public function pemesanan()
    {
    	return $this->hasOne('App\Pemesanan','id_pemesanan','id_pemesanan');
    }
    public function user()
    {
    	return $this->belongsTo('App\User','id_user','id');
    }
}
