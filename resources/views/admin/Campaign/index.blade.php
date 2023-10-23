@extends('layouts.admin')

@section('admin_content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Campaign Tables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
              <li class="breadcrumb-item active">Campaign List</li>
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
                <h3 class="card-title">All Brand list here</h3>
                <a href="{{ route('campaign.create') }}" class="btn btn-sm btn-primary create" style="float:right">Add
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
  <div class="modal fade" id="editcampaignModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Campaign </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         

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
          url: "{{ route('campaign.index') }}",
        },
        columns: [{
            data: "DT_RowIndex",
            title: "SL",
            name: "DT_RowIndex",
            searchable: false,
            orderable: false
          },
          {
            data: "title",
            title: "Title",
            searchable: true
          },
          {
            data: "start_date",
            title: "Start_date",
            searchable: true
          },
          {
            data: "end_date",
            title: "End_date",
            searchable: true
          },
          {
            data: "discount",
            title: "Discount",
            searchable: true
          },

          // show image using yajra datatable
          {
            "name": "image",
            "data": "image",
            "render": function(data, type, full, meta) {
              return "<img src=\"" + data + "\" height=\"50\"/>";
            },
            "title": "Image",
            "orderable": true,
            "searchable": true
          },
          {
            data: "status",
            title: "status",
            orderable: false,
            searchable: false
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


  {{-- update Campaign using ajax --}}
  <script>
    $('body').on('click', '#edit', function() {
      let campaign_id = $(this).data('id');

      // console.log(childcat_id);
      $.get("/campaign/edit/" + campaign_id, function(data) {

        $('.modal-body').html(data);
        // $('#e_title').val(data.title);
        // $('#e_start_date').val(data.start_date);
        // $('#e_end_date').val(data.end_date);
        // $('#e_discount').val(data.discount);
        // $('#e_status').val(data.status);
        // $('#e_image').val(data.image);
        // $('#e_campaign_id').val(data.id);

      })
    })
  </script>
@endsection
