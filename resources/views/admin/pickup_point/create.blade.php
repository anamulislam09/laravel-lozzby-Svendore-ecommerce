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
              <li class="breadcrumb-item active">create Pickup point</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Add Page</h3>
        <a href="{{ route('pickup_point.index') }}" class="btn btn-sm btn-primary" style="float:right">Page list</a>

      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form action="{{ route('store.pickup_point') }}" method="POST" id="add-form">
          @csrf
          <div class="mb-3 mt-3">
            <label for="pickup_point_name" class="form-label">Pickup point name :</label>
            <input type="text" class="form-control" value="{{ old('pickup_point_name') }}" name="pickup_point_name" placeholder="Pickup point name" required>
          </div>
          @error('pickup_point_name')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
                      
          <div class="mb-3 mt-3">
            <label for="pickup_point_address" class="form-label">pickup_point Address :</label>
            <input type="text" class="form-control" name="pickup_point_address" placeholder="Pickup point Address" required>
          </div>
      
      
          <div class="mb-3 mt-3">
            <label for="pickup_point_phone" class="form-label"> pickup_point Phone number :</label>
            <input type="text" class="form-control" value="{{ old('pickup_point_phone') }}" name="pickup_point_phone" placeholder="Pickup point name" required>
          </div>
          @error('pickup_point_phone')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
      
          <div class="mb-3 mt-3">
            <label for="pickup_point_phone_two" class="form-label">Another phone :</label>
            <input type="text" class="form-control" value="{{ old('pickup_point_phone_two') }}" placeholder="Another Phone number " name="pickup_point_phone_two">
          </div>
          @error('pickup_point_phone_two')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
      
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"> <span class="d-none loader"> <i class="fas fa-spinner pr-2"></i>Loading.... </span><span class="submit_btn">Submit</span></button>
      </div>
      </form>
      </div>
      <!-- /.content -->
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

      <script>
        // from submit loading
      $('#add-form').on('submit', function() {
        $('.loader').removeClass('d-none');
        $('.submit_btn').addClass('d-none');
      })

      </script>

  @endsection
