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

$komplainRow = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM komplain WHERE id=$id"));

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
                    Detail Tanggapan
                </h3>
            </div>

           
          </div>
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Detail Tanggapan</h2>
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



                  <form class="form-horizontal form-label-left" action="komplain_add_proses.php" method="POST" enctype="multipart/form-data">

             <input type="hidden"  name="username" value="<?php echo $user;?>" required="required" class="form-control col-md-7 col-xs-12">

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Jenis Komplain <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text"  name="topik" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $komplainRow['jenis_komplain'];?>" disabled>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Topik <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text"  name="topik" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $komplainRow['topik'];?>" disabled>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Deskripsi <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea id="textarea" required="required" name="deskripsi" class="form-control col-md-7 col-xs-12" disabled=""><?php echo $komplainRow['deskripsi'];?></textarea>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">File Pendukung <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <img src="file/<?php echo $komplainRow['file_pendukung'];?>" class="img-responsive">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Tanggal Upload <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text"  name="file" value="<?php echo $komplainRow['tanggal_upload'];?>" class="form-control col-md-7 col-xs-12" disabled="">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Status <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text"  name="file" value="<?php echo $komplainRow['status'];?>" class="form-control col-md-7 col-xs-12" disabled="">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Tanggapan <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea id="textarea" required="required" name="deskripsi" class="form-control col-md-7 col-xs-12" disabled=""><?php echo $komplainRow['tanggapan'];?></textarea>
                      </div>
                    </div>

                    <div class="ln_solid"></div>
                   
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
