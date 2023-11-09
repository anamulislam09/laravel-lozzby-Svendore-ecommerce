@extends('layouts.admin')
@section('admin_content')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" />
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
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div>
    </section>


    <!-- Main content -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Add SubCategory</h3>
        <a href="{{ route('subcategory.index') }}" class="btn btn-sm btn-primary" style="float:right">SubCategory list</a>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form action="{{ route('store.subcategory') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="mt-3">
            <label for="category_id" class="form-label">Select Category:</label>
            <select name="category_id" id="category_id"
              class="form-control @error('subcategory_id') is-invalid @enderror">
              <option value="" selected disabled>Select Once</option>
              @foreach ($cats as $cat)
                <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
              @endforeach
            </select>
          </div>
          {{-- subcategory name --}}
          <div class="mb-3 mt-3">
            <label for="subcategory_name" class="form-label">SubCategory Name:</label>
            <input type="text" class="form-control @error('subcategory_name') is-invalid @enderror"
              value="{{ old('subcategory_name') }}" name="subcategory_name" id="subcategory_name"
              placeholder="Enter Subcategory Name">
          </div>
          @error('subcategory_name')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror

          {{-- subcategory home_page --}}
         

          <div class="mb-3 mt-3">
            <label for="" class="form-label">Is home_page :</label>
            <select name="home_page" id="home_page" class="form-control">
              <option value="" selected disabled>Select Once</option>
              <option value="1">Active</option>
              <option value="0">Deactive</option>
            </select>
          </div>



          {{-- subcategory image --}}
          <div class="mb-3 mt-3">
            <label for="image" class="form-label">Subcategory image:</label>
            <input type="file" class="dropify" data-height="200" id="input-file-now" name="image">
          </div>
          @error('image')
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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

  <script>
    $('.dropify').dropify()
  </script>
@endsection
