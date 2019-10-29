<?php
include 'config/koneksi.php';
session_start();
if (empty($_SESSION['username']))
{
 header("location:login.php");
}  

$user = $_SESSION['username']; 
$qdata = mysqli_query($koneksi,"SELECT * FROM tbl_user WHERE username='$user'");
$qrow = mysqli_fetch_array($qdata);   

$dataMhs = mysqli_query($koneksi,"SELECT * FROM tbl_mahasiswa WHERE nim='$user'");
$rowMhs = mysqli_fetch_array($dataMhs);       
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'; ?>


<body class="nav-md">

  <div class="container body">


    <div class="main_container">

      

      <!-- top navigation -->
      <?php include 'left.php'; ?>

      <!-- top navigation -->
      <?php include 'top.php';?>
      <!-- /top navigation -->
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">

        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>User Profile</h3>
            </div>

           
          </div>
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>User Report <small>Activity report</small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a href="#"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                  
                    </li>
                    <li><a href="#"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <div class="col-md-3 col-sm-3 col-xs-12 profile_left">

                    <div class="profile_img">

                      <!-- end of image cropping -->
                      <div id="crop-avatar">
                        <!-- Current avatar -->
                        <div class="avatar-view" title="Change the avatar">
                          <img src="foto/<?php echo $qrow['foto'];?>" alt="Avatar">
                        </div>

                        <!-- Cropping modal -->
                        
                        <!-- /.modal -->

                        <!-- Loading state -->
                        <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
                      </div>
                      <!-- end of image cropping -->

                    </div>
                    <?php 
                      if($qrow['level'] == 'mahasiswa'){
                    ?>
                    <h3><?php echo $rowMhs['nama'];?></h3>
                    <?php
                      } else {
                    ?>
                    <h3><?php echo $qrow['nama'];?></h3>
                    <?php
                      }
                    ?>
                    

                    <ul class="list-unstyled user_data">
                      

                      <li>
                        <i class="fa fa-briefcase user-profile-icon"></i> <?php echo $rowMhs['nim'];?>
                      </li>

                      <li class="m-top-xs">
                        <i class="fa fa-external-link user-profile-icon"></i> Jurusan : <?php echo strtoupper($rowMhs['jurusan']);?>
                      </li>
                      <li class="m-top-xs">
                        <i class="fa fa-envelope user-profile-icon"></i> <?php echo $qrow['email'];?>
                      </li>
                    </ul>

                    <button onclick="myFunction()" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i> Edit Profile</button>
                    <br />
                    <button onclick="myFunction2()" class="btn btn-warning"><i class="fa fa-key m-right-xs"></i> Change Password</button>

                    <!-- start skills -->
                    <!-- <h4>Skills</h4>
                    <ul class="list-unstyled user_data">
                      <li>
                        <p>Web Applications</p>
                        <div class="progress progress_sm">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                        </div>
                      </li>
                      <li>
                        <p>Website Design</p>
                        <div class="progress progress_sm">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70"></div>
                        </div>
                      </li>
                      <li>
                        <p>Automation & Testing</p>
                        <div class="progress progress_sm">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30"></div>
                        </div>
                      </li>
                      <li>
                        <p>UI / UX</p>
                        <div class="progress progress_sm">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                        </div>
                      </li>
                    </ul> -->
                    <!-- end of skills -->

                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="x_content">

                  <form class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data" action="profil_edit_proses.php" id="myDIV" style="display: none;">
                    <span class="section">Personal Info</span>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Username <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="hidden"  name="username" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $user;?>">

                        <input type="text"  name="username1" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $user;?>" disabled>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name"   type="text" disabled="" value="<?php echo $qrow['nama'];?>">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $qrow['email'];?>">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Upload Foto Baru <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="file" id="email2" name="file" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-3">
                        <button type="submit" class="btn btn-primary">Cancel</button>
                        <button id="send" type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </div>
                  </form>

                  <form class="form-horizontal form-label-left" action="change_password_proses2.php" method="POST" id="myDIV2" style="display: none;">
                    <span class="section">Change Password</span>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Username <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="hidden"  name="username" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $user;?>">

                        <input type="text"  name="username1" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $user;?>" disabled>
                      </div>
                    </div>

                    
                    <div class="item form-group">
                      <label for="password" class="control-label col-md-3">Old Password</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="password" type="password" name="password_lama" class="form-control col-md-7 col-xs-12" required="required" placeholder="Masukkan Password Lama">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label for="password" class="control-label col-md-3">New Password</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="password" type="password" name="password_baru" class="form-control col-md-7 col-xs-12" required="required" placeholder="Masukkan Password Baru">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label for="password" class="control-label col-md-3">Confirm Password</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="password" type="password" name="ulangi_password_baru" class="form-control col-md-7 col-xs-12" required="required" placeholder="Ulangi Password Baru">
                      </div>
                    </div>
                  
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-3">
                        <input type="reset" class="btn btn-primary" value="Cancel">
                        <input type="submit" name="btn-change-password" class="btn btn-success" value="Submit">
                      </div>
                    </div>
                  </form>

                </div>
                    

                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- footer content -->
        <?php include 'footer.php';?>
        <!-- /footer content -->

      </div>
      <!-- /page content -->
    </div>

  </div>

  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div>

  <?php include 'script.php';?>
  <script type="text/javascript">
    function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
    var y = document.getElementById("myDIV2");
    y.style.display = "none";
}

function myFunction2() {
    var x = document.getElementById("myDIV2");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
     var y = document.getElementById("myDIV");
    y.style.display = "none";
}
  </script>
  <!-- /datepicker -->
</body>

</html>
