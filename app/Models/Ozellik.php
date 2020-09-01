<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ozellik extends Model
{
    protected $table= "ozellik";
    protected $guarded = [];
    use SoftDeletes;


    const CREATED_AT = 'olusturma_tarihi';
    const UPDATED_AT = 'guncelleme_tarihi';
    const DELETED_AT = 'silinme_tarihi';

    // public function ozellikkategori()
    // {
    //     return $this->belongsToMany('App\Models\OzellikKategori','ozellik-kategori');

    // }

    // public function kategoriler()
    // {
    //     return $this->belongsTo('App\Models\OzellikKategori','ozellik-kategori')->withDefault();

    // }

    public function kategorilerim()
    {
        return $this->belongsToMany('App\Models\Kategori','ozellik-kategori');

    }

}
