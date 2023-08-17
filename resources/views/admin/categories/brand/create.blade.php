@extends('layouts.admin')

@section('admin_content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css"/>
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
              <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
              <li class="breadcrumb-item active">Brands</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

     <!-- Main content -->
     <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add new brand</h3>
            <a href="{{ route('brand.index') }}" class="btn btn-sm btn-primary" style="float:right">brand list</a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('store.brand') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 mt-3">
                    <label for="brand_name" class="form-label">Brand Name:</label>
                    <input type="text" class="form-control @error('brand_name') is-invalid @enderror" value="{{ old('brand_name') }}" name="brand_name" id="brand_name" placeholder="Enter brand name" required>
                </div>
                @error('brand_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        {{-- brnd logo --}}
                <div class="mb-3 mt-3">
                    <label for="brand_logo" class="form-label">Brand logo:</label>
                    <input type="file" class="dropify" data-height="200" id="input-file-now" name="brand_logo" required >

                </div>
                @error('brand_logo')
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js"></script>

  <script>
    $('.dropify').dropify()
  </script>

  @endsection
