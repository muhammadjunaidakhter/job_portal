<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
  <!-- Create Popup and Button -->
<div style="margin:20px;padding-left:20%">
  <button  type="button" class="btn btn-secondary" data-toggle="modal" data-target="#createjob">
    Create Job
  </button>
</div>
<div class="modal fade" id="createjob" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Create Job</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="/createjob">
        {{ csrf_field() }}
        <input name="company_id" type="hidden" value="{{ Auth::user()->id }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div class="form-group">
          <label for="exampleInputEmail1">Job title</label>
          <input name="job_title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter job title">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Job description</label>
          <textarea name="job_description" type="number" class="form-control" id="exampleInputPassword1" placeholder="Enter job description"></textarea>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Job responsibility</label>
          <textarea name="job_responsibility" type="email" class="form-control" id="exampleInputPassword1" placeholder="Enter job responsibility"></textarea>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Job qualification</label>
          <input name="job_qualification" type="number" class="form-control" id="exampleInputPassword1" placeholder="Enter job qualification">
        </div>
        <div class="form-group">
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
<!-- Create Popup and Button End-->


<!-- Edit Popup  Start-->
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
      <form method="POST" action="/company_edit_job">
        {{ csrf_field() }}
        <input name="company_id" type="hidden" value="{{ Auth::user()->id }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div class="form-group" id="id">
          <input name="id" type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter job title">
        </div>
        <div class="form-group" id="tittle">
          <label for="exampleInputEmail1">Job title</label>
          <input name="tittle" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter job title">
        </div>
        <div class="form-group" id="description">
          <label for="exampleInputPassword1">Job description</label>
          <textarea name="description" type="number" class="form-control" id="exampleInputPassword1" placeholder="Enter job description"></textarea>
        </div>
        <div class="form-group" id="responsibility">
          <label for="exampleInputPassword1">Job responsibility</label>
          <textarea name="responsibility" type="email" class="form-control" id="exampleInputPassword1" placeholder="Enter job responsibility"></textarea>
        </div>
        <div class="form-group" id="qualification">
          <label for="exampleInputPassword1">Job qualification</label>
          <input name="qualification" type="number" class="form-control" id="exampleInputPassword1" placeholder="Enter job qualification">
        </div>
        <div class="form-group" id="Gender">
          <label for="exampleInputPassword1">Gender</label>
          <select  name="gender" type="text" class="form-control" id="exampleInputPassword1" placeholder="Gender">
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
<!-- Edit Popup End-->


<!-- Delete Popup  Start-->
<div class="modal fade" id="deletejob" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to perform this action?</h5>
        <form method="POST" action="/company_delete_job">
        {{ csrf_field() }}
        <div class="form-group" id="id">
          <input type="hidden" name="id" value=""></input>
        </div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Delete</button>      
      </form> 
      </div>
      <div class="modal-footer">
             
      </div>
      
    </div>
  </div>
</div>
<!-- Delete Popup End-->


@foreach ($jobs as $job)
<div style="margin-left:20%">
<section class="content">
  <div class="container">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-8 col-12">
        <!-- small box -->
        <div class="small-box bg-info data-row">
          <span class="inner">
            <h2 class="name">{{ $job->tittle}} </h2>

            <p>{{ $job->description}}</p>
          </span>
          <span>{{ $job->responsibility}}</span>
          <div class="row">
            <div class="col-4 ">                  
            </div>
            <div class="col-2">
              <button  type="button" id="edit-data" class="btn btn-danger" data-toggle="modal" data-target="#editjob"
                data-id="{{ $job->id}}" data-tittle="{{ $job->tittle}}" data-description="{{ $job->description}}" data-responsibility="{{ $job->responsibility}}"
                data-qualification="{{ $job->qualification}}" data-gender="{{ $job->gender}}">
                Edit
              </button>
            </div>
            <div class="col-2">
              <button  type="button" id="edit-data" class="btn btn-danger" data-toggle="modal" data-target="#deletejob"
              data-id="{{ $job->id}}">
                Delete
              </button>
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
  
  $('#editjob').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      
      var id = button.data('id')
      var tittle = button.data('tittle') 
      var description = button.data('description') 
      var responsibility = button.data('responsibility')
      var qualification = button.data('qualification') 
      var gender = button.data('gender') 
      var modal = $(this)
      modal.find('#id input').val(id)
      modal.find('#tittle input').val(tittle)
      modal.find('#description textarea').val(description)
      modal.find('#responsibility textarea').val(responsibility)
      modal.find('#qualification input').val(qualification)
      modal.find('#Gender select').val(gender)
  });

  $('#deletejob').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      
      var id = button.data('id')
      var modal = $(this)
      modal.find('#id input').val(id)
  });
})

</script>
