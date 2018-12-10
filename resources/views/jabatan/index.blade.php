@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- <div class="col-md-16 col-md-offset-2"> -->
        <div class="col-md-16">

            <div class="panel panel-default">
                <div class="panel-heading">Dashboard
				<div align="right"><a href="{{ url('jabatan/add') }}" class="ui positive button" style="margin: 2px"><i class="plus icon"></i> Tambah Data</a></div>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form  class="form-inline" action="{{ route('jabatan') }}" method="get">
						<div class="form-group">
							<label class="sr-only">Nama Jabatan</label>
							<input type="text" class="form-control" name="nama" 
								   placeholder="Nama Jabatan" 
								   value="{{ old('nama') }}">
						</div>
						<div class="form-group">
							<label class="sr-only">Nama Pegawai</label>
							<input type="text" class="form-control" name="pegawai" 
								   placeholder="Nama Pegawai" 
								   value="{{ old('pegawai') }}">
						</div>

						<button type="submit" class="btn btn-primary">Cari</button>
                    </form>
		
					<table class="table">
					  <thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Nama Jabatan</th>
					      <th scope="col">Jumlah Pegawai</th>
					      <th scope="col">Nama-nama Pegawai</th>
					      <th scope="col">Aksi</th>
					    </tr>
					  </thead>
					  <tbody>
					  	 <?php $i = 1; ?>
					  	 @foreach($records as $row)	
					    <tr>
					      <th scope="row">{{ $i }}</th>
					      <td>{{ $row->nama }}</td>
					      <td>{{ $row->pegawai->count() }}</td>
					      <td>
							@if($row->pegawai->count() > 0)
								@foreach ($row->pegawai as $pegawai)
									{{ $pegawai->nama }}, 
								@endforeach
							@endif
					      </td>
					      <td>
							  <a href="{{ url('jabatan/edit',$row->id) }}" class="ui positive button" style="margin: 2px"><i class="plus icon"></i> Ubah</a>||
							  <a href="{{ url('jabatan/destroy',$row->id) }}" class="ui positive button" style="margin: 2px"><i class="plus icon"></i> Hapus</a>
					      </td>
					    </tr>
					    <?php $i++; ?>
					  	@endforeach 
					  </tbody>
					</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
