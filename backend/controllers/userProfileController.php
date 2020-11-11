<?php
	class userProfilecontroller{

		public function getUserProfile()
		{
			$result = '<div class="content-wrapper">
					    <!-- Content Header (Page header) -->
					    <section class="content-header">
					      <div class="container-fluid">
					        <div class="row mb-2">
					          <div class="col-sm-6">
					            <h1>Profile</h1>
					          </div>
					         
					        </div>
					      </div>
					    </section>
					        
			<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
          <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                      <div class="card-body box-profile">
                        <div class="text-center">
                          <img class="profile-user-img img-fluid img-circle"
                               src="views/img/profile/quesada.jpg"
                               alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">Ismael Quesada</h3>

                        <p class="text-muted text-center">Dr. Medico General</p>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                  B.S. in Computer Science from the University of Tennessee at Knoxville
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">Malibu, California</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">UI Design</span>
                  <span class="tag tag-success">Coding</span>
                  <span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary">Node.js</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div></div>';

          echo $result;
		}
	}
 ?>