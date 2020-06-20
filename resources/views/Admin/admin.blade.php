
@extends('layouts.app')

@section('content')
@include('Admin.header')

@section('logo_url')
{{ url('/admin') }}
@endsection

@section('nav_toggle')
<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
@endsection

<div class="wrapper">
  @include('Admin.sidebar')

  <!-- Content Wrapper. Contains page content -->
  
  <!-- /.content-wrapper -->
  @include('Admin.dashboard')
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@include('Admin.footer')
@endsection


