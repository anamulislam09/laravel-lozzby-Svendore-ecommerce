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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
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
        <form action="{{ route('store.page') }}" method="POST">
          @csrf

          <div class="mb-3 mt-3">
            <label for="page_position" class="form-label">Page Positon:</label>
           <select name="page_position" class="form-control" id="">
            <option value="1" disabled selected>Selece One</option>
            <option value="1">Line One</option>
            <option value="2">Line two</option>
           </select>
          </div>

          <div class="mb-3 mt-3">
            <label for="page_name" class="form-label">Page Name:</label>
            <input type="text" class="form-control" name="page_name" id="page_name"
              placeholder="Enter page name">
          </div>

          <div class="mb-3 mt-3">
            <label for="page_title" class="form-label">Page title:</label>
            <input type="text" class="form-control" name="page_title" id="page_title"
              placeholder="Enter page title">
          </div>

          <div class="mb-3 mt-3">
            <label for="page_description" class="form-label">Page Description:</label>
            <textarea name="page_description" id="summernote" class="form-control" ></textarea>
            <small>This data show your web page</small>
          </div>

          <!-- /.card-body -->
          <div class="card-footer clearfix">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
      <!-- /.content -->
    </div>
  @endsection
