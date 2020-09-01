@extends('layouts.master')
@section('title','Kategori Form')
@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5>Kategori Formu</h5>
        </div>
        <div class="card-body">
            <div class="row align-items-center">

                    @include('layouts.partials.error')
                    @include('layouts.partials.alert')
                <form  class="form-v1" method="POST" action="{{route('kategori.kaydet',$entry->id)}}">
                    {{csrf_field()}}
                    <div class="row">


                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="floating-label" for="ust_id">Üst Kategori</label>
                            <select id="ust_id" name="ust_id" class="form-control">
                            <option value="">Ana Kategori</option>
                            @foreach ($kategoriler as $kategori)
                            <option value="{{$kategori->id}}">{{$kategori->kategori_adi}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="floating-label" for="kategori_adi">Kategori Adı</label>
                            <input type="text" class="form-control" id="kategori_adi" name="kategori_adi" placeholder="" value="{{old('kategori_adi',$entry->kategori_adi)}}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="floating-label" for="email">Slug</label>
                            <input type="hidden" name="original_slug" value="{{old('slug',$entry->slug)}}">
                            <input type="text" class="form-control" id="slug" name="slug" placeholder="" value="{{old('slug',$entry->slug)}}">
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


