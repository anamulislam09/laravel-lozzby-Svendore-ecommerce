@extends('layouts.admin')

@section('admin_content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Admin Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
              <li class="breadcrumb-item active">Warehouse</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

     <!-- Main content -->
     <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add Warehouse</h3>
            <a href="{{ route('warehouse.index') }}" class="btn btn-sm btn-primary" style="float:right">Categhory list</a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('store.warehouse') }}" method="POST">
                @csrf
                <div class="mb-3 mt-3">
                    <label for="warehouse_name" class="form-label">Warehouse Name:</label>
                    <input type="text" class="form-control @error('warehouse_name') is-invalid @enderror" value="{{ old('warehouse_name') }}" name="warehouse_name" placeholder="Enter name">
                </div>
                @error('warehouse_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

                <div class="mb-3 mt-3">
                    <label for="warehouse_address" class="form-label">Warehouse Address:</label>
                    <textarea name="warehouse_address" id="" class="form-control"></textarea>

                </div>
                @error('warehouse_address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3 mt-3">
                <label for="warehouse_phone" class="form-label">Warehouse Contact number:</label>
                <input type="text" class="form-control @error('warehouse_phone') is-invalid @enderror" value="{{ old('warehouse_phone') }}" name="warehouse_phone" id="warehouse_phone" placeholder="Enter warehouse contuct number">
            </div>
            @error('warehouse_phone')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
            </form>
    </div>
    <!-- /.content -->
   
  </div>

  @endsection
