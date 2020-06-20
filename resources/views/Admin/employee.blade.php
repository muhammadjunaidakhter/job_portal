
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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

<div class="wrapper">
  @include('Admin.sidebar')

  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    
  </aside>
  <!-- /.control-sidebar -->
<!-- Create Popup and Button -->
<div style="margin:20px;padding-left:20%">
  <!-- <button  type="button" class="btn btn-secondary" data-toggle="modal" data-target="#createcompany">
    Create Company
  </button> -->
</div>
<div class="modal fade" id="createcompany" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Create Company</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="/createcompany">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Contact Number</label>
          <input name="contact_no" type="number" class="form-control" id="exampleInputPassword1" placeholder="Contact Number">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Email</label>
          <input name="email" type="email" class="form-control" id="exampleInputPassword1" placeholder="Email">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Size</label>
          <input name="size" type="number" class="form-control" id="exampleInputPassword1" placeholder="Size">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Address</label>
          <input name="address" type="text" class="form-control" id="exampleInputPassword1" placeholder="Address">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Type</label>
          <input name="type" type="text" class="form-control" id="exampleInputPassword1" placeholder="Type">
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
<div class="modal fade" id="editemployee" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="/admin_edit_employee">
        {{ csrf_field() }}
        <div class="form-group" id="companyid">
          <input type="hidden" name="id" value=""></input>
        </div>
        <div class="form-group" id="name">
          <label for="exampleInputEmail1">Name</label>
          <input name="name" type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <!-- <div class="form-group" id="contact_no">
          <label for="exampleInputPassword1">Contact Number</label>
          <input name="contact_no" type="number" class="form-control" id="exampleInputPassword1" placeholder="Contact Number">
        </div> -->
        <div class="form-group" id="email">
          <label for="exampleInputPassword1">Email</label>
          <input name="email" type="email" class="form-control" id="exampleInputPassword1" placeholder="Email">
        </div>
        <!-- <div class="form-group" id="size">
          <label for="exampleInputPassword1">Size</label>
          <input name="size" type="number" class="form-control" id="exampleInputPassword1" placeholder="Size">
        </div>
        <div class="form-group" id="address">
          <label for="exampleInputPassword1">Address</label>
          <input name="address" type="text" class="form-control" id="exampleInputPassword1" placeholder="Address">
        </div>
        <div class="form-group" id="type">
          <label for="exampleInputPassword1">Type</label>
          <input name="type" type="text" class="form-control" id="exampleInputPassword1" placeholder="Type">
        </div> -->
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
<div class="modal fade" id="deleteemployee" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="/admin_delete_employee">
        <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to perform this action?</h5>
        {{ csrf_field() }}
        <div class="form-group" id="companyid">
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

@foreach ($employees as $employee)
<div style="margin-left:20%">
<section class="content">
  <div class="container">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-8 col-12">
        <!-- small box -->
        <div class="small-box bg-info data-row">
          <span class="inner">
            <h2 class="name">{{ $employee->name}} </h2>

            <p>{{ $employee->email}}</p>
          </span>
          <span>{{ $employee->address}}</span>
          <div class="row">
            <div class="col-4 ">                  
            </div>
            <div class="col-2">
              <button  type="button" id="edit-data" class="btn btn-danger" data-toggle="modal" data-target="#editemployee"
              data-id="{{ $employee->id}}" data-name="{{ $employee->name}}" data-contact_no="{{ $employee->contact_no}}" data-email="{{ $employee->email}}"
              data-size="{{ $employee->size}}" data-address="{{ $employee->address}}" data-type="{{ $employee->type}}">
                Edit
              </button>
            </div>
            <div class="col-2">
              <button  type="button" id="edit-data" class="btn btn-danger" data-toggle="modal" data-target="#deleteemployee"
              data-id="{{ $employee->id}}">
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

@include('Admin.footer')
@endsection

<script>
$(document).ready(function() {
  
  $('#editemployee').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      
      var id = button.data('id')
      var name = button.data('name') 
      var email = button.data('email') 
      var modal = $(this)
      modal.find('#companyid input').val(id)
      modal.find('#name input').val(name)
      modal.find('#email input').val(email)
  });

  $('#deleteemployee').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      
      var id = button.data('id')
      var modal = $(this)
      modal.find('#companyid input').val(id)
  });
})

</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
