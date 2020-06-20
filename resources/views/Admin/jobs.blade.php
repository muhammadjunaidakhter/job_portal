
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" href="css/bootstrap-select.min.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">   
@extends('layouts.app')

@section('content')
@include('Admin.header')
<!-- Logo Return -->
@section('logo_url')
{{ url('/admin') }}
@endsection

@section('nav_toggle')
<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
@endsection

<!-- Show Job -->
<div class="wrapper">
  @include('Admin.sidebar')
  
  <div class="content-wrapper">
  @foreach ($jobs as $job)
        <ul class="job-listings mb-5">
          <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">

            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
              <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                <h2>{{ $job->tittle}}</h2>
                <strong>{{ $job->company_id}}</strong>
              </div>
              <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                <span class="icon-room"></span> New York, New York
              </div>
              <div class="job-listing-meta">
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-id="{{ $job->id}}" data-title="{{ $job->tittle}}"
                data-description="{{ $job->description}}" data-responsibility="{{ $job->responsibility}}" data-qualification="{{ $job->qualification}}" 
                data-gender="{{ $job->gender}}" data-target="#editjob">Edit</button>
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-id="{{ $job->id}}" data-target="#deletejob">Delete</button>
              </div>
            </div>
          </li>                          
        </ul>
        @endforeach
  </div>
  <!-- /.control-sidebar -->
</div>
<!-- Show Job end -->


<!-- Edit Job -->
<div class="modal fade" id="editjob" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Job</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="/admin_edit_job">
        {{ csrf_field() }}
        <input name="company_id" type="hidden" value="{{ Auth::user()->id }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div class="form-group" id="jobid">
          <input name="job_id" type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="">
        </div>
        <div class="form-group" id="title">
          <label for="exampleInputEmail1">Job title</label>
          <input name="job_title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter job title">
        </div>
        <div class="form-group" id="description">
          <label for="exampleInputPassword1">Job description</label>
          <textarea name="job_description" type="number" class="form-control" id="exampleInputPassword1" placeholder="Enter job description"></textarea>
        </div>
        <div class="form-group" id="responsibility">
          <label for="exampleInputPassword1">Job responsibility</label>
          <textarea name="job_responsibility" type="email" class="form-control" id="exampleInputPassword1" placeholder="Enter job responsibility"></textarea>
        </div>
        <div class="form-group" id="qualification">
          <label for="exampleInputPassword1">Job qualification</label>
          <input name="job_qualification" type="number" class="form-control" id="exampleInputPassword1" placeholder="Enter job qualification">
        </div>
        <div class="form-group" id="">
          <label for="exampleInputPassword1">Gender</label>
          <select  name="job_gender" type="text" class="form-control" id="exampleInputPassword1" placeholder="Gender">
          <option value="male">Male</option>
          <option value="female">Female</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>      
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      
    </div>
  </div>
</div>
<!-- Edit Job end-->

<!-- Delete Job -->
<div class="modal fade" id="deletejob" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete Job</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="/admin_delete_job">
        {{ csrf_field() }}
        <input name="company_id" type="hidden" value="{{ Auth::user()->id }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div class="form-group" id="jobid">
          <input name="id" type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="">
        </div>
        <div class="form-group" id="">
          <h3 for="exampleInputPassword1">Are you sure you wnat to delete this job?</h3>
        </div>  
        <button type="submit" class="btn btn-primary">Delete</button>  
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Delete Job end-->

@include('Admin.footer')
@endsection


<script>
$(document).ready(function() {
  
  $('#editjob').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      
      var id = button.data('id')
      var title = button.data('title') 
      var description = button.data('description')
      var responsibility = button.data('responsibility') 
      var qualification = button.data('qualification') 
      var gender = button.data('gender') 
      var modal = $(this)
      modal.find('#jobid input').val(id)
      modal.find('#title input').val(title)
      modal.find('#description textarea').val(description)
      modal.find('#responsibility textarea').val(responsibility)
      modal.find('#qualification input').val(qualification)
      modal.find('#gender select').val(gender)
  });

  $('#deletejob').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      
      var id = button.data('id') 
      var modal = $(this)
      modal.find('#jobid input').val(id)
  });

})

</script>


