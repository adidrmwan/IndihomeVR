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
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Action</th>
                </tr>
                </thead>
               
                <tbody>
                    @foreach ($all_users as $user )
                    <tr>    
                        <td>{{ $user['nama'] }}</td>
                        <td>{{ $user['fullname'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td>{{ $user['phone'] }}</td>
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
                <h4 class="modal-title">Add New User</h4>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{ route('user.store') }}">
                {!! csrf_field() !!}
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" placeholder="Nama" class="form-control" name="nama">
                    </div>
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" placeholder="Full Name" class="form-control" name="fullname">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" placeholder="Email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" placeholder="Password" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" placeholder="Phone" class="form-control" name="phone">
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