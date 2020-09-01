<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Ozellik;
use App\Models\OzellikKategori;
use Illuminate\Http\Request;

class KategoriOzellikController extends Controller
{
    public function index() {

        if(request()->filled('aranan'))
        {

            request()->flash();  //aranan değierin görünmesi için flashla sessiona alıyoruz
            $aranan= request('aranan');
            //Kullanıcı hem adsoyada göre hemde emaile göre arıyor
           $listele= Ozellik::where('ozellik_adi','like',"%$aranan%")
           ->orderByDesc('olusturma_tarihi')
           ->paginate(8) //Sayfalama yaptırma komutu
           ->appends('aranan',$aranan);  //sayfalama da 2. sayfanın doğru sayfalama yapması için ekledik

        }
        else {
            $listele= Ozellik::orderByDesc('olusturma_tarihi')->paginate(8);
        }
        return view('kategori-ozellik.index',compact('listele'));
     }

    public function form($id = 0)
    {

        $entry= new Ozellik();

        if ($id >0)
        {
            $entry= Ozellik::find($id);
        }



        $anakategoriler= Kategori::whereRaw('ust_id is null')->get();
        $urun_kategorileri= $entry->kategoriler()->pluck('kategori_id')->all();
        return view('kategori-ozellik.form', compact('entry','anakategoriler','urun_kategorileri'));
    }

    public function kaydet($id = 0) {

        $this->validate(request(),[
            'ozellik_adi' => 'required',


        ]);
            $data= request()->only('ozellik_adi');
            $kategoriler = request('kategoriler');

            if ($id>0)
            {
                //Güncelle
                $entry= Ozellik::where('id',$id)->firstOrFail();
                $entry->update($data);
                $entry->kategoriler()->sync($kategoriler);  // Kategori dizisinden gelene değerleri senkron ediyor.

            }

            else {
                $entry  = Ozellik::create($data);
                $entry->kategoriler()->attach($kategoriler);
            }

            return redirect()->route('kategori-ozellik.duzenle',$entry->id)
            ->with('mesaj',($id>0 ? 'Güncellendi' : 'Kaydedildi'))
            ->with('mesaj_tur','success');


    }

    public function sil($id)
    {
        $ozellik= Ozellik::find($id);
        // $sil= Ozellik::destroy($id);

        $ozellik->kategoriler()->detach();
        $ozellik->delete();
        return redirect()->route('kategori-ozellik')
        ->with('mesaj_tur','success')
        ->with('mesaj','Kayıt Silindi');
    }
}
