<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css"/>

<form action="{{ route('update.subcategory') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="id" value="{{$data->id}}">
  <div class="modal-body">
    <div class="mt-3">
      <label for="category_id" class="form-label">Select Category:</label>
      <select name="category_id" id="category_id" class="form-control @error('subcategory_id') is-invalid @enderror">
        <option value="" selected disabled>Select Once</option>
        @foreach ($cats as $cat)
          <option value="{{ $cat->id }}" @if ($cat->id == $data->category_id) selected @endif>{{ $cat->category_name }}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3 mt-3">
      <label for="subcategory_name" class="form-label"> SubCategory Name:</label>
      <input type="text" class="form-control" value="{{ $data->subcategory_name }}" name="subcategory_name"
        placeholder="Enter subCategory">
    </div>

     {{-- subcategory name --}}
     <div class="mb-3 mt-3">
       <label for="" class="form-label">Is home_page :</label>
      <select name="home_page" id="home_page" class="form-control">
        <option value="1" @if ($data->home_page==1)  selected @endif class="form-control">Active</option>
        <option value="0" @if ($data->home_page==0)  selected @endif class="form-control">Deactive</option>
      </select>
      </div>

     {{-- image --}}
     <div class="mb-3 mt-3">
      <label for="image" class="form-label"> SubCategory Image:</label>
      <input type="file" class="dropify" data-height="200" name="image">
      <input type="hidden" name="old_image" value="{{$data->image}}">
      <img src="{{$data->image}}" alt="" style="width: 80px">

    </div>

  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Update</button>
  </div>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" ></script>

<script>
  $('.dropify').dropify()
</script>
