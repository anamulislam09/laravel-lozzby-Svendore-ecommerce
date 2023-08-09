@extends('layouts.admin')

@section('admin_content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

     <!-- Main content -->
     <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add Service Categhory</h3>
            <a href="{{ route('category.index') }}" class="btn btn-sm btn-primary" style="float:right">Categhory list</a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('store.category') }}" method="POST">
                @csrf
                <div class="mb-3 mt-3">
                    <label for="category_name" class="form-label">Service Category:</label>
                    <input type="text" class="form-control @error('category_name') is-invalid @enderror" value="{{ old('category_name') }}" name="category_name" id="category_name" placeholder="Enter Service Category">
                </div>
                @error('category_name')
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
