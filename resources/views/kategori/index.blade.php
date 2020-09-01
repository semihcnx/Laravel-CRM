@extends('layouts.master')
@section('title','Kategoriler')
@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5>Kategori Listesi </h5>
                    @include('layouts.partials.error')
                    @include('layouts.partials.alert')
        </div>
        <div class="card-body">
            <div class="row align-items-center m-l-0">

                <div class="col-sm-6">
                    <form class="form-inline" method="POST" action="{{route('kategori')}}">
                        {{csrf_field()}}
                        <div class=" form-group">
                            <input class="form-control" type="search" name="aranan" id="aranan" placeholder="Kategori Adı" value="{{old('aranan')}}">
                            <label for="ust_id">Üst Kategori:</label>
                            <select name="ust_id" class="form-control">
                            <option value="">Seçiniz</option>
                                @foreach ($anakategoriler as $kategori)
                                <option value="{{$kategori->id}}" {{old('ust_id')== $kategori->id ? 'selected' : ''}}>{{$kategori->kategori_adi}}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-success">Ara</button>
                            <a href="{{route('kategori')}}" class="btn btn-primary">Temizle</a>
                        </div>


                    </form>


                </div>

                <div class="col-sm-6 text-right">
                    <a href="{{route('kategori.yeni')}}" class="btn btn-success btn-sm mb-3 btn-round"><i class="feather icon-plus"></i> Kategori Ekle</a>
                </div>
            </div>
            <div class="table-responsive">
                <table id="report-table" class="table table-bordered table-striped mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Üst Kategori</th>
                            <th>Kategori Adı</th>
                            <th>Slug</th>
                            <th>Kayıt Tarihi</th>
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
                            <td>{{$entry->ust_kategori->kategori_adi}}</td>
                            <td>{{$entry->kategori_adi}}</td>
                            <td>{{$entry->slug}}</td>
                            <td>{{$entry->olusturma_tarihi->format('d/m/Y')}}</td>
                            <td>
                                <a href="{{route('kategori.duzenle',$entry->id)}}" class="btn btn-info btn-sm">Güncelle</a>
                                <a href="{{route('kategori.sil',$entry->id)}}" class="btn btn-danger btn-sm">Sil</a>
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
