
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
              <li class="breadcrumb-item active">create pags</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Add Page</h3>
        <a href="{{ route('page.index') }}" class="btn btn-sm btn-primary" style="float:right">Page list</a>

      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form action="{{ route('store.coupon') }}" method="POST">
          @csrf
          <div class="mb-3 mt-3">
            <label for="coupon_code" class="form-label">Coupon Code :</label>
            <input type="text" class="form-control" value="{{ old('coupon_code') }}" name="coupon_code" placeholder="Enter childcategory" required>
          </div>
          @error('coupon_code')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
                      
          <div class="mb-3 mt-3">
            <label for="valid_date" class="form-label">valid_date :</label>
            <input type="date" class="form-control" name="valid_date" placeholder="Enter childcategory" required>
          </div>
      
          <div class="mb-3 mt-3">
            <label for="type" class="form-label">Coupon type :</label>
              <select name="type" id="" class="form-control">
                <option value="" selected disabled>Selece Once</option>
                <option value="1">Fixed</option>
              <option value="2">Percentage</option>
              </select>
          </div>
      
          <div class="mb-3 mt-3">
            <label for="coupon_amount" class="form-label"> Coupon amount :</label>
            <input type="text" class="form-control" value="{{ old('coupon_amount') }}" name="coupon_amount" placeholder="Enter childcategory" required>
          </div>
          @error('coupon_amount')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
      
          <div class="mb-3 mt-3">
            <label for="type" class="form-label">Coupon status :</label>
              <select name="status" id="" class="form-control">
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
      <!-- /.content -->
    </div>
  @endsection
