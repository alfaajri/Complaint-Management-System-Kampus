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

      <?php include 'left.php'; ?>

      <!-- top navigation -->
      <?php include 'top.php';?>
      <!-- /top navigation -->


      <!-- page content -->
      <div class="right_col" role="main">

        <div class="">
          <div class="animated flipInY col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                        <div class="tile-stats" >
                         <!--  <div class="icon"><i class="fa fa-sort-amount-desc"></i>
                          </div> -->
                          <div class="count">Universitas Islam Negeri Sultan Syarif Kasim Riau (UIN Suska Riau)</div>

                          <h3>Fakultas Sains dan Teknologi</h3>
                          <!-- <p>Lorem ipsum psdea itgum rixt.</p> -->
                        </div>
                      </div>

          <!-- <div class="page-title">
            <div class="title_left">
              <h3>
                    Universitas Islam Negeri Sultan Syarif Kasim
                </h3>
            </div>

           
          </div> -->
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Selamat Datang!!</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">



                  <form class="form-horizontal form-label-left" action="komplain_add_proses.php" method="POST" enctype="multipart/form-data">

             <input type="hidden"  name="username" value="<?php echo $user;?>" required="required" class="form-control col-md-7 col-xs-12">

                    <div class="item form-group">
                      <div class="col-md-3 col-sm-3 col-xs-12">
                      <img src="images/logo.png" width="200px" height="200px">
                    </div>
                      <div class="col-md-8 col-sm-8 col-xs-12">
                        <p align="justify">Fakultas Sains dan Teknologi Universitas Islam Negeri Sultan Syarif
Kasim Riau (UIN Suska Riau) didirikan pada akhir tahun 2001. Tujuan
dari didirikannya Fakultas Sains dan Teknologi ini yaitu sebagai
persiapan perubahan status dari Institut Agama Islam Negeri Sultan
Syarif Qasim (IAIN SUSQA) Pekanbaru menjadi Universitas Islam Negeri
Sultan Syarif Kasim Riau (UIN Suska). Cikal bakal berdirinya Fakultas
Sains dan Teknologi bermula dengan dibukanya Program Studi Teknik
Informatika pada tahun 1999 dan Program Studi Teknik Informatika pada
tahun 2001. Pada tahun 2002, dibentuk Jurusan Sistem Informasi dan
Matematika Terapan, kemudian pada tahun 2003 dibentuk Jurusan Teknik
Elektro dengan program studi Teknik Elektronika dan Telekomunikasi.
Latar belakang pendirian Fakultas Sains dan Teknologi beserta
jurusan-jurusannya adalah untuk merespon kebutuhan dunia usaha dan
industri yang ada di Provinsi Riau, serta dalam rangka mengantisipasi
pengaruh globalisasi dunia.</p>
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
