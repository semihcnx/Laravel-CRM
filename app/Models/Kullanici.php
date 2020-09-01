<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Kullanici extends Authenticatable

{
    protected $table="kullanici";
    protected $fillable = ['adsoyad', 'email', 'password','aktif_mi','yonetici_mi'];
    protected $hidden = ['password'];
    use SoftDeletes;


    const CREATED_AT = 'olusturma_tarihi';
    const UPDATED_AT = 'guncelleme_tarihi';
    const DELETED_AT = 'silinme_tarihi';
}
