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
              <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

     <!-- Main content -->
     <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add ChildCateghory</h3>
            <a href="{{ route('childcategory.index') }}" class="btn btn-sm btn-primary" style="float:right">ChildCateghory list</a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('store.childcategory') }}" method="POST">
                @csrf

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="category_id" class="form-label">Select Category:</label>
                      <select name="category_id" id="category"
                          class="form-control @error('subcategory_id') is-invalid @enderror" required>
                          <option value="" selected disabled>Select Once</option>
                          @foreach ($cats as $cat)
                          <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                        @endforeach    
                      </select>
                    </div>
                   
                    <!-- /.form-group -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="subcategory_id" class="form-label">Select SubCategory:</label>
                      <select name="subcategory_id" id="subcategory"
                          class="form-control @error('subcategory_id') is-invalid @enderror"required>
                          <option value="" selected disabled>Select Once</option>
                          {{-- @foreach ($subcats as $subcat)
                          <option value="{{ $subcat->id }}">{{ $subcat->subcategory_name }}</option>
                        @endforeach     --}}
                      </select>
                    </div>
    
                  </div>
                  <!-- /.col -->
                </div>


                <div class="mb-3 mt-3">
                    <label for="childcategory_name" class="form-label">Child Category:</label>
                    <input type="text" class="form-control @error('childcategory_name') is-invalid @enderror" value="{{ old('childcategory_name') }}" name="childcategory_name" id="childcategory_name" placeholder="Enter childcategory">
                </div>
                @error('childcategory_name')
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

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    {{-- create child category using ajax  --}}
  <script>
    $(document).ready(function() {
      $("#category").change(function() {
        let categoryid = $(this).val();
        $("#subcategory").html('<option value="">Select One</option>')
        $.ajax({
          url: '/childcategory/subcategory',
          type: 'post',
          data: 'categoryid=' + categoryid + '&_token={{ csrf_token() }}',
          success: function(result) {
            $('#subcategory').html(result);
          }
        })
      })


      // $("#district").change(function() {
      //   let uid = $(this).val();
      //   // alert(cid);
      //   $.ajax({
      //     url: '/getUpozilla',
      //     type: 'post',
      //     data: 'uid=' + uid + '&_token={{ csrf_token() }}',
      //     success: function(rs) {
      //       $('#upozilla').html(rs);
      //     }
      //   })
      // })

    });

  </script>

  @endsection
