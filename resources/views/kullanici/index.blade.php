@extends('layouts.master')
@section('title','Kullanıcılar')
@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5>Kullanıcı Listesi </h5>
                    @include('layouts.partials.error')
                    @include('layouts.partials.alert')
        </div>
        <div class="card-body">
            <div class="row align-items-center m-l-0">

                <div class="col-sm-6">
                    <form class="form-inline" method="POST" action="{{route('kullanici')}}">
                        {{csrf_field()}}
                        <div class=" form-group">
                            <input class="form-control" type="search" name="aranan" id="aranan" placeholder="Kullanıcı Ad,Email" value="{{old('aranan')}}">
                            <button type="submit" class="btn btn-success">Ara</button>
                            <a href="{{route('kullanici')}}" class="btn btn-primary">Temizle</a>
                        </div>


                    </form>


                </div>

                <div class="col-sm-6 text-right">
                    <a href="{{route('kullanici.yeni')}}" class="btn btn-success btn-sm mb-3 btn-round"><i class="feather icon-plus"></i> Kullanıcı Ekle</a>
                </div>
            </div>
            <div class="table-responsive">
                <table id="report-table" class="table table-bordered table-striped mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>İsim Soyisim</th>
                            <th>Email</th>
                            <th>Aktif Mi</th>
                            <th>Yönetici Mi</th>
                            <th>Seçenekler</th>
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
                            <td>{{$entry->adsoyad}}</td>
                            <td>{{$entry->email}}</td>
                            <td>
                                @if ($entry->aktif_mi)
                                <span class="badge badge-success">Aktif</span>
                                @else
                                <span class="badge badge-warning">Pasif</span>
                                @endif
                            </td>
                            <td>
                            @if ($entry->yonetici_mi)
                            <span class="badge badge-success">Yönetici</span>
                            @else
                            <span class="badge badge-info">Kullanıcı</span>
                            @endif
                            </td>
                            <td>
                                <a href="{{route('kullanici.duzenle',$entry->id)}}" class="btn btn-info btn-sm">Güncelle</a>
                                <a href="{{route('kullanici.sil',$entry->id)}}" class="btn btn-danger btn-sm">Sil</a>
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
