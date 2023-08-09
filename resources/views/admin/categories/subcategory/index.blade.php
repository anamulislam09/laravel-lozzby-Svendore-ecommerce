@extends('layouts.admin')

@section('admin_content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>SubCategory Tables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">SubCategory Tables</li>
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
                <h3 class="card-title">All SubCategory list here</h3>
                <a href="{{ route('subcategory.create') }}" class="btn btn-sm btn-primary" style="float:right">Add New</a>
              </div>

              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl</th>
                    <th>SubCategory Name</th>
                    <th>SubCategory Slug</th>
                    <th>Category Name</th>
                    <th> Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($subcats as $subcat)
                  <tr>
                    <td>{{$subcat->id}}</td>
                    <td>{{$subcat->subcategory_name}}</td>
                    <td>{{$subcat->subcategory_slug}}</td>
                    <td>{{$subcat->category_name}}</td>
                    <td>
                        <a href="" class="btn btn-sm btn-info edit" data-id="{{$subcat->id}}" data-toggle="modal" data-target="#editsubCatModel"><i class="fas fa-edit"></i></a>
                        <a href="{{ route('subcategory.delete', $subcat->id) }}"  class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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
  <div class="modal fade" id="editsubCatModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit SubCategory </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div id="modal_body">

        </div>
       
      </div>
    </div>
  </div>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>

$('body').on('click', '.edit', function(){
  let subcat_id = $(this).data('id');
  $.get("subcategory/edit/"+subcat_id,function(data){
    $('#modal_body').html(data);
    
  })
})

  </script> 

@endsection
