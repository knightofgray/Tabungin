<?php

  /* USER : mcmonroew
     PASS : akuhuda */

  session_start();
  require_once "system/db.php";
  $respon = '';

  /* <!--CEK LOGIN */
  if(isset($_POST['login'])){
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    /* CEK APAKAH USER ADA APA TIDAK */
    if($query = $mysqli->query("SELECT * FROM users WHERE username = '$user' || email = '$user'")){

      /* CEK KESAMAAN PASSWORD */
      $row = $query->fetch_assoc();
      $nama = $row['nama'];
      if(password_verify($pass, $row['password'])){
        $_SESSION['id'] = $row['id'];
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['user'] = $row['username'];
        $_SESSION['pass'] = $row['password'];

        header('Location: '.$url.'user');
      }else{
        $respon = 'swal({   title: "Error!",   text: "Akun Belum Terdaftar!",   type: "error",   confirmButtonText: "Close" });';
      }

    }else{
      $respon = 'swal({   title: "Error!",   text: "Akun Belum Terdaftar!",   type: "error",   confirmButtonText: "Close" });';
    }

  }
  /* CEK LOGIN--> */

  /* <!--CEK DAFTAR */
  if(isset($_POST['daftar'])){
    $nama = $mysqli->real_escape_string($_POST['nama']);
    $email = $_POST['email'];
    $user = $mysqli->real_escape_string($_POST['user']);
    $pass = $_POST['pass'];
    $pass2 = $_POST['pass2'];

    /* CEK APAKAH USER SUDAH TERDAFTAR */
    if($query = $mysqli->query("SELECT username, email FROM users WHERE username = '$user' || email = '$user'")){

      /* 1 = Sudah Terdaftar; 0 = Tidak Ada */
      $jum = $query->num_rows;

      /* JIKA SUDAH TERDAFTAR */
      if($jum == "1"){
        $respon = 'swal("Error!", "Akun Telah Terdaftar!", "error")';
      } else {

        /* JIKA BELUM TERDAFTAR */
        /* CEK PASSWORD SAMA ATAU TIDAK */
        if($pass == $pass2){

          /* HASH PASSWORD */
          $pwhash = password_hash($pass, PASSWORD_DEFAULT);

          /* TAMBAH AKUN KE DATABASE */
          if($mysqli->query("INSERT INTO users SET username='$user', password='$pwhash', email='$email', nama='$nama'")){
            $respon = 'swal("Berhasil!", "Terima Kasih Telah Mendaftar, Silahkan Login :)", "success")';
          } else{
            $respon = 'swal("Error!", "Gagal Daftar! Errornya : '.$mysqli->error.'", "error")';
          }

        } else{
          $respon = 'swal("Error!", "Password Tidak Sama!", "error")';
        }

      }

    }

  }
  /* CEK DAFTAR--> */


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Tabungin - Atur Uang Sakumu!</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="assets/css/ionicons.min.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="assets/css/main.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="assets/css/owl.carousel.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="assets/css/owl.transitions.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="assets/css/animate.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="assets/css/hover.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="assets/css/sweetalert.css" media="screen" title="no title" charset="utf-8">


    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
  </head>
  <body>

    <!-- Slider -->
    <section class="hidden-xs" id="slider">
        <div class="slider-top">
          <div class="item"  style="background:100% url('assets/img/bg.png');background-size:cover">
             <div class="col-lg-6 col-md-6 col-sm-12">
              <img class="animated bounce img-responsive img-slider-first hvr-hang" src="assets/img/iphone.png" alt="Kucing">
             </div>
             <div class="col-lg-6 col-md-6 col-sm-12 slider-konten item-pertama">
                <h1>TABUNGIN</h1>
                <p>Atur Uang Sakumu!</p><hr>
                <small>&nbsp;&nbsp;&nbsp;&nbsp;Pengen beli barang tapi uang saku enggak cukup ? TABUNGIN aja ! Disini kamu bisa memaksimalkan uang saku untuk hal yang lebih bermanfaat dan mengaturnya untuk kebutuhan yang lebih penting.<br><br>&nbsp;&nbsp;&nbsp;&nbsp;Lalu, apa saja yang harus kamu lakukan ? Hanya klik daftar, atur tabungan dan foto benda yang mau kamu jadikan acuan untuk menabung. <i>Sesimple itu!</i> </small><br><br>
                <a class="btn btn-success hvr-wobble-horizontal" data-toggle="modal" data-target="#dafmodal">Daftar Sekarang &nbsp;&nbsp;&nbsp;<i class="ion-ios-checkmark-outline"></i></a>
             </div>
          </div>

          <div class="item"  style="background:100% url('assets/img/bg2.png');background-size:cover">
             <div class="col-lg-4 col-md-4 col-sm-12 slider-konten hvr-float">
              <center><h3>Terukur</h3></center>
              <div class="panel panel-success fitur-slider">
                  <div class="panel-body">
                    <i class="ion-iphone"></i>
                    <h4 class="fitur-slide-title">Menulis tabungan dengan mudah tanpa susah-susah membawa buku tulis sebagai catatan.</h4>
                  </div>
                </div>
             </div>
            <div class="col-lg-4 col-md-4 col-sm-12 slider-konten hvr-float">
              <center><h3>Mudah Digunakan</h3></center>
              <div class="panel panel-success fitur-slider">
                  <div class="panel-body">
                    <i class="ion-ios-lightbulb-outline"></i>
                    <h4 class="fitur-slide-title">TABUNGIN akan membantu menghitung jangka waktu untuk mendapatkan barang idaman kamu.</h4>
                  </div>
                </div>
             </div>
            <div class="col-lg-4 col-md-4 col-sm-12 slider-konten hvr-float">
              <center><h3>Fitur Menarik</h3></center>
              <div class="panel panel-success fitur-slider">
                  <div class="panel-body">
                    <i class="ion-ios-compose-outline"></i>
                    <h4 class="fitur-slide-title">Saat uang saku untuk beli barang kamu dipinjam oleh teman, jangan lupa tulis <span style="font-style: italic;">hutangnya</span> !</h4>
                  </div>
                </div>
             </div>
          </div>

          <div class="item"  style="background:100% url('assets/img/bg.png');background-size:cover">
              <ul class="langkah">
                  <li><h1>Opo</h1></li>
                  <li><h1>Opo</h1></li>
                  <li><h1>Opo</h1></li>
                  <li><h1>Opo</h1></li>
                  <li><h1>Opo</h1></li>

              </ul>
          </div>

          <div class="item">
              Your Content4
          </div>

        </div>

        <button class="slider-btn btn btn-success btn-circle next"><i class="ion-ios-arrow-forward"></i></button>
        <button class="slider-btn btn btn-success btn-circle prev"><i class="ion-ios-arrow-back"></i></button>
    </section>
    <!--/ Slider -->

    <!-- Fitur -->
    <section class="efek" id="fitur">
       <div class="container">
        <div class="col-lg-6 col-sm-6">
            <h3>Daftar</h3>
            <p>TABUNGIN adalah asisten pribadi kamu yang akan mengingatkan kamu menabung saat ingin membeli barang dari uang saku kamu. Penggunaannya yang mudah dan praktis. Ayo gabung gratis sekarang!</p>
            <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#dafmodal"><i class="ion-edit"></i>&nbsp;&nbsp;Daftar</a>
            <button class="btn btn-sm btn-primary"><i class="ion-social-facebook"></i>&nbsp;&nbsp;Daftar dengan Facebook</button>
        </div>
        <div class="col-lg-6 col-sm-6">
            <h3>Masuk</h3>
            <div class="well success bs-component">
              <form method="POST" class="form-horizontal">
                <fieldset>
                  <div class="form-group">
                    <div class="col-lg-6">
                      <input style="margin-top:0.3em" name="user" type="text" class="form-control input-sm" placeholder="Username / Email" required>
                    </div>
                    <div class="col-lg-6">
                      <input style="margin-top:0.3em" name="pass" type="password" class="form-control input-sm" placeholder="Password" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-12">
                      <button type="reset" class="btn btn-sm btn-default"><i class="ion-ios-help-outline"></i>&nbsp;
                     Lupa Password ?</button>
                      <button name="login" type="submit" class="btn btn-sm btn-success"><i class="ion-log-in"></i>&nbsp;&nbsp;Masuk</button>
                    </div>
                  </div>
                </fieldset>
              </form>
            </div>
        </div>
        </div>
    </section>
    <!--/ Fitur -->

    <!-- Footer -->
    <footer class="footer">
      <div class="container-fluid">
        <p class="text-muted">&copy; <?= date('Y') ?> - Cendikia.</p>
      </div>
    </footer>
    <!--/ Footer -->

    <!-- Modal Daftar -->
    <div class="animated slideInDown modal" id="dafmodal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><i class="ion-ios-download-outline"></i> Daftar Sekarang</h4>
          </div>
          <div class="modal-body">
            <form method="POST" class="form-horizontal">
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">Nama</label>
                  <div class="col-lg-10">
                    <input name="nama" type="text" class="form-control input-sm" placeholder="Nama" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">Username</label>
                  <div class="col-lg-10">
                    <input name="user" type="text" class="form-control input-sm" placeholder="Username" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                  <div class="col-lg-10">
                    <input name="email" type="email" class="form-control input-sm" placeholder="Email" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                  <div class="col-lg-10">
                    <input name="pass" type="password" class="form-control input-sm" placeholder="Password" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword" class="col-lg-2 control-label">Konfirmasi</label>
                  <div class="col-lg-10">
                    <input name="pass2" type="password" class="form-control input-sm" placeholder="Konfirmasi Password" required>
                  </div>
                </div>
                <div class="panel panel-xs">Dengan klik <button type="button" class="btn btn-xs btn-success"><i class="ion-log-in"></i>&nbsp;&nbsp;Daftar</button> Anda setuju dengan semua persetujuan dan ketentuan Kami salah satunya adalah penggunaan cookie.</div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"><i class="ion-close"></i>&nbsp;&nbsp;Tutup</button>
            <button name="daftar" type="submit" class="btn btn-sm btn-success"><i class="ion-log-in"></i>&nbsp;&nbsp;Daftar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!--/ Modal Daftar -->

    <script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>
    <script type="text/javascript" src="assets/js/sweetalert.min.js"></script>
    <script><?= $respon ?></script>
  </body>
</html>
