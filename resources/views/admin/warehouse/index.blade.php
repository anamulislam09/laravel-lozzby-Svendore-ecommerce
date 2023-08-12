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
              <li class="breadcrumb-item active">Warehouse</li>
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
                <h3 class="card-title">All Warehouse list here</h3>
                <a href="{{ route('warehouse.create') }}" class="btn btn-sm btn-primary" style="float:right">Add New</a>
              </div>

              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl</th>
                    <th>Warehouse Name</th>
                    <th>Warehouse Address</th>
                    <th>Conuct Number</th>
                    <th> Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($datas as $data)
                  <tr>
                    <td>{{$data->id}}</td>
                    <td>{{$data->warehouse_name}}</td>
                    <td>{{$data->warehouse_address}}</td>
                    <td>{{$data->warehouse_phone}}</td>
                    <td>
                        <a href="" class="btn btn-sm btn-info edit" data-id="{{$data->id}}" data-toggle="modal" data-target="#warehouseModel"><i class="fas fa-edit"></i></a>
                        <a href="{{ route('warehouse.delete', $data->id) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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
  <div class="modal fade" id="warehouseModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Category </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('update.warehouse') }}" method="POST" id="edit-form">
                @csrf
                <input type="hidden" name="id" id="e_warehouse_id">
                <div class="mb-3 mt-3">
                    <label for="warehouse_name" class="form-label">Warehouse Name:</label>
                    <input type="text" class="form-control @error('warehouse_name') is-invalid @enderror" value="{{ old('warehouse_name') }}" name="warehouse_name" id="e_warehouse_name">
                </div>
                @error('warehouse_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

                <div class="mb-3 mt-3">
                    <label for="warehouse_address" class="form-label">Warehouse Address:</label>
                    <textarea name="warehouse_address" id="e_warehouse_address" class="form-control"></textarea>

                </div>
                @error('warehouse_address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3 mt-3">
                <label for="warehouse_phone" class="form-label">Warehouse Contact number:</label>
                <input type="text" class="form-control @error('warehouse_phone') is-invalid @enderror" value="{{ old('warehouse_phone') }}" name="warehouse_phone" id="e_warehouse_phone">
            </div>
            @error('warehouse_phone')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary"> <span class="d-none loader"> <i class="fas fa-spinner pr-2"></i>Loading.... </span><span class="submit_btn">Update</span></button>
        </div>
    </form>
      </div>
    </div>
  </div>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
$('body').on('click', '.edit', function(){
  let ware_id = $(this).data('id');
  $.get("warehouse/edit/"+ware_id,function(data){
    $('#e_warehouse_name').val(data.warehouse_name);
    $('#e_warehouse_address').val(data.warehouse_address);
    $('#e_warehouse_phone').val(data.warehouse_phone);
    $('#e_warehouse_id').val(data.id);
    
  })
})

// from submit 
$('#edit-form').on('submit', function(){
    $('.loader').removeClass('d-none');
    $('.submit_btn').addClass('d-none');
})
  </script>

@endsection
