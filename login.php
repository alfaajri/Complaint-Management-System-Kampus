<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Complain Management System</title>

  <!-- Bootstrap core CSS -->

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/icheck/flat/green.css" rel="stylesheet">


  <script src="js/jquery.min.js"></script>

  <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body style="background:#F7F7F7;">

  <div class="">
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>

    <div id="wrapper">
      <div id="login" class="animate form">

        <section class="login_content">
          <form action="check-login.php" method="POST">
            <h1>Login Form</h1>
            <div>
              <input type="text" class="form-control" name="nim" placeholder="Username" required="" maxlength="11" />
            </div>
            <div>
              <input type="password" class="form-control" name="password" placeholder="Password" required="" />
            </div>
            <div>
              <input type="submit" name="submit" value="Log in" class="btn btn-default submit">
            </div>
            <div class="clearfix"></div>
            <div class="separator">

              <p class="change_link">Tidak Punya Akun?
                <a href="#toregister" class="to_register"> Daftar Disini </a>
              </p>
              <div class="clearfix"></div>
              <br />
              <div>

                <h1><img src="images/logo.png" height="50px" width="50px"> Complain Management System</h1>

                <p>©2018 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms Custom By AlFajri</p>
              </div>
            </div>
          </form>
          <!-- form -->
        </section>
        <!-- content -->
      </div>
      <div id="register" class="animate form">
        <section class="login_content">
          <form action="register_akun.php" method="POST">
            <h1>Buat Account</h1>
            <div>
              <input type="text" class="form-control" name="nim" placeholder="Masukkan NIM" required="" maxlength="11" />
            </div>
            <div>
              <input type="email" class="form-control" name="email" placeholder="Email" required="" />
            </div>
            <div>
              <input type="password" class="form-control" name="password" placeholder="Password" required="" />
            </div>
            <div>
              <input type="submit" name="submit" value="Daftar" class="btn btn-default submit">
            </div>
            <div class="clearfix"></div>
            <div class="separator">

              <p class="change_link">Sudah Punya Akun ?
                <a href="#tologin" class="to_register"> Log in </a>
              </p>
              <div class="clearfix"></div>
              <br />
              <div>
                <h1><i class="fa fa-plane" style="font-size: 26px;"></i> Complain Management System</h1>

                <p>©2018 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms Custom By AlFajri</p>
              </div>
            </div>
          </form>
          <!-- form -->
        </section>
        <!-- content -->
      </div>
    </div>
  </div>

</body>

</html>
