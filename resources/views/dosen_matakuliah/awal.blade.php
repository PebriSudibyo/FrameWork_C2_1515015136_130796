@extends('master')
@section('container')
<div class="panel panel-default">
	<div class="panel-heading">
		<strong>Seluruh Data Jadwal Dosen Mengajar</strong>
		<a href="{{url('dosen_matakuliah/tambah')}}" class="btn btn-xs btn-primary pull-right">
			<i class="fa fa-plus"></i>Jadwal Dosen Mengajar
		</a>
		<div class="clearfix"></div>
	</div>
	<table class="table">
		<head>
			<tr>
				<th>No.</th>
				<th>ID Dosen</th>
				<th>ID Matakuliah</th>
				<th>Aksi</th>
			</tr>
		</head>
		<tbody>
			<?php $x=1; ?>
			@foreach($data as $dosen_matakuliah)
			<tr>
				<td>{{$x++}}</td>
				<td>{{$dosen_matakuliah->dosen_id or 'dosen_id kosong'}}</td>
				<td>{{$dosen_matakuliah->matakuliah_id or 'matakuliah_id kosong'}}</td>
				<td>
					<div class="btn-group" role="group">
						<a href="{{url('dosen_matakuliah/edit/'.$dosen_matakuliah->id)}}" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fa fa-pencil"></i></a>
						<a href="{{url('dosen_matakuliah/lihat/'.$dosen_matakuliah->id)}}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fa fa-eye"></i></a>
						<a href="{{url('dosen_matakuliah/hapus/'.$dosen_matakuliah->id)}}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-remove"></i></a>
					</div>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@stop