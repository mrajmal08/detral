@extends('layouts.app')
@section('content')
<div class="wrapper">
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
              <li class="breadcrumb-item active">Blogs</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <a class="btn btn-success"> Add New Blog </a>
              </div>

            </div>
            <!-- /.card -->
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Blog</th>
                    <th>Type</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($post as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td><a href="{{ url('/') }}/{{ $item->type }}/{{ $item->slug }}" target="_blank">{{ $item->title }}</a></td>
                        <td>{{ \Illuminate\Support\Str::limit(strip_tags($item->content), 100, $end='...') }}</td>
                        <td>
                            {{ strtoupper($item->type) }}
                        </td>
                        <td>
                        <a href="{{ url('admin/edit-blog/'.$item->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                        <a href="{{ url('admin/delete-blog/'.$item->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <br>
                     @endforeach

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Blog</th>
                    <th>Type</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

@endsection
