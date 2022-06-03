
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
            <h1>Lead Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Leads</li>
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
            <!-- /.card -->
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th> ID </th>
                    <th> Name </th>
                    <th> Email </th>
                    <th> Phone </th>
                    <th> Q1 </th>
                    <th> Q2 </th>
                  </tr>
                  </thead>
                  <tbody>

                 @foreach ($lead as $item)
                    <?php
                        $i = json_decode($item->lead);
                        $q1 = json_decode($i->q1);
                        $q2 = json_decode($i->q2);
                    ?>
                        <tr>
                            <td>{{ $item->id }}</td>

                            <td>
                                {{ $i->name }}
                            </td>

                            <td>
                                {{ $i->email }}
                            </td>
                            <td>
                                {{ $i->phone }}
                            </td>

                            <td>
                                <strong>{{ $q1->q }}</strong> <br/> {{ $q1->value }}
                            </td>

                            <td>
                                <strong>{{ $q2->q }}</strong> <br/> {{ $q2->value }}
                            </td>
                        </tr>

                @endforeach

                  </tbody>
                  <tfoot>
                  <tr>
                    <th> ID </th>
                    <th> Name </th>
                    <th> Email </th>
                    <th> Phone </th>
                    <th> Q1 </th>
                    <th> Q2 </th>
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
