@extends('layouts.master')
@section('title','Kullanıcı Form')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5>Kullanıcı Formu</h5>
        </div>
        <div class="card-body">
            <div class="row align-items-center">

                    @include('layouts.partials.error')
                    @include('layouts.partials.alert')
                <form  class="form-v1" method="POST" action="{{route('kullanici.kaydet',$entry->id)}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="floating-label" for="adsoyad">Ad Soyad</label>
                            <input type="text" class="form-control" id="adsoyad" name="adsoyad" placeholder="" value="{{old('adsoyad',$entry->adsoyad)}}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group fill">
                            <label class="floating-label" for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="" value="{{old('email',$entry->email)}}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="floating-label" for="resim">Resim</label>
                            <input type="file" class="form-control" id="resim" name="resim" placeholder="sdf" value="{{old('resim',$entry->resim)}}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="floating-label" for="password">Şifre</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="">
                        </div>
                    </div>
                    <div class="checkbox col-sm-4" >
                        <label>
                            <input type="hidden" value="0" name="aktif_mi">
                            <input type="checkbox" name="aktif_mi" value="1"  {{old('aktif_mi',$entry->aktif_mi) ? 'checked' : ''}}> Aktif Mi?
                        </label>
                    </div>

                    <div class="checkbox col-sm-4" >
                        <label>
                        <input type="hidden" value="0" name="yonetici_mi">
                            <input type="checkbox" name="yonetici_mi" value="1"  {{old('yonetici_mi',$entry->yonetici_mi) ? 'checked' : ''}}> Yönetici Mi?
                        </label>
                    </div>

                    <div class="col-sm-12 text-center ">
                        <button  class="btn btn-primary">Kaydet</button>
                        <button class="btn btn-danger">Sil</button>
                    </div>
                    </div>



                </form>
            </div>
        </div>
    </div>
</div>



@endsection


