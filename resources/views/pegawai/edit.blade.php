@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-16 col-md-offset-2">
			{{-- <div class="col-md-16"> --}}

				<div class="panel panel-default">
					<div class="panel-heading">Tambah Data</div>

					<div class="panel-body">
						@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
						</div>
						@endif
						<form method="post" action="{{ url('pegawai/update').'/'.$record->id }}">
							{{ csrf_field() }}
							<div class="form-group">
								<label>Nik</label>
								<input type="text" class="form-control" name="nik" value="{{ $record->nik }}" placeholder="Nomor Nik" required="">
							</div>
							<div class="form-group">
								<label>Nama</label>
								<input type="texte" class="form-control" name="nama" value="{{ $record->nama }}" placeholder="Nama" required="">
							</div>
							<div class="form-group">
								<label>Alamat</label>
								<input type="text" class="form-control" name="alamat" value="{{ $record->alamat }}" placeholder="Alamat" required="">
							</div>
							<div class="form-group">
								<label>Jabatan</label>

								<select name="jabatan_id" class="form-control">
									<option value="">(Pilih Salah Satu)</option>
									@foreach($jabatan as $item)
										<option value="{{ $item->id }}" @if($item->id == $record->jabatan_id) selected @endif>
											{{ $item->nama }}
										</option>
									@endforeach
								</select>
							</div>
                            <a  class="btn btn-danger" href="{{ route('pegawai') }}">Batal</a>
							<button type="submit" class="btn btn-primary">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection
