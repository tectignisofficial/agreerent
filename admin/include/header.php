<?php 
      $name=$_SESSION['aname'];
      $id=$_SESSION['aid'];
      $sql="SELECT * FROM agent_details WHERE user_id='".$_SESSION['aid']."'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
      ?>
      
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
	  <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link"><strong><?php echo $id ?></strong></a>
    </li>	  
    <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link"><strong><?php echo $name ?></strong></a>
    </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button" data-toggle="tooltip" data-placement="bottom" title="Fullscreen">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
                      <a href="profile" class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Profile">
                          <i class="nav-icon fas fa-user"></i>
                      </a>
                  </li>
      <li class="nav-item">
                      <a class="nav-link" href="logout" lass="btn btn-secondary" data-toggle="tooltip" data-placement="bottom" title="Logout">
                          <i class="fas fa-sign-out-alt"></i>
                      </a>
      </li>
    </ul>

  </nav>