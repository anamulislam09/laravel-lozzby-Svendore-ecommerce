@extends('layouts.admin')

@section('admin_content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ChildCategory Tables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">ChildCategory Tables</li>
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
                <h3 class="card-title">All ChildCategory list here</h3>
                <a href="{{route('childcategory.create')}}" class="btn btn-sm btn-primary create" style="float:right">Add
                  New</a>
              </div>
              <div class="card-body">
                <table id="dataTable" class="table table-bordered table-striped">

                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>  
    </section>
  </div>

  {{-- childcategory edit model --}}
  <!-- Modal -->
  <div class="modal fade" id="editchildCatModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit SubCategory </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="card-body">
          <form action="{{ route('update.childcategory') }}" method="POST">
              @csrf
              <input type="hidden" name="id" id="e_childcategory_id">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="category_id" class="form-label">Select Category:</label>
                    <select name="category_id" id="category"
                        class="form-control @error('subcategory_id') is-invalid @enderror" required>
                        <option value="" selected disabled>Select Once</option>
                        @foreach ($cats as $cat)
                        <option value="{{ $cat->id }}" @if ($cat->id == ('data.category_id')) selected @endif>{{ $cat->category_name }}</option>
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
                    </select>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <div class="mb-3 mt-3">
                  <label for="childcategory_name" class="form-label">Child Category:</label>
                  <input type="text" class="form-control" value="{{ old('childcategory_name')}}" name="childcategory_name" id="e_childcategory_name" placeholder="Enter childcategory">
              </div>
              @error('childcategory_name')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
      </div>
      <!-- /.card-body -->
      {{-- <div class="card-footer clearfix">
          <button type="submit" class="btn btn-primary">Submit</button>
      </div> --}}
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
  </form>

      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
 
 {{-- Datatable start here --}}
  <script>
    $(document).ready(function() {
        $('#dataTable').dataTable({
            stateSave: true,
            responsive: true,
            serverSide: true,
            processing: true,
            ajax: {
                url: "{{ route('childcategory.index') }}",
            },
            columns: [{
                    data: "DT_RowIndex",
                    title: "SL",
                    name: "DT_RowIndex",
                    searchable: false,
                    orderable: false
                },
                {
                    data: "childcategory_name",
                    title: "Childcategory Name",
                    searchable: true
                },
                {
                    data: "category_name",
                    title: "Category Name",
                    searchable: true
                },
                {
                    data: "subcategory_name",
                    title: "SubCategory Name",
                    searchable: true
                },
                {
                    data: "action",
                    title: "action",
                    orderable: false,
                    searchable: false
                },
            ],
        });
    })
</script>



{{-- edit childcategory using ajax --}}
<script>
  $(document).ready(function() {
    $("#category").change(function() {
      let categoryid = $(this).val();
      $("#subcategory").html('<option value="">Select One</option>')
      $.ajax({
        url: 'childcategory/subcategory',
        type: 'post',
        data: 'categoryid=' + categoryid + '&_token={{ csrf_token() }}',
        success: function(result) {
          $('#subcategory').html(result);
        }
      })
    })
  });
  </script>

{{-- update childcategory using ajax --}}
<script>
  $('body').on('click', '#edit', function(){
  let childcat_id = $(this).data('id');
  
  // console.log(childcat_id);
  $.get("/childcategory/edit/"+childcat_id,function(data){
    $('#e_childcategory_name').val(data.childcategory_name);
    $('#e_childcategory_id').val(data.id);
    
  })
})
</script>

@endsection
