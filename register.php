<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HR</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/hr.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<?php
  require("connect.php");
  if(isset($_GET['name'])) $name=$_GET['name'];else $name='';
  if(isset($_GET['email'])) $email=$_GET['email'];else $email='';
  if(isset($_GET['password1'])) $password1=$_GET['password1'];else $password1='';
  if(isset($_GET['password2'])) $password2=$_GET['password2'];else $password2='';
  if(isset($_GET['submit']))
  {

      if($password1 == $password2)
      {
          //lay ma id tu dong tang o bang quan tri
          $sqll = "SELECT * FROM quantri ORDER BY Id DESC LIMIT 1";
          $result = mysqli_query($conn, $sqll);
          $row = mysqli_fetch_array($result);
          $mamax = (int)substr($row['Id'],2);
          $mamax++;
          $length = strlen((string)$mamax);
          $maId = "Id";
          for ($i = 1; $i <= 3-$length; $i++)
            $maId .= "0";
          $maId .= $mamax;
          //var_dump($maId);

          //lay ma id tu dong tang o bang nhan vien
          $sqlli = "SELECT * FROM nhanvien ORDER BY Id DESC LIMIT 1";
          $result = mysqli_query($conn, $sqlli);
          $rows = mysqli_fetch_array($result);
          $mamax1 = (int)substr($rows['MaNV'],4);
          $mamax1++;
          $length = strlen((string)$mamax1);
          $maNV = "MaNV";
          for ($i = 1; $i <= 3-$length; $i++)
            $maNV .= "0";
          $maNV .= $mamax1;
          //var_dump($maId);

          //insert vao table nhan vien
          $sqli = "INSERT INTO quantri(Id,UserName,Password,HoTen,Quyen)
                    VALUES('$maId','$email','$password1','$name','nhanvien')";
          $sqlii = "INSERT INTO nhanvien(MaNV,HoTen,Id,Sdt,HinhAnh,email,MaBP)
                    VALUES('$maNV','$name','$maId','','avatar.png','$email','MaBP003')";
          if (mysqli_query($conn, $sqli) && mysqli_query($conn, $sqlii))
                {
                  echo "<script>alert('Đăng ký thành công !')</script>";           
                }
                else
                  echo "<script>alert('Đăng ký thất bại !')</script>";
      }
      else
      {
        $thongbao = 'password không trùng nhau !';
      }
  }
?>

<div class="register-box">
  <div class="register-logo">
    <a href="#"><b>Đăng Kí</b></a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="" method="get">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="name" placeholder="Full name" required="required">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email" required="required">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password1" placeholder="Password" required="required">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password2" placeholder="Retype password" required="required">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>

        </div>
        <div class="row" style="color: red">
            <?php if(isset($thongbao)) echo $thongbao; ?>
        </div>
        <div class="row">
          <div class="col-8">
            <!-- <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div> -->
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name ="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div> -->

      <a href="login.php" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->

</body>
</html>
