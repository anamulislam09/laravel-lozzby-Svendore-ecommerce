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
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
              <li class="breadcrumb-item active">Pickup Point</li>
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
                <h3 class="card-title">All Pickup Point list here</h3>
                <a href="{{route('pickup_point.create')}}" class="btn btn-sm btn-primary" style="float:right">Add
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


    {{-- Coupon edit model --}}
    <!-- Modal -->
    <div class="modal fade" id="editPickupModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit pickup_point </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="card-body">
            <form action="{{ route('update.pickup_point') }}" method="POST" id="edit-form">
              @csrf
              <input type="hidden" name="id" id="e_pickup_id">
              <div class="mb-3 mt-3">
                <label for="pickup_point_name" class="form-label">Pickup point name :</label>
                <input type="text" class="form-control" value="{{ old('pickup_point_name') }}" id="e_pickup_point_name" name="pickup_point_name" required>
              </div>
              @error('pickup_point_name')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
                          
              <div class="mb-3 mt-3">
                <label for="pickup_point_address" class="form-label">pickup_point Address :</label>
                <input type="text" class="form-control" name="pickup_point_address" id="e_pickup_point_address" value="{{ old('pickup_point_address') }}" required>
              </div>
    
              <div class="mb-3 mt-3">
                <label for="pickup_point_phone" class="form-label"> pickup_point Phone number :</label>
                <input type="text" class="form-control" value="{{ old('pickup_point_phone') }}" id="e_pickup_point_phone" name="pickup_point_phone" required>
              </div>
              @error('pickup_point_phone')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
          
              <div class="mb-3 mt-3">
                <label for="pickup_point_phone_two" class="form-label">Another phone :</label>
                <input type="text" class="form-control" value="{{ old('pickup_point_phone_two') }}" id="e_pickup_point_phone_two" name="pickup_point_phone_two">
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
      </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    {{-- Datatable start here --}}
    <script>
      $(document).ready(function() {
        let table = $('#dataTable').dataTable({
          stateSave: true,
          responsive: true,
          serverSide: true,
          processing: true,
          ajax: {
            url: "{{ route('pickup_point.index') }}",
          },
          columns: [{
              data: "DT_RowIndex",
              title: "SL",
              name: "DT_RowIndex",
              searchable: false,
              orderable: false
            },
            {
              data: "pickup_point_name",
              title: "Pickup_point_name",
              searchable: true
            },
            {
              data: "pickup_point_address",
              title: "Pickup_point_address",
              searchable: true
            },
            {
              data: "pickup_point_phone",
              title: "Pickup_point_phone",
              searchable: true
            },
            {
              data: "pickup_point_phone_two",
              title: "Pickup_point_phone_two",
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

    {{-- update coupon using ajax --}}
    <script>
      // from submit loading
      $('#edit-form').on('submit', function() {
        $('.loader').removeClass('d-none');
        $('.submit_btn').addClass('d-none');
      })

 // update date using ajax
      $('body').on('click', '#edit', function() {
       var pickup_id = $(this).data('id');
        // console.log(pickup_id);
        $.get("pickupPoint/edit/" + pickup_id, function(data) {
          $('#e_pickup_point_name').val(data.pickup_point_name);
          $('#e_pickup_point_address').val(data.pickup_point_address);
          $('#e_pickup_point_phone').val(data.pickup_point_phone);
          $('#e_pickup_point_phone_two').val(data.pickup_point_phone_two);
          $('#e_pickup_id').val(data.id);

        })
      })


      // delete date using ajax

      $(document).ready(function() {
        $(document).on('click', '#delete_coupon', function(e) {
          e.preventDefault();
          var url = $(this).attr('href');
          $("#deleted_form").attr('action', url);
          Swal.fire({
            title: 'Are you sure?',
            type: "error",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            confirmButtonClass: 'btn-danger',

          }).then(function(willDelete) {
            if (willDelete) {
              $("#deleted_form").submit();
            } else {
              Swal('Your date is safe!');
            }
          });
        });

        // data pass through here 
        $('#deleted_form').submit(function(e) {
          e.preventDefault();
          var url = $(this).attr('action');
          var request = $(this).serialize();
          $.ajax({
            url: url,
            type: POST,
            data: request,
            success: function(data) {
              toastr.success(data);
              $('#deleted_form')[0].reset();
              table.ajax.reload();
            }
          });
        });
      });
    </script>
  @endsection
