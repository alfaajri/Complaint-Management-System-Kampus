<div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          <div class="navbar nav_title" style="border: 0;">
            <a href="" class="site_title"><img src="images/logo.png" width="50px" height="50px"></a>
            
          </div>
          <div class="clearfix"></div>

          <!-- menu prile quick info -->
          <div class="profile">
            <div class="profile_pic">
              <img src="foto/<?php echo $qrow['foto'];?>" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2><?php echo $qrow['nama'];?></h2>
            </div>
          </div>
          <!-- /menu prile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
              <h3><?php echo $qrow['level'];?></h3>
             
              <ul class="nav side-menu">
                <?php
                  if($qrow['level'] == 'mahasiswa'){
                ?>
                <li><a href="index.php"><i class="fa fa-home"></i> Home</a>
                </li>
                <li><a href="profil.php"><i class="fa fa-user"></i> Profil</a>
                </li>
                <li><a href="komplain_add.php"><i class="fa fa-desktop"></i> Kirim Komplain</a>
                </li>
                <li><a href="tanggapan.php"><i class="fa fa-table"></i> Tanggapan</a>
                </li>
                <li><a href="komplain.php"><i class="fa fa-bar-chart-o"></i> Data Komplain</a>
                </li>
                <?php
                  } else if($qrow['level'] == 'kasubag'){
                ?>
                <li><a href="index.php"><i class="fa fa-home"></i> Home</a>
                </li>
                <li><a href="profil.php"><i class="fa fa-user"></i> Profil</a>
                </li>
                <li><a href="komplain.php"><i class="fa fa-desktop"></i> Komplain Masuk</a>
                </li>
                <li><a href="laporan.php"><i class="fa fa-table"></i> Laporan</a>
                </li>
                <?php
                  } else if($qrow['level'] == 'wakil dekan 2'){
                ?>
                <li><a href="index.php"><i class="fa fa-home"></i> Home</a>
                </li>
                <li><a href="profil.php"><i class="fa fa-user"></i> Profil</a>
                </li>
                <li><a href="komplain.php"><i class="fa fa-desktop"></i> Komplain Masuk</a>
                </li>
                <li><a href="tanggapan.php"><i class="fa fa-table"></i> Daftar Tanggapan</a>
                </li>
                <li><a href="laporan.php"><i class="fa fa-bar-chart-o"></i> Laporan</a>
                </li>
                <?php
                  } else if($qrow['level'] == 'dekan'){
                ?>
                <li><a href="index.php"><i class="fa fa-home"></i> Home</a>
                </li>
                <li><a href="profil.php"><i class="fa fa-user"></i> Profil</a>
                </li>
                <li><a href="laporan.php"><i class="fa fa-bar-chart-o"></i> Laporan</a>
                </li>
                <?php
                  } else {
                ?>
                <li><a href="index.php"><i class="fa fa-home"></i> Home</a>
                </li>
                <li><a href="mahasiswa.php"><i class="fa fa-desktop"></i> Data Mahasiswa</a>
                </li>
                <li><a href="user.php"><i class="fa fa-user"></i> Data User</a>
                </li>
                <li><a href="laporan.php"><i class="fa fa-bar-chart-o"></i> Laporan</a>
                </li>
                
                <?php
                  }
                ?>
                
              </ul>
            </div>
           

          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
        <!--   <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div> -->
          <!-- /menu footer buttons -->
        </div>
      </div>