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

            <form method="post" action="registerprocess.php" class="pt-3" enctype="multipart/form-data">
              <div class="form-group">
                <input type="text" name="reader_name" class="form-control form-control-lg" placeholder="Enter Your Name" required>
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
              <div class="form-group">
                <input type="text" name="phone" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Enter Your phone">
              </div>
              <div class="form-group">
                <input type="text" name="address" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Enter Your address">
              </div>
              <div class="form-group">
                <select name="country_id">
                  <option value="" selected disabled>Select your country</option>
                  <?php
                  include "../assets/includes/db.php";
                  $query = 'SELECT * FROM countries';
                  $data = mysqli_query($conn, $query) or die('Query failed');
                  while ($row = mysqli_fetch_assoc($data)) {
                  ?>
                    <option value="<?php echo htmlspecialchars($row['id']); ?>"><?php echo htmlspecialchars($row['name']); ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <input type="file" name="profile_image" class="form-control form-control-lg" id="exampleInputProfileImage" onchange="previewImage(event)">

                <img id="imagePreview" src="" alt="Image Preview" style="display: none; max-width: 100%; margin-top: 10px;" />

                <button type="button" id="removeImage" class="btn btn-danger btn-sm mt-2" style="display: none;" onclick="removeImage()">Remove</button>
              </div>

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
<script>
  function previewImage(event) {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function() {
        const preview = document.getElementById('imagePreview');
        preview.src = reader.result;
        preview.style.display = 'block';

        document.getElementById('removeImage').style.display = 'inline-block';
      };
      reader.readAsDataURL(file);
    }
  }

  function removeImage() {
    const input = document.getElementById('exampleInputProfileImage');
    const preview = document.getElementById('imagePreview');
    const removeBtn = document.getElementById('removeImage');

    // Clear preview image
    preview.src = '';
    preview.style.display = 'none';

    // Hide remove button
    removeBtn.style.display = 'none';

    // Clear file input (force reset)
    input.value = '';
  }
  
</script>

<?php include "../assets/includes/footer.php"; ?>