<?php include "../assets/includes/header.php"; ?>

  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row flex-grow">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo">
                <img src="../assets/images/logo.svg">
              </div>
              <h4>New here?</h4>
              <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>

              <form method="post" action="registerprocess.php" class="pt-3">
                <div class="form-group">
                  <input type="text" name="full_name" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Enter Your Username">
                </div>
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Enter Your Email">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Enter Your Password">
                </div>
                <div class="form-group">
                  <input type="password" name="confirm_password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Enter Your Confirm Password">
                </div>
                <!-- <div class="form-group">
                  <label for="role">Select Role</label>
                  <div class="input-container">
                    <input type="checkbox" name="role" value="author"> Author
                  </div>
                </div> -->
                <div class="mb-4">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input"> I agree to all Terms & Conditions </label>
                  </div>
                </div>
                <div class="mt-3 d-grid gap-2">
                <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
                </div>
                <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="login.php" class="text-primary">Login</a>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <?php include "../assets/includes/footer.php"; ?>