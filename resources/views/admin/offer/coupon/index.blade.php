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
              <li class="breadcrumb-item active">Coupon List</li>
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
                <h3 class="card-title">All Coupon list here</h3>
                <a href="{{route('coupon.create')}}" class="btn btn-sm btn-primary" style="float:right">Add
                  New</a>
              </div>
              <div class="card-body">
                <table id="dataTable" class="table table-bordered table-striped">

                  <tbody>
                    <form action="" method="delete" id="deleted_form">
                      @csrf @method('DELETE')
                    </form>
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
    <div class="modal fade" id="editCouponModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Brand </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="card-body">
            <form action="{{ route('update.coupon') }}" method="POST" id="edit-form">
              @csrf
              <input type="hidden" name="id" id="e_coupon_id">
              <div class="mb-3 mt-3">
                <label for="coupon_code" class="form-label">Coupon Code :</label>
                <input type="text" class="form-control" value="{{ old('coupon_code') }}" id="e_coupon_code" name="coupon_code" required>
              </div>
              @error('coupon_code')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
                          
              <div class="mb-3 mt-3">
                <label for="valid_date" class="form-label">valid_date :</label>
                <input type="date" class="form-control" name="valid_date" id="e_valid_date">
              </div>
          
              <div class="mb-3 mt-3">
                <label for="type" class="form-label">Coupon type :</label>
                  <select name="type" id="e_type" class="form-control">
                    <option value="" selected disabled>Selece Once</option>
                    <option value="1">Fixed</option>
                  <option value="2">Percentage</option>
                  </select>
              </div>
          
              <div class="mb-3 mt-3">
                <label for="coupon_amount" class="form-label"> Coupon amount :</label>
                <input type="text" class="form-control" value="{{ old('coupon_amount') }}" name="coupon_amount" id="e_coupon_amount">
              </div>
              @error('coupon_amount')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
          
              <div class="mb-3 mt-3">
                <label for="type" class="form-label">Coupon status :</label>
                  <select name="status" id="e_status" class="form-control">
                    <option value="" selected disabled>Selece Once</option>
                    <option value="Active">Active</option>
                  <option value="Inactive">Inactive</option>
                  </select>
              </div>
          
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
            url: "{{ route('coupon.index') }}",
          },
          columns: [{
              data: "DT_RowIndex",
              title: "SL",
              name: "DT_RowIndex",
              searchable: false,
              orderable: false
            },
            {
              data: "coupon_code",
              title: "Coupon Code ",
              searchable: true
            },
            {
              data: "valid_date",
              title: "Valid date",
              searchable: true
            },
            {
              data: "type",
              title: "Coupon type",
              searchable: true
            },
            {
              data: "coupon_amount",
              title: "Coupon Amount",
              searchable: true
            },
            {
              data: "status",
              title: "Coupon Status",
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
        let coupon_id = $(this).data('id');
        // console.log(childcat_id);
        $.get("/coupon/edit/" + coupon_id, function(data) {
          $('#e_coupon_code').val(data.coupon_code);
          $('#e_valid_date').val(data.valid_date);
          $('#e_type').val(data.type);
          $('#e_coupon_amount').val(data.coupon_amount);
          $('#e_status').val(data.status);
          $('#e_coupon_id').val(data.id);

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
