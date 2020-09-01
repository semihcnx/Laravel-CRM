@extends('layouts.master')
@section('title','Müşteriler Form')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5>Müşteri Formu</h5>
        </div>
        <div class="card-body">
            <div class="row align-items-center">

                    @include('layouts.partials.error')
                    @include('layouts.partials.alert')
                <form  class="form-v1" method="POST" action="{{route('musteri.kaydet',$entry->id)}}" enctype="multipart/form-data">
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
                        <div class="form-group fill">
                            <label class="floating-label" for="tcno">TC Kimlik Numarası</label>
                            <input type="text" class="form-control" id="tcno" name="tcno" placeholder="" value="{{old('tcno',$entry->tcno)}}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="floating-label" for="telefon">Telefon 1</label>
                            <input type="text" class="form-control" id="telefon" name="telefon" placeholder="" value="{{old('telefon',$entry->telefon)}}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="floating-label" for="ceptelefonu">Telefon 2</label>
                            <input type="text" class="form-control" id="ceptelefonu" name="ceptelefonu" placeholder="" value="{{old('ceptelefonu',$entry->ceptelefonu)}}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="floating-label" for="resim">Resim</label>
                            <input type="file" class="form-control" id="resim" name="resim" placeholder="sdf" value="{{old('resim',$entry->resim)}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                    <label class="floating-label" for="city">İl</label>
                            <select class="form-control" id="city" name="company_city">
                            <option value="{{old('company_city',$entry->company_city) !='' ? old('company_city',$entry->company_city) : '' }}">{{old('company_city',$entry->company_city) !='' ? old('company_city',$entry->company_city) : 'İl Seçiniz' }}</option>
                                @foreach ($cities as $city )
                                <option value="{{$city->city}}">{{$city->city}}</option>
                               @endforeach
                            </select>
                            <label class="floating-label" for="county">İlçe</label>
                            <select class="form-control" id="county" name="company_county">
                            <option value="{{old('company_county',$entry->company_county) !='' ? old('company_county',$entry->company_county) : '' }}">{{ old('company_county',$entry->company_county)}}</option>

                            </select>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label" for="adres">Adres</label>
                            <textarea class="form-control" id="adres"  name="adres" rows="5">{{old('adres',$entry->adres)}}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label" for="googlemaps">Google Maps</label>
                            <input type="text" class="form-control" id="googlemaps" name="googlemaps" placeholder="" value="{{old('googlemaps',$entry->googlemaps)}}">
                        </div>
                    </div>

                    <div class="col-sm-6 text-right ">
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
	$(document).ready(function(){
		$('#city').change(function(){
			if($(this).val() != ''){
				var select = $(this).attr("id");
				var value = $(this).val();
				var _token = $('input[name="_token"]').val();
				$.ajax({
					url:"{{ route('musteri.get-counties') }}",
					method:"POST",
					data:{select:select, value:value, '_token':_token},
					success:function(result){
						$('#county').html(result);
					}
				})
			}
		});
	});
</script>
@endsection
