<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        if(request()->filled('aranan') || request()->filled('ust_id'))
        {

            request()->flash();  //aranan değierin görünmesi için flashla sessiona alıyoruz
            $aranan= request('aranan');
            $ust_id = request('ust_id');
            //Kullanıcı hem adsoyada göre hemde emaile göre arıyor
            if(isset($ust_id) and $ust_id!=""){
           $listele= Kategori::with('ust_kategori')
           ->where('kategori_adi','like',"%$aranan%")
           ->Where('ust_id',$ust_id)
           ->orderByDesc('olusturma_tarihi')
           ->paginate(8) //Sayfalama yaptırma komutu
           ->appends(['aranan'=>$aranan,'ust_id'=>$ust_id]);  //sayfalama da 2. sayfanın doğru sayfalama yapması için ekledik
            }else{
                $listele= Kategori::with('ust_kategori')
                ->where('kategori_adi','like',"%$aranan%")
                ->orderByDesc('olusturma_tarihi')
                ->paginate(8) //Sayfalama yaptırma komutu
                ->appends(['aranan'=>$aranan,'ust_id'=>$ust_id]);  //sayfalama da 2. sayfanın doğru sayfalama yapması için ekledik
            }
        }
        else {
            request()->flush();  //input değerlerinin silinmesini sağlıyor
            $listele= Kategori::with('ust_kategori')->orderByDesc('olusturma_tarihi')->paginate(8);
        }

        $anakategoriler= Kategori::whereRaw('ust_id is null')->get();

        return view('kategori.index',compact('listele','anakategoriler'));
    }

    public function form($id = 0)
    {

        $entry= new Kategori();

        if ($id >0)
        {
            $entry= Kategori::find($id);
        }


        $kategoriler= Kategori::all();

        return view('kategori.form', compact('entry','kategoriler'));
    }

    public function kaydet($id = 0)
    {
        $data = request()->only('kategori_adi','slug','ust_id');   //only formdaki name ile db deki isim aynı ise kullanılır. Kısa yoldur.
        if (!request()->filled('slug'))
        {
            $data['slug'] =  str_slug(request('kategori_adi'));  //str_slug slug yaratmak için özel fonksyion
            request()->merge(['slug'=>$data['slug']]);    //data slug içindeki slug bilgsini kontrol yapabilmesi için merge ile requeste aktardık.
        }


        $this->validate(request(),[
            'kategori_adi'=>'required',
            'slug' =>(request('original_slug')!= request('slug') ? 'unique:kategori,slug' : '')
        ]);

        if($id >0)
        {
            //Güncelle
          $entry = Kategori::where('id',$id)->firstOrFail();
           $entry->update($data);
        }
        else
        {
            //Kaydet
            $entry=Kategori::create($data);
         }



        return redirect()->route('kategori.duzenle',$entry->id)
        ->with('mesaj',($id>0 ? 'Güncellendi' : 'Kaydedildi'))
        ->with('mesaj_tur','success');
    }

    public function sil($id)
    {
        //attach / detach   Many  To Many  veri yapısındaki tablolarda veri ekleme ve çıkarmak için kullanılır.

        $kategori= Kategori::find($id);
        //$kategori->urunler()->detach();   //silinen kategorideki ürünleride siliyor.
        $kategori->delete();

        $sil= Kategori::destroy($id);
        return redirect()->route('kategori')
        ->with('mesaj_tur','success')
        ->with('mesaj','Kayıt Silindi');
    }
}
