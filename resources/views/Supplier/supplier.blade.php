@extends('layouts.layout')
@section('content')
@include('sweetalert::alert')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Supplier</h1>
                </div>
            </div><hr>
            <div class="card">
                <div class="card-header py-3" align="right">
                    <button class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus"></i>Tambah</button>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Kode Supplier</th>
                                <th>Nama Supplier</th>
                                <th>Alamat</th>
                                <th>No.Telepon/Hp/Kantor</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($supplier as $supp)
                        <tr>
                            <td>{{ $supp->kd_supp}}</td>
                            <td>{{ $supp->nm_supp}}</td>
                            <td>{{ $supp->alamat}}</td>
                            <td>{{ $supp->telepon}}</td>
                            <td align="center"><a href="{{ route('supplier.edit',[$supp->kd_supp])}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                <i class="fas fa-edit fa-sm text-white-50"></i> Edit</a>
                                    <a href="/supplier/hapus/{{$supp->kd_supp}}" onclick="return confirm('Yakin Ingin Menghapus Data?')" class="d-nine d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                <i class="fas fa-trash-alt fa-sm text-white-50"></i> Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal add data -->
<div class="modal fade" id="modal-add" tabindex="_1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="model-tittle" id="exampleModalScrollableTitle">Tambah Data Supplier</h5>
                <button type="button" class="close" data-dismis="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ action('SupplierController@store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleFormControllInput1">Kode Supplier</label>
                        <input type="text" name="addkdsupp" id="addkdsupp" class="form-control" maxlenght="5" id="exampleFormControllInput1">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControllInput1">Nama Supplier</label>
                        <input type="text" name="addnmsupp" id="addnmsupp" id="addnmsupp" class="form-control" id="exampleFormControlInput1">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControllInput1">Alamat</label>
                        <input type="text" name="addalamat" id="addalamat" class="form-control" id="exampleFormControlInput1">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Telepon</label>
                        <input type="text" name="addtelepon" id="addtelepon" class="form-control" id="exampleFormControlInput1">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> Tutup</button>
                    <input type="submit" class="btn btn-primary btn-send" value="Simpan">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection




