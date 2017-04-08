@extends('master')
@section('container')
<div class="panel panel-default">
	<div class="panel-heading">
		<strong>Seluruh Data Jadwal Matakuliah</strong>
		<a href="{{url('jadwal_matakuliah/tambah')}}" class="btn btn-xs btn-primary pull-right">
			<i class="fa fa-plus"></i>Jadwal Matakuliah
		</a>
		<div class="clearfix"></div>
	</div>
	<table class="table">
		<head>
			<tr>
				<th>No.</th>
				<th>Nama Mahasiswa</th>
				<th>NIM Mahasiswa</th>
				<th>Nama Matakuliah</th>
				<th>Aksi</th>
			</tr>
		</head>
		<body>
			<?php $x=1; ?>
			@foreach($semuaJadwalMatakuliah as $jadwal_matakuliah)
			<tr>
				<td>{{$x++}}</td>
				<td>{{$jadwal_matakuliah->mahasiswa->nama or 'nama kosong'}}</td>
				<td>{{$jadwal_matakuliah->mahasiswa->nim or 'nim kosong'}}</td>
				<td>{{$jadwal_matakuliah->dosen_matakuliah->matakuliah->title or 'matakuliah kosong'}}</td>
				<td>
					<div class="btn-group" role="group">
						<a href="{{url('jadwal_matakuliah/edit/'.$jadwal_matakuliah->id)}}" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fa fa-pencil"></i></a>
						<a href="{{url('jadwal_matakuliah/lihat/'.$jadwal_matakuliah->id)}}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fa fa-eye"></i></a>
						<a href="{{url('jadwal_matakuliah/hapus/'.$jadwal_matakuliah->id)}}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-remove"></i></a>
					</div>
				</td>
			</tr>
			@endforeach
		</body>
	</table>
</div>
@stop