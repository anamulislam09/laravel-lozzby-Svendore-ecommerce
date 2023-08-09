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
    <section class="  content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All category list here</h3>
                <a href="{{ route('category.create') }}" class="btn btn-sm btn-primary" style="float:right">Add New</a>
              </div>

              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl</th>
                    <th>Category Name</th>
                    <th>Category Slug</th>
                    <th> Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($cats as $cat)
                  <tr>
                    <td>{{$cat->id}}</td>
                    <td>{{$cat->category_name}}</td>
                    <td>{{$cat->category_slug}}</td>
                    <td>
                        <a href="" class="btn btn-sm btn-info edit" data-id="{{$cat->id}}" data-toggle="modal" data-target="#editCatModel"><i class="fas fa-edit"></i></a>
                        <a href="{{ route('category.delete', $cat->id) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

   {{-- category edit model --}}
  <!-- Modal -->
  <div class="modal fade" id="editCatModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Category </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('update.category') }}" method="POST">
                @csrf
                <div class="mb-3 mt-3">
                    <label for="category_name" class="form-label">Service Category:</label>
                    <input type="text" class="form-control @error('category_name') is-invalid @enderror" value="{{ old('category_name') }}" name="category_name" id="e_category_name" placeholder="Enter Service Category">
                    <input type="hidden" name="id" id="e_category_id">
                </div>
                @error('category_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
      </div>
    </div>
  </div>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
$('body').on('click', '.edit', function(){
  let cat_id = $(this).data('id');
  $.get("category/edit/"+cat_id,function(data){
    $('#e_category_name').val(data.category_name);
    $('#e_category_id').val(data.id);
    
  })
})
  </script>

@endsection
