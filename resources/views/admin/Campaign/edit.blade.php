<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css"/>

<form action="{{ route('update.campaign') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$data->id}}">
    <div class="mb-3 mt-3">
      <label for="title" class="form-label">Campaign Name:</label>
      <input type="text" class="form-control" value="{{ $data->title}}" name="title">
    </div>
    @error($data->title)
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    {{-- start date --}}
    <div class="mb-3 mt-3">
      <label for="start_date" class="form-label">Start_date:</label>
      <input type="date" class="form-control @error('start_date') is-invalid @enderror"
        value="{{ $data->start_date }}" name="start_date" required>
    </div>
    @error($data->start_date)
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    {{-- end date --}}
    <div class="mb-3 mt-3">
      <label for="end_date" class="form-label">End_date:</label>
      <input type="date" class="form-control @error('end_date') is-invalid @enderror"
        value="{{ $data->end_date }}" name="end_date">
    </div>
    @error($data->end_date )
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="row mb-3 mt-3">
      {{-- Discount --}}
      <div class="col-lg-8 col-md-6 col-sm-12">
        <label for="discount" class="form-label">Discount(%) :</label>
        <input type="number" class="form-control @error('discount') is-invalid @enderror"
          value="{{ $data->discount }}" name="discount">
      </div>
      @error($data->discount)
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      {{-- Status --}}
      <div class="p-4 col-lg-4 col-md-6 col-sm-12">
        <h6> Status</h6>
        
        @if($data->status==1) <input type="checkbox" name="status" value="0" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
        @else
        <input type="checkbox" name="status" value="1" data-bootstrap-switch data-off-color="danger" data-on-color="success">
        @endif 
      </div>
    </div>


    {{-- image --}}
    <div class="mb-3 mt-3">
      <label for="image" class="form-label"> Campaign Image:</label>
      <input type="file" class="dropify" data-height="200" name="image">
      <input type="hidden" name="old_image" value="{{$data->image}}">
      <img src="{{$data->image}}" alt="" style="width: 80px">

    </div>
    @error($data->image)
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="modal-footer">
  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
  <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js"></script>
<script src="{{ asset('backend/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>


  {{-- CHECKBOX  --}}
  <script>
    $('.dropify').dropify(); //dropify image 
    $("input[data-bootstrap-switch]").each(function() {
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });
  </script>