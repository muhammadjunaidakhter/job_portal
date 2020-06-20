<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@extends('layouts.app')

@section('content')
    
    <link rel="stylesheet" href="css/bootstrap-select.min.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">    


  <div class="site-wrap">    

    <section class="site-section">
      <div class="container">
        
        @foreach ($jobs as $job)
        <ul class="job-listings mb-5">
          <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">

            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
              <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                <h2>{{ $job->tittle}}</h2>
                <p><strong>Job Reponsibility :</strong> {{ $job->responsibility}}<p>
                <p><strong>Job Description :</strong> {{ $job->description}}<p>
              </div>
              <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                <p></p>
                <span class="icon-room"></span> New York, New York
              </div>
              <div class="job-listing-meta">
                <p></p>
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-id="{{ $job->id}}" data-target="#applyjob">Apply</button>
              </div>
            </div>
          </li>                          
        </ul>
        @endforeach
        <div class="row pagination-wrap">
          <div class="col-md-6 text-center text-md-left mb-4 mb-md-0">
            <span>Showing 1-7 Of 43,167 Jobs</span>
          </div>
          <div class="col-md-6 text-center text-md-right">
            <div class="custom-pagination ml-auto">
              <a href="#" class="prev">Prev</a>
              <div class="d-inline-block">
              <a href="#" class="active">1</a>
              <a href="#">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              </div>
              <a href="#" class="next">Next</a>
            </div>
          </div>
        </div>

      </div>
    </section>   
  
  </div>
@endsection


<!-- Apply Job popup-->
<div class="modal fade" id="applyjob" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Apply Job</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="/apply_job" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"></input>
        <div id="jobid">
          <input type="hidden" name="job_id" value=""></input>
        </div>
        <!-- <div class="form-group">
          <h3 for="exampleInputPassword1">Are you sure you want to apply for job?</h3>
        </div> -->
        <div class="form-check">
          <label class="form-check-label" for="exampleCheck1">Experienced</label>          
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
        </div>
        <div class="form-group">
          <label for="exampleFormControlFile1">Upload Resume</label>
          <input type="file" class="form-control-file" id="exampleFormControlFile1" name="resume">
        </div>
        <!-- <button type="submit" class="btn btn-primary">Save</button>       -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Apply</button>
        </div>
      </form>      
    </div>
  </div>
</div>
<script>
$(document).ready(function() {
  
  $('#applyjob').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      
      var id = button.data('id')
      var modal = $(this)
      modal.find('#jobid input').val(id)
  });
})
</script>
   
    
