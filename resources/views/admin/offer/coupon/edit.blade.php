<form action="{{ route('store.coupon') }}" method="POST" id="edit-form">
    @csrf
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