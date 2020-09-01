@extends('layouts.master')
@section('title','Ürünler')
@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5>Ürün Listesi </h5>
                    @include('layouts.partials.error')
                    @include('layouts.partials.alert')
        </div>
        <div class="card-body">
            <div class="row align-items-center m-l-0">

                <div class="col-sm-6">
                    <form class="form-inline" method="POST" action="{{route('urun')}}">
                        {{csrf_field()}}
                        <div class=" form-group">
                            <input class="form-control" type="search" name="aranan" id="aranan" placeholder="Ürün Adı, Açıklama" value="{{old('aranan')}}">
                            <button type="submit" class="btn btn-success">Ara</button>
                            <a href="{{route('urun')}}" class="btn btn-primary">Temizle</a>
                        </div>


                    </form>


                </div>

                <div class="col-sm-6 text-right">
                    <a href="{{route('urun.yeni')}}" class="btn btn-success btn-sm mb-3 btn-round"><i class="feather icon-plus"></i> Ürün Ekle</a>
                </div>
            </div>
            <div class="table-responsive">
                <table id="report-table" class="table table-bordered table-striped mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Resim</th>
                            <th>Ürün Adı</th>
                            <th>Slug</th>
                            <th>Fiyatı</th>
                            <th>Stok Adedi</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($listele)== 0 )
                        <tr>
                            <td colspan="6" class="text-center">Kayıt Bulunamadı.</td>
                        </tr>
                        @endif
                        @foreach($listele as $entry)
                        <tr>
                            <td>{{$entry->id}}</td>
                            <td><img src="{{ $entry->resim!=null ?
                                asset('uploads/urunler/'. $entry->resim) :
                                'http://via.placeholder.com/400x400?text=UrunResmi' }}" style="width: 120px;" class="img-responsive"></td>
                            <td>{{$entry->urun_adi}}</td>
                            <td>{{$entry->slug}}</td>
                            <td>{{$entry->fiyati}}</td>
                            <td>{{$entry->stok}}</td>
                            <td>
                                <a href="{{route('urun.duzenle',$entry->id)}}" class="btn btn-info btn-sm">Güncelle</a>
                                <a href="{{route('urun.sil',$entry->id)}}" class="btn btn-danger btn-sm">Sil</a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                {{$listele->links()}}
            </div>
        </div>
    </div>
</div>

@endsection
