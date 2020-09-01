<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::match(['get','post'],'/oturumac','KullaniciController@oturumac')->name('oturumac');
Route::get('/oturumkapat','KullaniciController@oturumkapat')->name('oturumkapat');

Route::group(['middleware' => 'yonetim'], function () {


    Route::get('/', 'AnasayfaController@index')->name('anasayfa');

    Route::group(['prefix' => 'musteri'], function () {
        Route::match(['get', 'post'], '/','MusteriController@index')->name('musteri');
        Route::get('/yeni','MusteriController@form')->name('musteri.yeni');
        Route::get('/duzenle/{id}','MusteriController@form')->name('musteri.duzenle');
        Route::post('/duzenle/{id?}','MusteriController@kaydet')->name('musteri.kaydet');
        Route::get('/sil/{id}','MusteriController@sil')->name('musteri.sil');
        Route::post('/get-counties', 'MusteriController@getCounties')->name('musteri.get-counties');
    });


    Route::group(['prefix' => 'kategori'], function () {
        Route::match(['get', 'post'], '/','KategoriController@index')->name('kategori');
        Route::get('/yeni','KategoriController@form')->name('kategori.yeni');
        Route::get('/duzenle/{id}','KategoriController@form')->name('kategori.duzenle');
        Route::post('/duzenle/{id?}','KategoriController@kaydet')->name('kategori.kaydet');
        Route::get('/sil/{id}','KategoriController@sil')->name('kategori.sil');
    });


    Route::group(['prefix' => 'kategori-ozellik'], function () {
        Route::match(['get', 'post'], '/','KategoriOzellikController@index')->name('kategori-ozellik');
        Route::get('/yeni','KategoriOzellikController@form')->name('kategori-ozellik.yeni');
        Route::get('/duzenle/{id}','KategoriOzellikController@form')->name('kategori-ozellik.duzenle');
        Route::post('/duzenle/{id?}','KategoriOzellikController@kaydet')->name('kategori-ozellik.kaydet');
        Route::get('/sil/{id}','KategoriOzellikController@sil')->name('kategori-ozellik.sil');
    });

    Route::group(['prefix' => 'urun'], function () {
        Route::match(['get', 'post'], '/','UrunController@index')->name('urun');
        Route::get('/yeni','UrunController@form')->name('urun.yeni');
        Route::get('/duzenle/{id}','UrunController@form')->name('urun.duzenle');
        Route::post('/duzenle/{id?}','UrunController@kaydet')->name('urun.kaydet');
        Route::get('/sil/{id}','UrunController@sil')->name('urun.sil');
    });



});
Route::post('/kategori-ozellik-getir','UrunController@KategoriOzellikGetir')->name("KategoriOzellikGetir");
Route::group(['prefix' => 'kullanici'], function () {
    Route::match(['get', 'post'], '/','KullaniciController@index')->name('kullanici');
    Route::get('/yeni','KullaniciController@form')->name('kullanici.yeni');
    Route::get('/duzenle/{id}','KullaniciController@form')->name('kullanici.duzenle');
    Route::post('/duzenle/{id?}','KullaniciController@kaydet')->name('kullanici.kaydet');
    Route::get('/sil/{id}','KullaniciController@sil')->name('kullanici.sil');
});

