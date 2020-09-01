<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    protected $table= "kategori";
    protected $guarded = [];
    use SoftDeletes;


    const CREATED_AT = 'olusturma_tarihi';
    const UPDATED_AT = 'guncelleme_tarihi';
    const DELETED_AT = 'silinme_tarihi';

    public function ust_kategori()
    {
        return $this->belongsTo('App\Models\Kategori','ust_id')->withDefault([
            'kategori_adi' => 'Ana Kategori'
        ]);

    }

}
