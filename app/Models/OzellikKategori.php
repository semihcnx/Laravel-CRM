<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OzellikKategori extends Model
{
    protected $table='ozellik-kategori';
    public $timestamps=false;
    protected $guarded=[];


    // public function kategoriler()
    // {
    //     return $this->belongsToMany('App\Models\OzellikKategori',"ozellik-kategori")->withDefault();

    // }
    public function ozellik()
    {
        return $this->belongsTo('App\Models\Ozellik')->withDefault();

    }
}
