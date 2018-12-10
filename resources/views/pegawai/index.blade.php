@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- <div class="col-md-16 col-md-offset-2"> -->
        <div class="col-md-16">

            <div class="panel panel-default">
                <div class="panel-heading">Dashboard
				<div align="right"><a href="{{ url('pegawai/add') }}" class="ui positive button" style="margin: 2px"><i class="plus icon"></i> Tambah Data</a></div>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form  class="form-inline" action="{{ route('pegawai') }}" method="get">
						<div class="form-group">
							<label class="sr-only">Nik</label>
							<input type="text" class="form-control" name="nik" 
								   placeholder="Nomor Nik"
								   value="{{ old('nik') }}">
						</div>
						<div class="form-group">
							<label class="sr-only">Nama</label>
							<input type="text" class="form-control" name="nama" 
								   placeholder="Nama" 
								   value="{{ old('nama') }}">
						</div>

						<button type="submit" class="btn btn-primary">Cari</button>
                    </form>

					@if ($records->count() > 0)
					<table class="table">
					  <thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Nik</th>
					      <th scope="col">Nama</th>
					      <th scope="col">Jabatan</th>
					      <th scope="col">Alamat</th>
					      <th scope="col">Aksi</th>
					    </tr>
					  </thead>
					  <tbody>
					  	 <?php $i = 1; ?>
					  	 @foreach($records as $row)	
					    <tr>
					      <th scope="row">{{ $i }}</th>
					      <td>{{ $row->nik }}</td>
					      <td>{{ $row->nama }}</td>
					      <td>{{ $row->jabatan->nama or '-' }}</td>
					      <td>{{ $row->alamat }}</td>
					      <td>
							  <a href="{{ url('pegawai/edit',$row->id) }}" class="ui positive button" style="margin: 2px"><i class="plus icon"></i> Ubah</a>||
							  <a href="{{ url('pegawai/destroy',$row->id) }}" class="ui positive button" style="margin: 2px"><i class="plus icon"></i> Hapus</a>
					      </td>
					    </tr>
					    <?php $i++; ?>
					  	@endforeach 
					  </tbody>
					</table>
					<div class="text-center">
						Menampilkan Halaman {{$records->currentPage()}} ({{$records->perPage()}} dari {{ $records->total() }})
					</div>
					<div class="text-center">
						{!! $records->links() !!}
					</div>
					@else
					<h4>-- Data tidak ada --</h4>	{{-- expr --}}
					@endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
