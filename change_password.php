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

$id = addslashes(trim($_GET['id']));

$userData = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tbl_user WHERE username='$id'"));

?>

<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'; ?>


<body class="nav-md">

  <div class="container body">


    <div class="main_container">

      <?php include 'left.php'; ?>

      <!-- top navigation -->
      <?php include 'top.php';?>
      <!-- /top navigation -->


      <!-- page content -->
      <div class="right_col" role="main">

        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>
                    Change Password
                </h3>
            </div>

           
          </div>
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Change Password</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">



                  <form class="form-horizontal form-label-left" action="change_password_proses.php" method="POST">
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Username <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="hidden"  name="username" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $userData['username'];?>">

                        <input type="text"  name="username1" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $userData['username'];?>" disabled>
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

  <?php include 'script.php'; ?>
  <!-- /datepicker -->
  <!-- /footer content -->
</body>

</html>
