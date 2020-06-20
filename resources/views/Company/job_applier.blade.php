<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- import Illuminate\Console\Application; -->

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
  @include('Company.sidebar')

  <!-- Content Wrapper. Contains page content -->
  
  <!-- /.content-wrapper -->

<!-- Edit Popup  Start-->
<div class="modal fade" id="viewdetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Employer details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="/download_resume" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group" id="resume">
          <input  type="hidden" name="resume" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        
        <div class="form-group" id="id">
          <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter job title">
        </div>
        <div class="form-group" id="name">
          <label for="exampleInputEmail1">Name</label>
          <input   type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter job title">
        </div>
        <div class="form-group" id="email">
          <label for="exampleInputPassword1">Email</label>
          <input   type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter job description">
        </div>
        <div class="form-group" id="tittle">
          <label for="exampleInputPassword1">Apply for</label>
          <input   type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter job description">
        </div>
        <div class="form-group" id="resume">
          <label for="exampleInputPassword1">Download resume</label>
          <button  type="submit" class="btn btn-secondary" >Download</button>
        </div>   
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      
    </div>
  </div>
</div>
<!-- Edit Popup End-->


@foreach ($jobappliers as $job)
  <div style="margin-left:20%">
    <section class="content">
      <div class="container">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-8 col-12">
            <!-- small box -->
            <div class="small-box bg-info data-row">
              <span class="inner">
                <h2 class="name">{{ $job->name}} </h2>
                
                <h1>{{$job->tittle}}</h1>
                
                <button  type="button" id="edit-data" class="btn btn-danger" data-toggle="modal" data-target="#viewdetails"
                  data-id="{{ $job->id}}" data-name="{{ $job->name}}" data-email="{{ $job->email}}" data-tittle="{{ $job->tittle}}"
                  data-resume="{{ $job->resume}}" >
                    View Details
                </button>
              </span>
              
              <div class="row">
                <div class="col-4 ">                  
                </div>
                <div class="col-2">
                  
                </div>
                <div class="col-2">
                  
                </div>
              </div>
            </div>            
          </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
@endforeach
</div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@include('Admin.footer')
@endsection


<script>
$(document).ready(function() {
  
  $('#viewdetails').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      
      var id = button.data('id')
      var name = button.data('name') 
      var email = button.data('email') 
      var tittle = button.data('tittle')
      var resume = button.data('resume') 
      var modal = $(this)
      modal.find('#id input').val(id)
      modal.find('#name input').val(name)
      modal.find('#email input').val(email)
      modal.find('#tittle input').val(tittle)
      modal.find('#resume input').val(resume)
      debugger;
  });

  $('#deletejob').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      
      var id = button.data('id')
      var modal = $(this)
      modal.find('#id input').val(id)
  });
})

</script>
