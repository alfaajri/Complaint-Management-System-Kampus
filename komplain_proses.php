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

$komplainRow = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM komplain WHERE id='$id'"));

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
                    Proses Komplain
                </h3>
            </div>

           
          </div>
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Proses Komplain</h2>
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



                  <form class="form-horizontal form-label-left" action="komplain_proses_proses.php" method="POST" enctype="multipart/form-data">

             <input type="hidden"  name="id" value="<?php echo $komplainRow['id'];?>" required="required" class="form-control col-md-7 col-xs-12">
             <input type="hidden"  name="level" value="<?php echo $qrow['level'];?>" required="required" class="form-control col-md-7 col-xs-12">
             <input type="hidden"  name="username" value="<?php echo $user;?>" required="required" class="form-control col-md-7 col-xs-12">

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Jenis Komplain <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="jenis_komplain" class="form-control col-md-7 col-xs-12" required="required" disabled="">
                          <option value="<?php echo $komplainRow['jenis_komplain'];?>"><?php echo $komplainRow['jenis_komplain'];?></option>
                          <option value="sarana dan prasarana">Sarana dan Prasarana</option>
                          <option value="labor">Laoratorium</option>
                          <option value="pelayanan pegawai">Pelayanan Pegawai</option>
                        </select>
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
                        <textarea id="textarea" required="required" name="deskripsi" class="form-control col-md-7 col-xs-12" disabled><?php echo $komplainRow['deskripsi'];?></textarea>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">File Pendukung <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <img src="file/<?php echo $komplainRow['file_pendukung'];?>" class="img-responsive">
                        <input type="file"  name="file" class="form-control col-md-7 col-xs-12" value="<?php echo $komplainRow['file_pendukung'];?>" disabled>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Tanggal Edit <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text"  name="tgl" value="<?php echo date('d-M-Y');?>" class="form-control col-md-7 col-xs-12" disabled="">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Status Komplain <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="status_komplain" class="form-control col-md-7 col-xs-12" required="required">
                          <option value="">---</option>
                          <option value="request">Request</option>
                          <option value="proses">Proses</option>
                          <option value="selesai">Selesai</option>
                        </select>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Tanggapan <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea id="textarea" name="tanggapan" class="form-control col-md-7 col-xs-12"></textarea>
                      </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-3">
                        <input type="reset" class="btn btn-primary" value="Cancel">
                        <input type="submit" name="btn-save" class="btn btn-success" value="Submit">
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
