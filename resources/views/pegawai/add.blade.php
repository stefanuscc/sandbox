@extends('layouts.app')

@section('content')
<div class="container">
	@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif
<form method="post" action="{{ url('pegawai/save') }}">
	{{ csrf_field() }}
	<div class="form-group">
		<label>Nik</label>
		<input type="text" class="form-control" name="nik" placeholder="Nomor Nik" maxlength="10" value="{{ old('nik') }}" required>
	</div>
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama" placeholder="Nama" value="{{ old('nama') }}">
	</div>
	<div class="form-group">
		<label>Alamat</label>
		<input type="text" class="form-control" name="alamat" placeholder="Alamat" value="{{ old('alamat') }}">
	</div>
	<div class="form-group">
		<label>Jabatan</label>
		{{-- <input type="text" class="form-control" name="jabatan" placeholder="Jabatan" value="{{ old('jabatan') }}"> --}}

		<select name="jabatan_id" class="form-control">
			<option value="">(Pilih Salah Satu)</option>
			@foreach($jabatan as $item)
				<option value="{{ $item->id }}">{{ $item->nama }}</option>
			@endforeach
		</select>
	</div>
	<a class="btn btn-danger" href="{{ route('pegawai') }}">Batal</a>
	<button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
@endsection