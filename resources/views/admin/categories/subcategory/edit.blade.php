<form action="{{ route('update.subcategory') }}" method="POST">
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
      <input type="text" class="form-control " value="{{ $data->subcategory_name }}" name="subcategory_name"
        placeholder="Enter subCategory">
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Update</button>
  </div>
</form>
