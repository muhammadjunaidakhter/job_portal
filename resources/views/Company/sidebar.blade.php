 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Copany Dashboard</a>
          
        </div>
        
      </div>

      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Dashboard -->
          <li class="nav-item">
            <a href="{{ url('company_index') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Jobs
              </p>
            </a>              
          </li> 
          <li class="nav-item">  
          <a href="{{ url('job_applier/view') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Job Applier
              </p>
          </a> 
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>