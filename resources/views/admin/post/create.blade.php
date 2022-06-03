@extends('layouts.app')
@push('admincss')
<link rel="stylesheet" href="{{ asset('dashboard/summernote/summernote-bs4.min.css') }}">
@endpush
@section('content')
      <!-- Navbar -->
      @include('layouts.navbar')
      @include('layouts.aside')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Blogs</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">blog</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create New Blog</h3>
              </div>
              <!-- /.card-header -->

              @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

              <!-- form start -->
              <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputTitle">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter Title">
                  </div>
                  <div class="form-group">
                        <label for="exampleInputType">Type</label>
                        <select class="browser-default form-control" name="type">
                        <option value="blog" selected>Blogs</option>
                        <option value="page">Page</option>
                        <option value="service">Service</option>
                        <option value="job">Job</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputKeyword">keyword</label>
                    <input type="text"  class="form-control" name="keyword">
                </div>
                <div class="form-group">
                    <label for="exampleInputDescription">Description</label>
                    <input type="text"  class="form-control" name="description">
                </div>

                <div class="form-group">
                    <label for="inputClientCompany">Top image</label>
                    <div class="custom-file">
                        <input type="file" name="top_image" class="custom-file-input"
                            id="customFile">
                        <label class="custom-file-label" for="customFile">Choose Image</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputName">News Description</label>
                        <textarea id="summernote" name="description" rows="4">

                        </textarea>
                </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.0
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
@endsection

@push('adminjs')
<script src="{{ asset('dashboard/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('dashboard/jquery-validation/additional-methods.min.js') }}"></script>
<script src="{{ asset('dashboard/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

<script src="{{ asset('dashboard/summernote/summernote-bs4.min.js') }}"></script>


<script>
    $(function () {
      bsCustomFileInput.init();
    });
    </script>

<script>
    $(function() {
        // Summernote
        $('#summernote').summernote()

        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
        });
    })
</script>

@endpush


