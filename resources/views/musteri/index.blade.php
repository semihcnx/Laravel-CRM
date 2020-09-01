@extends('layouts.master')
@section('title','Müşteriler')
@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5>Müşteriler Listesi </h5>
                    @include('layouts.partials.error')
                    @include('layouts.partials.alert')
        </div>
        <div class="card-body">
            <div class="row align-items-center m-l-0">

                <div class="col-sm-6">
                    <form class="form-inline" method="POST" action="{{route('musteri')}}">
                        {{csrf_field()}}
                        <div class=" form-group">
                            <input class="form-control" type="search" name="aranan" id="aranan" placeholder="Müşteri Ad,Tc" value="{{old('aranan')}}">
                            <button type="submit" class="btn btn-success">Ara</button>
                            <a href="{{route('musteri')}}" class="btn btn-primary">Temizle</a>
                        </div>


                    </form>


                </div>

                <div class="col-sm-6 text-right">
                    <a href="{{route('musteri.yeni')}}" class="btn btn-success btn-sm mb-3 btn-round"><i class="feather icon-plus"></i> Müşteri Ekle</a>
                </div>
            </div>
            <div class="table-responsive">
                <table id="report-table" class="table table-bordered table-striped mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>İsim Soyisim</th>
                            <th>TC</th>
                            <th>Email</th>
                            <th>Bölge/Şehir</th>
                            <th>Telefon</th>
                            <th>Harita</th>
                            <th>Seçenekler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($listele)== 0 )
                        <tr>
                            <td colspan="8" class="text-center">Kayıt Bulunamadı.</td>
                        </tr>
                        @endif
                        @foreach($listele as $entry)
                        <tr>
                            <td>{{$entry->id}}</td>
                            <td>{{$entry->adsoyad}}</td>
                            <td>{{$entry->tcno}}</td>
                            <td>{{$entry->email}}</td>
                            <td>{{$entry->company_city}} / {{$entry->company_county}}</td>
                            <td>{{$entry->telefon}}</td>
                            <td><a target="_blank" href="{{$entry->googlemaps}}"><i style="font-size: 30px; cursor: pointer;" class="fas fa-map-marker-alt"></i></a></td>
                            <td>
                                <a href="{{route('musteri.duzenle',$entry->id)}}" class="btn btn-info btn-sm">Güncelle</a>
                                <a href="{{route('musteri.sil',$entry->id)}}" class="btn btn-danger btn-sm">Sil</a>
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
