@extends('adminlte::page')

@section('title', 'Indihome VR')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                    Add Data Produk
            </button>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>Deskripsi</th>
                  <th>Harga</th>
                  <th>Path</th>
                  <th>Action</th>
                </tr>
                </thead>
               
                <tbody>
                    @foreach ($all_produks as $produk )
                    <tr>    
                        <td>{{ $produk['nama'] }}</td>
                        <td>{{ $produk['deskripsi'] }}</td>
                        <td>{{ $produk['harga'] }}</td>
                        <td>{{ $produk['path'] }}</td>
                        <td>Delete | Edit</td>
                    </tr>  
                    @endforeach  
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add New Product</h4>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{ route('produk.store') }}">
                {!! csrf_field() !!}
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" placeholder="Nama" class="form-control" name="nama">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" placeholder="Deskripsi" class="form-control" name="deskripsi">
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" placeholder="Harga" class="form-control" name="harga">
                    </div>
                    <div class="form-group">
                        <label>Path</label>
                        <input type="text" placeholder="Path" class="form-control" name="path">
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
            </div>
            <!-- /.modal-content -->
        </div>
    <!-- /.modal-dialog -->
    </div>
@stop