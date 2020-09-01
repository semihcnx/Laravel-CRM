<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OzellikKategori extends Model
{
    protected $table='ozellik-kategori';
    public $timestamps=false;
    protected $guarded=[];


    public function ozellik()
    {
        return $this->belongsTo('App\Models\Ozellik')->withDefault();

    }
}
