<?php

namespace App\Http\Controllers;

use App\Models\Kullanici;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class KullaniciController extends Controller
{


    public function oturumac()
    {

        if(request()->isMethod('POST')) {

            $this->validate(request(),[
                'email' =>'required|email',
                'password'=>'required'
            ]);

            $credentials = [
                'email' => request()->get('email'),
                'password' =>request()->get('password'),
                'yonetici_mi' => 1,
                'aktif_mi'=>    1
            ];


                if (Auth::guard('yonetici')->attempt($credentials))
                {
                    return redirect()->route('anasayfa');
                }

                else {
                    return back()->withInput()->withErrors(['email'=>'Giriş Hatalı!!']);

                }
        }

        return view('oturumac');
    }


    public function oturumkapat(){
        Auth::guard('yonetici')->logout();
        session()->flush();
        session()->regenerate();
        return redirect()->route('oturumac');
    }

    public function index()
    {
        if(request()->filled('aranan'))
        {

            request()->flash();  //aranan değierin görünmesi için flashla sessiona alıyoruz
            $aranan= request('aranan');
            //Kullanıcı hem adsoyada göre hemde emaile göre arıyor
           $listele= Kullanici::where('adsoyad','like',"%$aranan%")
           ->orWhere('email','like',"%$aranan%")
           ->orderByDesc('olusturma_tarihi')
           ->paginate(8) //Sayfalama yaptırma komutu
           ->appends('aranan',$aranan);  //sayfalama da 2. sayfanın doğru sayfalama yapması için ekledik

        }
        else {
            $listele= Kullanici::orderByDesc('olusturma_tarihi')->paginate(8);
        }


        return view('kullanici.index',compact('listele'));
    }

    public function form($id = 0)
    {

        $entry= new Kullanici;

        if ($id >0)
        {
            $entry= Kullanici::find($id);
        }
        return view('kullanici.form', compact('entry'));
    }

    public function kaydet($id = 0)
    {
        $this->validate(request(),[
            'adsoyad'=>'required',
            'email'=>'required|email'
        ]);
            $data = request()->only('adsoyad','email');   //only formdaki name ile db deki isim aynı ise kullanılır. Kısa yoldur.

        if(request()->filled('password'))
        {
            $data['password'] = Hash::make(request('password'));
        }
            $data['aktif_mi'] = request()->has('aktif_mi') && request('aktif_mi')==1 ? 1 : 0;
            $data['yonetici_mi'] = request()->has('yonetici_mi')  && request('yonetici_mi')==1 ? 1 : 0;

        if($id >0)
        {
            //Güncelle
          $entry = Kullanici::where('id',$id)->firstOrFail();
           $entry->update($data);
        }
        else
        {
            //Kaydet
            $entry=Kullanici::create($data);
         }



        return redirect()->route('kullanici.duzenle',$entry->id)
        ->with('mesaj',($id>0 ? 'Güncellendi' : 'Kaydedildi'))
        ->with('mesaj_tur','success');
    }

    public function sil($id)
    {
        $sil= Kullanici::destroy($id);
        return redirect()->route('kullanici')
        ->with('mesaj_tur','success')
        ->with('mesaj','Kayıt Silindi');
    }
}
