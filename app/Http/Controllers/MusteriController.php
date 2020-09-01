<?php

namespace App\Http\Controllers;

use App\Models\City_Counties;
use App\Models\Musteri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MusteriController extends Controller
{
    public function index() {

       if(request()->filled('aranan'))
       {

           request()->flash();  //aranan değierin görünmesi için flashla sessiona alıyoruz
           $aranan= request('aranan');
           //Kullanıcı hem adsoyada göre hemde emaile göre arıyor
          $listele= Musteri::where('adsoyad','like',"%$aranan%")
          ->orWhere('tcno','like',"%$aranan%")
          ->orderByDesc('olusturma_tarihi')
          ->paginate(8) //Sayfalama yaptırma komutu
          ->appends('aranan',$aranan);  //sayfalama da 2. sayfanın doğru sayfalama yapması için ekledik

       }
       else {
           $listele= Musteri::orderByDesc('olusturma_tarihi')->paginate(8);
       }
       return view('musteri.index',compact('listele'));
    }

    public function form ($id =0 ) {

        $cities= City_Counties::groupBy('city')->get();

        $entry= new Musteri;

        if($id>0) {
            $entry = Musteri::find($id);
            }

        return view('musteri.form',compact('cities','entry'));

    }

    public function kaydet($id = 0) {

        $this->validate(request(),[
            'adsoyad' => 'required',
            'email' => 'required|email'

        ]);
            $data= request()->only('adsoyad','tcno','telefon','company_city','company_county','email','ceptelefonu','adres','resim','googlemaps');


            if ($id>0)
            {
                //Güncelle
                $entry= Musteri::where('id',$id)->firstOrFail();
                $entry->update($data);

            }

            else {
                $entry  = Musteri::create($data);
            }

            return redirect()->route('musteri.duzenle',$entry->id)
            ->with('mesaj',($id>0 ? 'Güncellendi' : 'Kaydedildi'))
            ->with('mesaj_tur','success');


    }
    public function sil($id)
    {
        $sil = Musteri::destroy($id);
        return redirect()->route('musteri')
        ->with('mesaj','Müşteri Silindi')
        ->with('mesaj_tur','success');
    }

    public function getCounties(Request $request){

        if($request->ajax()){

            $select = $request->get('select');
            $value = $request->get('value');
            $data = City_Counties::
                where($select, $value)
                ->get();
            $output = '<option value="">İlçe Seçiniz</option>';
            foreach($data as $row){
                $output .= '<option value="'.$row->county.'">'.$row->county.'</option>';
            }
            echo $output;
        }
    }

}
