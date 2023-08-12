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
              <li class="breadcrumb-item active">OnPage Seo</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

     <!-- Main content -->
     <div class="card">
        <div class="card-header">
            <h3 class="card-title">Your Seo Settings</h3>
            {{-- <a href="{{ route('brand.index') }}" class="btn btn-sm btn-primary" style="float:right">brand list</a> --}}

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('seo.update',$data->id) }}" method="POST" >
                @csrf
                <div class="mb-3 mt-3">
                    <label for="meta_title" class="form-label"> Meta title:</label>
                    <input type="text" class="form-control" value="{{ $data->meta_title }}" name="meta_title" id="meta_title" placeholder="Meta title">
                </div>  

                <div class="mb-3 mt-3">
                    <label for="meta_author" class="form-label"> Meta Author:</label>
                    <input type="text" class="form-control" value="{{ $data->meta_author }}" name="meta_author" id="meta_author" placeholder="Meta Author">
                </div>  

                <div class="mb-3 mt-3">
                    <label for="meta_tag" class="form-label"> Meta tags:</label>
                    <input type="text" class="form-control" value="{{ $data->meta_tag }}" name="meta_tag" id="meta_tag" placeholder="Meta tags">
                </div>  

                <div class="mb-3 mt-3">
                    <label for="meta_keyword" class="form-label"> Meta keyword:</label>
                    <input type="text" class="form-control" value="{{$data->meta_keyword }}" name="meta_keyword" id="meta_keyword" placeholder="Meta keyword">
                    <small>Example:ecommerc,online shop,online market</small>
                </div> 
                <strong class="text-center"> ---Others---- </strong> 

                <div class="mb-3 mt-3">
                    <label for="google_verification" class="form-label"> Google verification :</label>
                    <input type="text" class="form-control" value="{{ $data->google_verification }}" name="google_verification" id="google_verification" placeholder="Google verification">
                    <small>Put here only verification code</small>
                </div>  

                <div class="mb-3 mt-3">
                    <label for="alexa_verification" class="form-label"> Alexa verification :</label>
                    <input type="text" class="form-control" value="{{ $data->alexa_verification }}" name="alexa_verification" id="alexa_verification" placeholder="Alexa verification">
                    <small>Put here only verification code</small>
                </div>  

                <div class="mb-3 mt-3">
                    <label for="meta_description" class="form-label"> Meta description :</label>
                <textarea name="meta_description" id="meta_description" class="form-control">{{$data->meta_description}}</textarea>
                </div>  

                <div class="mb-3 mt-3">
                    <label for="google_analytics" class="form-label"> Google analytics :</label>
                <textarea name="google_analytics" id="google_analytics" class="form-control">{{$data->google_analytics}}</textarea>
                </div>  

                <div class="mb-3 mt-3">
                    <label for="google_adsense" class="form-label"> Google adsense :</label>
                <textarea name="google_adsense" id="google_adsense" class="form-control">{{$data->google_adsense}}</textarea>
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
