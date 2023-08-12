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
              <li class="breadcrumb-item active">Update pags</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Update Page</h3>
        <a href="{{ route('page.index') }}" class="btn btn-sm btn-primary" style="float:right">Page list</a>

      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form action="{{ route('update.page', $data->id) }}" method="POST">
          @csrf

          <div class="mb-3 mt-3">
            <label for="page_position" class="form-label">Page Positon:</label>
            <select name="page_position" class="form-control" id="">
              <option value="" disabled selected>Selece One</option>
              <option value="1" @if ($data->page_position == 1) selected @endif>Line One</option>
              <option value="2" @if ($data->page_position == 2) selected @endif>Line two</option>
            </select>
          </div>

          <div class="mb-3 mt-3">
            <label for="page_name" class="form-label">Page Name:</label>
            <input type="text" class="form-control" value="{{ $data->page_name }}" name="page_name" id="page_name"
              placeholder="Enter page name">
          </div>

          <div class="mb-3 mt-3">
            <label for="page_title" class="form-label">Page title:</label>
            <input type="text" class="form-control" value="{{ $data->page_title }}" name="page_title" id="page_title"
              placeholder="Enter page title">
          </div>

          <div class="mb-3 mt-3">
            <label for="page_description" class="form-label">Page Description:</label>
            <textarea name="page_description" id="summernote" class="form-control">value="{{ $data->page_description }}"</textarea>
            <small>This data show your web page</small>
          </div>

          <!-- /.card-body -->
          <div class="card-footer clearfix">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
      <!-- /.content -->
    </div>
  @endsection
