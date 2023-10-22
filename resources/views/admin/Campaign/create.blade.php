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
              <li class="breadcrumb-item active">Campaign</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

     <!-- Main content -->
     <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add new Campaign</h3>
            <a href="{{ route('campaign.index') }}" class="btn btn-sm btn-primary" style="float:right">Campaign list</a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('store.campaign') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 mt-3">
                    <label for="title" class="form-label">Campaign title:</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" name="title" id="title" placeholder="Enter campaign title" required>
                </div>
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

             {{-- start date --}}
                <div class="mb-3 mt-3">
                    <label for="start_date" class="form-label">Start_date:</label>
                    <input type="date" class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date') }}" name="start_date" id="start_date"  required>
                </div>
                @error('start_date')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

             {{-- end date --}}
                <div class="mb-3 mt-3">
                    <label for="end_date" class="form-label">End_date:</label>
                    <input type="date" class="form-control @error('end_date') is-invalid @enderror" value="{{ old('end_date') }}" name="end_date" id="end_date">
                </div>
                @error('end_date')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="row mb-3 mt-3">
              {{-- Discount --}}
              <div class="col-lg-8 col-md-6 col-sm-12">
                <label for="discount" class="form-label">Discount(%) :</label>
                <input type="number" class="form-control @error('discount') is-invalid @enderror" value="{{ old('discount') }}" name="discount" id="discount">
            </div>
            @error('discount')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
            {{-- Status --}}
        <div class="p-4 col-lg-4 col-md-6 col-sm-12">
          <h6> Status</h6>
          <input type="checkbox" name="status" value="1" checked data-bootstrap-switch data-off-color="danger"
            data-on-color="success">
        </div>
              </div>


        {{-- image --}}
                <div class="mb-3 mt-3">
                    <label for="image" class="form-label"> Campaign Image:</label>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js"></script>
  <script src="{{ asset('backend/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>

 
    {{-- CHECKBOX  --}}
    <script>
      $('.dropify').dropify(); //dropify image 
      $("input[data-bootstrap-switch]").each(function() {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
      });
    </script>

  @endsection
