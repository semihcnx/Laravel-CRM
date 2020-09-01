@extends('layouts.master')
@section('title','Ürün Form')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5>Ürün Formu</h5>
        </div>
        <div class="card-body">
            <div class="row align-items-center">

                    @include('layouts.partials.error')
                    @include('layouts.partials.alert')
                <form  class="form-v1" method="POST" action="{{route('urun.kaydet',$entry->id)}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="floating-label" for="urun_adi">Ürün Adı</label>
                            <input type="text" class="form-control" id="urun_adi" name="urun_adi" placeholder="" value="{{old('urun_adi',$entry->urun_adi)}}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group fill">
                            <label class="floating-label" for="slug">Slug</label>
                            <input type="hidden" name="original_slug" value="{{old('slug',$entry->slug)}}">
                            <input type="text" class="form-control" id="slug" name="slug" placeholder="" value="{{old('slug',$entry->slug)}}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group fill">
                            <label class="floating-label" for="fiyati">Fiyatı</label>
                            <input type="text" class="form-control" id="fiyati" name="fiyati" placeholder="" value="{{old('fiyati',$entry->fiyati)}}">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group fill">
                            <label class="floating-label" for="stok">Stok Adedi</label>
                            <input type="text" class="form-control" id="stok" name="stok" placeholder="" value="{{old('stok',$entry->stok)}}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group fill">
                            <label class="floating-label" for="garanti">Garanti Süresi(Ay)</label>
                            <input type="text" class="form-control" id="garanti" name="garanti" placeholder="" value="{{old('garanti',$entry->garanti)}}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">

                            <label class="floating-label" for="resim">Resim</label>
                            <input type="file" class="form-control" id="resim" name="resim" placeholder="sdf">
                        </div>
                        @if($entry->resim!=null)

<img src="/uploads/urunler/{{$entry->resim}}" alt="" style="height:100px; margin-right:20px; " class="thumbnail pull-left">

@endif
                    </div>


                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label" for="aciklama">Ürün Açıklaması</label>
                            <textarea class="form-control" name="aciklama" id="aciklama" placeholder="Açıklama" >{{ old('aciklama',$entry->aciklama)}}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label" for="resim">Kategori</label>
                            <select class="form-control" name="kategoriler" id="kategoriler" >
                                <option value=""></option>
                                @foreach ($kategoriler as $kategori)
                                <option value="{{$kategori->id}}"
                                >{{$kategori->kategori_adi}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row ozellikler">

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

@section('footer')
<script>
    $(function(){
        $("select#kategoriler").change(function() {
            var id=$(this).val();

            $.ajax({
                url:"{{ route('KategoriOzellikGetir') }}",
                type:"POST",
                data:{
                    "id":id,
                    "_token": "{{ csrf_token() }}"

                },
                dataType:"html",
                success:function (e) {
                    $(".ozellik").remove();
                            $(".ozellikler").after(e)
                }

            });
        });

    })
</script>
@endsection
