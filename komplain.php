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
                    Data Komplain
                
                </h3>
            </div>

            
          </div>
          <div class="clearfix"></div>

          <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Data Komplain</h2>
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
                 <!--  <p class="text-muted font-13 m-b-30">
                    DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>
                  </p> -->
                  <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Jenis Komplain</th>
                        <th>Topik</th>
                        <th>Deskripsi</th>
                        <th>Tanggal Upload</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <?php 
                    $no = 1;
                    if($qrow['level'] == 'mahasiswa'){
                      $userQuery = mysqli_query($koneksi,"SELECT * FROM komplain WHERE username='$user' ORDER BY id DESC");
                    } else if($qrow['level'] == 'kasubag'){
                      $userQuery = mysqli_query($koneksi,"SELECT * FROM komplain ORDER BY id DESC");
                    } else if($qrow['level'] == 'wakil dekan 2'){
                      $userQuery = mysqli_query($koneksi,"SELECT * FROM komplain WHERE status='proses' OR status='selesai' ORDER BY id DESC");
                    } else if($qrow['level'] == 'dekan'){
                      $userQuery = mysqli_query($koneksi,"SELECT * FROM komplain WHERE status='proses' OR status='selesai' ORDER BY id DESC");
                    } else {
                      $userQuery = mysqli_query($koneksi,"SELECT * FROM komplain ORDER BY id DESC");
                    }
                    
                    ?>

                    <tbody>
                      <?php 
                        while ($userRow = mysqli_fetch_array($userQuery)) {
                      ?>
                      <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $userRow['jenis_komplain'];?></td>
                        <td><?php echo $userRow['topik'];?></td>
                        <td><?php echo $userRow['deskripsi'];?></td>
                        <td><?php echo $userRow['tanggal_upload'];?></td>
                        <td><?php echo $userRow['status'];?></td>
                        <?php
                          if($qrow['level'] == 'mahasiswa'){
                            if($userRow['status'] == 'request'){
                        ?>
                        <td>
                            <a href="komplain_edit.php?id=<?php echo $userRow['id'];?>" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                            <a href="komplain_delete.php?id=<?php echo $userRow['id'];?>" class="btn btn-danger" onClick="return confirm('Apakah Kamu Yakin Ingin Menghapus Data Ini ? ')"><i class="fa fa-trash"></i> Delete</a>
                        </td>
                        <?php
                            } else {
                        ?>
                        <td>
                            <font class="btn btn-success">Tidak Dapat Diedit Lagi</font>
                        </td>
                        <?php
                            }
                          } else if($qrow['level'] == 'kasubag'){
                        ?>
                        <td>
                            <a href="komplain_proses.php?id=<?php echo $userRow['id'];?>" class="btn btn-success"><i class="fa fa-wrench"></i> Proses Komplain</a>
                            <!-- <a href="komplain_edit.php?id=<?php echo $userRow['id'];?>" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a> -->
                            <a href="komplain_delete_kasubag.php?id=<?php echo $userRow['id'];?>" class="btn btn-danger" onClick="return confirm('Data ini akan dihapus dan mengirim notifikasi kepada mahasiswa ? ')"><i class="fa fa-trash"></i> Delete</a>
                        </td>
                        <?php
                          } else if($qrow['level'] == 'wakil dekan 2'){
                        ?>
                        <td>
                            <a href="komplain_proses.php?id=<?php echo $userRow['id'];?>" class="btn btn-success"><i class="fa fa-wrench"></i> Proses Komplain</a>
                        </td>
                        <?php

                          } else if($qrow['level'] == 'dekan'){
                        ?>
                        <td>
                            <a href="komplain_proses.php?id=<?php echo $userRow['id'];?>" class="btn btn-success"><i class="fa fa-wrench"></i> Proses Komplain</a>
                        </td>
                        <?php
                          } else {
                        ?>
                        <td>
                            <a href="komplain_proses.php?id=<?php echo $userRow['id'];?>" class="btn btn-success"><i class="fa fa-wrench"></i> Proses Komplain</a>
                            <a href="komplain_edit.php?id=<?php echo $userRow['id'];?>" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                            <a href="komplain_delete.php?id=<?php echo $userRow['id'];?>" class="btn btn-danger" onClick="return confirm('Apakah Kamu Yakin Ingin Menghapus Data Ini ? ')"><i class="fa fa-trash"></i> Delete</a>
                        </td>
                        <?php
                          }
                        ?>
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
