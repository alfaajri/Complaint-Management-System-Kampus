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
          <div class="page-title">
            <div class="title_left">
              <h3>
                    Laporan Komplain
                
                </h3>
            </div>

            
          </div>
          <div class="clearfix"></div>

          <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Laporan Komplain
                    <!-- <?php 
                      if($qrow['level'] == 'admin' || $qrow['level'] == 'dekan' || $qrow['level'] == 'wakil dekan 2' || $qrow['level'] == 'kasubag'){
                    ?>
                    <small>
                      <a href="komplain_cetak.php" class="btn btn-info"><i class="fa fa-print"></i> Print</a>
                    </small>
                    <?php
                      } else {

                      }
                    ?> -->
                  </h2>
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
                  <p class="text-muted font-13 m-b-30">
                    Silahkan tekan tombol dibawah untuk mencetak laporan dalam bentuk PDF atau Excel atau langsung cetak Laporan ke Printer.
                  </p>
                  <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Jenis Komplain</th>
                        <th>Topik</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                        <th>Tanggapan</th>
                        <th>Nama Mahasiswa</th>
                        <th>NIM</th>
                        <th>Jurusan</th>
                        <th>Tanggal Komplain</th>
                        <th>Tanggal Selesai</th>
                    <!--     <th>Aksi</th> -->
                      </tr>
                    </thead>
                    <?php 
                    $no = 1;
                    $userQuery = mysqli_query($koneksi,"SELECT k.*, m.*, u.* FROM komplain k, tbl_mahasiswa m, tbl_user u WHERE k.username = u.username AND u.username = m.nim");
                    
                    
                    ?>

                    <tbody>
                      <?php 
                        while ($userRow = mysqli_fetch_array($userQuery)) {
                      ?>
                      <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo strtoupper($userRow['jenis_komplain']);?></td>
                        <td><?php echo strtoupper($userRow['topik']);?></td>
                        <td><?php echo strtoupper($userRow['deskripsi']);?></td>
                        <td><?php echo strtoupper($userRow['status']);?></td>
                        <td><?php echo strtoupper($userRow['tanggapan']);?></td>
                        <td><?php echo strtoupper($userRow['nama']);?></td>
                        <td><?php echo strtoupper($userRow['nim']);?></td>
                        <td><?php echo strtoupper($userRow['jurusan']);?></td>
                        <td><?php echo strtoupper($userRow['tanggal_upload']);?></td>
                        <td><?php echo strtoupper($userRow['tanggal_selesai']);?></td>
                        
                      </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            

          
                </div>
              </div>
              <!-- footer content -->
              <?php include 'footer.php'; ?>
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
