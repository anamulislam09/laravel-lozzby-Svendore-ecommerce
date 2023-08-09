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
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">SMTP Mail</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

     <!-- Main content -->
     <div class="card">
        <div class="card-header">
            <h3 class="card-title">SMTP Mail Setting</h3>
            {{-- <a href="{{ route('brand.index') }}" class="btn btn-sm btn-primary" style="float:right">brand list</a> --}}

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('smtp.update',$smtp->id) }}" method="POST" >
                @csrf
                <div class="mb-3 mt-3">
                    <label for="mailer" class="form-label"> Mail Mailer:</label>
                    <input type="text" class="form-control" value="{{ $smtp->mailer }}" name="mailer" id="mailer" placeholder="Enter mail mailer">
                </div>  

                <div class="mb-3 mt-3">
                    <label for="host" class="form-label"> Mail host:</label>
                    <input type="text" class="form-control" value="{{ $smtp->host }}" name="host" id="host" placeholder="Mailer host">
                </div>  

                <div class="mb-3 mt-3">
                    <label for="port" class="form-label"> Mail port:</label>
                    <input type="text" class="form-control" value="{{ $smtp->port }}" name="port" id="port" placeholder="Mailer port">
                </div>

                <div class="mb-3 mt-3">
                    <label for="user_name" class="form-label"> Mail username:</label>
                    <input type="text" class="form-control" value="{{ $smtp->user_name }}" name="user_name" id="user_name" placeholder="Mailer user_name">
                </div>  

                <div class="mb-3 mt-3">
                    <label for="password" class="form-label">Mail Password:</label>
                    <input type="password" class="form-control" value="{{ $smtp->password }}" name="password" id="password" placeholder="Mailer password">
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js"></script>

  <script>
    $('.dropify').dropify()
  </script>

  @endsection
