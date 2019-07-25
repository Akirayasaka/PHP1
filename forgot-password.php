<div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
            <div class="col-lg-6">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-2">忘記密碼???</h1>
                  <p class="mb-4">We get it, stuff happens. Just enter your email address below and we'll send you a
                    link to reset your password!</p>
                </div>
                <form class="user">
                  <div class="form-group">
                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                      aria-describedby="emailHelp" placeholder="Enter Email Address...">
                  </div>
                  <a href="#" class="btn btn-success btn-user btn-block" onclick="msg()">
                    Reset Password
                  </a>
                </form>
                <hr>
                <div class="text-center">
                  <a class="small" href="index.php?do=register">建立帳號!</a>
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

  </div>

</div>
<script>
  function msg() {
    this.preventDefault;
    alert("Please check your E-mail for reset Password!");
  }
</script>