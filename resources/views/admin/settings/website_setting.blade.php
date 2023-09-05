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
              <li class="breadcrumb-item active">website setting </li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Your website Settings</h3>

      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form action="{{ route('website_setting.update', $data->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3 mt-3">
            <label for="meta_title" class="form-label">Currency :</label>
            <select class="form-control" name="currency" id="">
              <option value="" selected disabled>Select One</option>
              <option value="৳" @if ($data->phone_one == '৳') @endif>Taka</option>
              <option value="$" @if ($data->phone_two == '$') @endif>Doller</option>
            </select>
          </div>

          <div class="mb-3 mt-3">
            <label for="phone_one" class="form-label">Phone:</label>
            <input type="text" class="form-control" value="{{ $data->phone_one }}" name="phone_one"
              id="phone_one" required>
          </div>

          <div class="mb-3 mt-3">
            <label for="phone_two" class="form-label"> Another phone :</label>
            <input type="text" class="form-control" value="{{ $data->phone_two }}" name="phone_two" id="phone_two">
          </div>

          <div class="mb-3 mt-3">
            <label for="main_email" class="form-label"> Email :</label>
            <input type="email" class="form-control" value="{{ $data->main_email }}" name="main_email"
              id="main_email" required>

          </div>
       
          <div class="mb-3 mt-3">
            <label for="support_email" class="form-label"> Another Email:</label>
            <input type="email" class="form-control" value="{{ $data->support_email }}" name="support_email"
              id="support_email">
          </div>

          <div class="mb-3 mt-3">
            <label for="address" class="form-label"> Website Address :</label>
            <textarea name="" id="" class="form-control" cols="" rows="" ></textarea>
          </div>

          <strong class="text-center"> ----Logo & Favicon---- </strong>

          <div class="mb-3 mt-3">
            <label for="logo" class="form-label"> Sight Logo :</label>
            <input type="file" class="form-control" name="logo" >
            <input type="hidden" class="form-control" value="{{ $data->logo }}" name="old_logo" required>
          </div>

          <div class="mb-3 mt-3">
            <label for="favicon" class="form-label"> Sight favicon :</label>
            <input type="file" class="form-control" name="favicon" >
            <input type="hidden" class="form-control" value="{{ $data->favicon }}" name="old_favicon" required>
          </div>

          <strong class="text-center m-auto"> ----Social Link---- </strong>


          <div class="mb-3 mt-3">
            <label for="facebook" class="form-label"> facebook :</label>
            <input type="link" class="form-control" value="{{ $data->facebook }}" name="facebook"
              id="facebook" >
          </div>

          <div class="mb-3 mt-3">
            <label for="twitter" class="form-label"> twitter :</label>
            <input type="link" class="form-control" value="{{ $data->twitter }}" name="twitter"
              id="twitter" >
          </div>
          
          <div class="mb-3 mt-3">
            <label for="instagram" class="form-label"> instagram :</label>
            <input type="link" class="form-control" value="{{ $data->instagram }}" name="instagram"
              id="instagram" >
          </div>

          <div class="mb-3 mt-3">
            <label for="linkedin" class="form-label"> linkedin :</label>
            <input type="link" class="form-control" value="{{ $data->linkedin }}" name="linkedin"
              id="linkedin" >
          </div>

          <div class="mb-3 mt-3">
            <label for="youtube" class="form-label"> youtube :</label>
            <input type="link" class="form-control" value="{{ $data->youtube }}" name="youtube"
              id="youtube" >
          </div>

      </div>
      <!-- /.card-body -->
      <div class="card-footer clearfix">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>
    <!-- /.content -->

  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
    integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js"></script>

  <script>
    $('.dropify').dropify()
  </script>
@endsection
