<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="inicio" class="nav-link">Home</a>
      </li>
      
    </ul>

    <!-- SEARCH FORM -->





    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->

      <li class="nav-item">
        <form method="post">

            <?php
              $log_out = new DSession();
              $log_out->sessionDestroy();
            ?>

        <button type="submit" class="btn btn-danger" name="logout"><i
            class="fas fa-users"></i> Log Out</button>
        </form>
      </li>
    </ul>
  </nav>
