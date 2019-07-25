 <?php
  include_once "base.php";

  if (!empty($_POST)) {

    $acc = $_POST['acc'];
    $pw = $_POST['pw'];
    $name = $_POST['name'];

    $accErr = chkform(['space', 'length', 'sym'], $acc);
    $pwErr = chkform(['space', 'length', 'sym', 'num', 'eng'], $pw);
    $nameErr = chkform(['space', 'sym'], $name);

    $sql = "select acc from user where acc ='$acc'";
    $chkAcc = $pdo->query($sql)->fetch();
    if ($chkAcc) {
      $chkAccount = true;
      echo "The account has been used.";
    } else {
      $chkAccount = false;
    }

    if ($accErr == "" && $pwErr == "" && $nameErr == "" && $chkAccount == false) {

      $sql = "insert into user(`acc`,`pw`,`name`) values('$acc','$pw','$name')";
      $result = $pdo->query($sql);
      if ($result) {
        echo "Register Success";
      } else {
        echo "Register Failed";
      }
    }
  }


  ?>
 <div class="container">

   <div class="card o-hidden border-0 shadow-lg my-5">
     <div class="card-body p-0">
       <!-- Nested Row within Card Body -->
       <div class="row">
         <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
         <div class="col-lg-7">
           <div class="p-5">
             <div class="text-center">
               <h1 class="h4 text-gray-900 mb-4">建立個人帳戶!</h1>
             </div>
             <form class="user" action="index.php?do=register" method="POST">

               <div class="form-group">
                 <input type="text" class="form-control form-control-user" id="acc" name="acc" placeholder="Account">
                 <p class="text-danger">
                   <?php
                    if (!empty($accErr)) {
                      echo $accErr;
                    }
                    ?>
                 </p>
               </div>
               <div class="form-group">
                 <input type="password" class="form-control form-control-user" id="pw" name="pw" placeholder="Password">
                 <p class="text-danger">
                   <?php
                    if (!empty($pwErr)) {
                      echo $pwErr;
                    }
                    ?>
                 </p>
               </div>
               <div class="form-group">
                 <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Name">
                 <p class="text-danger">
                   <?php
                    if (!empty($nameErr)) {
                      echo $nameErr;
                    }
                    ?>
                 </p>
               </div>
               <div class="form-group row">
                 <div class="col-sm-6 mb-3 mb-sm-0">
                   <input type="submit" class="btn btn-info btn-user btn-block" value="建立">
                 </div>
                 <div class="col-sm-6">
                   <input type="reset" class="btn btn-dark btn-user btn-block">
                 </div>
               </div>

               <!-- <hr>
               <a href="#" class="btn btn-google btn-user btn-block">
                 <i class="fab fa-google fa-fw"></i> Register with Google
               </a>
               <a href="#" class="btn btn-facebook btn-user btn-block">
                 <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
               </a> -->
             </form>
             <hr>
             <div class="text-center">
               <a class="small" href="index.php?do=forgot-password">忘記密碼?</a>
             </div>
             <div class="text-center">
               <a class="small" href="index.php?do=login">已經有帳戶?</a>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>

 </div>