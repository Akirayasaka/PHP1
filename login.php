<?php
  ob_start();
  include_once "base.php"; 

    if(!empty($_POST)){

      $acc = $_POST['acc'];
      $pw  = $_POST['pw'];

        if($acc == "" || $pw == ""){

           echo "<h2 class='alert-danger text-center'>Invaild value</h2>";

        }else{

          $sql = "select count(*) from user where acc='".$acc."' && pw='".$pw."'";
          $user = $pdo->query($sql)->fetchColumn();

          if($user){
            $_SESSION['login'] = true;
            $_SESSION['user'] = $acc;

            echo $acc;

              if( $acc == 'admin'){
                jsm("index.php?do=admin");
 
              }else{
                jsm("index.php?do=member");
              }

          }else{
            echo "<h2 class='alert-danger text-center'>ID or Password Error!</h2>";
          }
        }
    }

  if (empty($_SESSION['login'])){

?>
<div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
            <div class="col-lg-6">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">歡迎!</h1>
                </div>
                <form class="user" action="index.php?do=login" method="POST">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="acc" value="" id="exampleInputEmail"
                      aria-describedby="emailHelp" placeholder="Enter Account">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-user" name="pw" value=""
                      id="exampleInputPassword" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                      <input type="checkbox" class="custom-control-input" id="customCheck">
                      <label class="custom-control-label" for="customCheck">Remember Me</label>
                    </div>
                  </div>
                  <input type="submit" value="Login" class="btn btn-primary btn-user btn-block">
                  <!-- <hr>
                  <a href="#" class="btn btn-google btn-user btn-block">
                    <i class="fab fa-google fa-fw"></i> Login with Google
                  </a>
                  <a href="#" class="btn btn-facebook btn-user btn-block">
                    <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                  </a> -->
                </form>
                <hr>
                <div class="text-center">
                  <a class="small" href="index.php?do=forgot-password">忘記密碼?</a>
                </div>
                <div class="text-center">
                  <a class="small" href="index.php?do=register">建立帳號!</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>

<?php
  
  }else{
     echo "<h3>已登入中</h3><br>";
     echo "<hr>";
     echo "Back to <a href='index.php?do=member'>Member Page</a>";
  }
  ob_end_flush();
?>