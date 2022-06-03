@extends('layouts.app')
@push('admincss')

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
            <h1>Our Team</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Team</li>
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
                <h3 class="card-title">Add New Team Member</h3>
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
              <form action="{{ route('team.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputName">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Name">
                  </div>
                  <div class="form-group">
                        <label for="exampleInputDepartment">Department</label>
                        <select class="browser-default form-control" name="department">
                        <option value="developer" selected>Tech & Development</option>
                        <option value="marketing">Sales & Marketing</option>
                        <option value="design">Product & Design</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputDesignation">Designation</label>
                    <input type="text"  class="form-control" name="designation">
                </div>
                <div class="form-group">
                    <label for="exampleInputUniversity">University</label>
                    <input type="text"  class="form-control" name="university">
                </div>

                <div class="form-group">
                    <label for="inputClientCompany">Image</label>
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input"
                            id="customFile">
                        <label class="custom-file-label" for="customFile">Choose Image</label>
                    </div>
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


<script>
    $(function () {
      bsCustomFileInput.init();
    });
    </script>


@endpush


