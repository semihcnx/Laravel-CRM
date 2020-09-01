@extends('layouts.master')
@section('title','Kategori Özellik Form')
@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5>Kategori Özellik Formu</h5>
        </div>
        <div class="card-body">
            <div class="row align-items-center">

                    @include('layouts.partials.error')
                    @include('layouts.partials.alert')
                <form  class="form-v1" method="POST" action="{{route('kategori-ozellik.kaydet',$entry->id)}}">
                    {{csrf_field()}}
                    <div class="row">


                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label" for="ozellik_adi">Özellik Adı</label>
                            <input type="text" class="form-control" id="ozellik_adi" name="ozellik_adi" placeholder="" value="{{old('ozellik_adi',$entry->ozellik_adi)}}">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label" for="ust_id">Eklenecek Kategoriler</label>
                            <select id="ust_id" name="kategoriler[]" class="form-control" multiple>

                            @foreach ($anakategoriler as $kategori)
                            <option value="{{$kategori->id}}" {{collect(old('kategoriler',$urun_kategorileri))->contains($kategori->id) ? 'selected': ''}}>{{$kategori->kategori_adi}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>





                    <div class="col-sm-12 text-center ">
                        <button  class="btn btn-primary">Kaydet</button>
                    </div>


                    </div>



                </form>
            </div>
        </div>
    </div>
</div>



@endsection


