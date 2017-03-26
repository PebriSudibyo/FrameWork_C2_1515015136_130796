@extends('master')
@section('container')
<div class="panel panel-default">
	<div class="panel-heading">
		<strong>Seluruh Data Dosen</strong>
		<a href="{{url('dosen/tambah')}}" class="btn btn-xs btn-primary pull-right">
			<i class="fa fa-plus"></i>dosen
		</a>
		<div class="clearfix"></div>
	</div>
	<table class="table">
		<head>
			<tr>
				<th>No.</th>
				<th>Nama</th>
				<th>Nip</th>
				<th>Alamat</th>
				<th>ID Pengguna</th>
				<th>Aksi</th>
			</tr>
		</head>
		<tbody>
			<?php $x=1; ?>
			@foreach($data as $dosen)
			<tr>
				<td>{{$x++}}</td>
				<td>{{$dosen->nama or 'nama kosong'}}</td>
				<td>{{$dosen->nip or 'nip kosong'}}</td>
				<td>{{$dosen->alamat or 'alamat kosong'}}</td>
				<td>{{$dosen->pengguna_id or 'pengguna_id kosong'}}</td>
				<td>
					<div class="btn-group" role="group">
						<a href="{{url('dosen/edit/'.$dosen->id)}}" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fa fa-pencil"></i></a>
						<a href="{{url('dosen/lihat/'.$dosen->id)}}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fa fa-eye"></i></a>
						<a href="{{url('dosen/hapus/'.$dosen->id)}}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-remove"></i></a>
					</div>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@stop