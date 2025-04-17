<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
<style>
  form{
    width: 500px;
    margin: auto;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    padding: 20px;
  }
</style>

<?php include "../../assets/includes/header.php"; ?>

<div class="main-panel" style="overflow-x: hidden;">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title text-center"> Create E-Books </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item text-center"><a href="#">Create</a></li>
          <li class="breadcrumb-item active text-center" aria-current="page">Create E-Books</li>
        </ol>
      </nav>
    </div>

    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card w-100">
          <div class="card-body">
            <form class="forms-sample" action="reader-insert-ebook.php" method="POST" enctype="multipart/form-data">
            <h4 class="card-title">Add a New eBook to the Library</h4>
              <div class="form-group">
                <label for="title">Name</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Enter book title">
              </div>

              <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" class="form-control" id="description" placeholder="Enter book description">
              </div>

              <div class="form-group">
                <label for="language">Language</label>
                <input type="text" name="language" class="form-control" id="language" placeholder="Language">
              </div>

              <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="text" name="isbn" class="form-control" id="isbn" placeholder="ISBN number">
              </div>

              <div class="form-group">
                <label for="price">Price</label>
                <input type="text" name="price" class="form-control" id="price" placeholder="Enter price">
              </div>

              <div class="form-group">
                <label for="is_free">Is Free</label>
                <select name="is_free" class="form-control" id="is_free">
                  <option value="1">Yes</option>
                  <option value="0">No</option>
                </select>
              </div>

              <div class="form-group">
                <label for="published_at">Published Date</label>
                <input type="date" name="published_at" class="form-control" id="published_at">
              </div>

              <div class="form-group">
                <label>Cover Image</label>
                <input type="file" name="cover_image" class="file-upload-default" id="coverImageInput" style="display: none;">
                <div class="input-group w-100">
                  <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image" id="coverImageText">
                  <div class="input-group-append">
                    <button class="file-upload-browse btn btn-gradient-primary" type="button" onclick="document.getElementById('coverImageInput').click();">Upload</button>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label>File Upload</label>
                <input type="file" name="file_path" class="file-upload-default" id="filePathInput" style="display: none;">
                <div class="input-group w-100">
                  <input type="text" class="form-control file-upload-info" disabled placeholder="Upload File" id="filePathText">
                  <div class="input-group-append">
                    <button class="file-upload-browse btn btn-gradient-primary" type="button" onclick="document.getElementById('filePathInput').click();">Upload</button>
                  </div>
                </div>
              </div>

              <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
              <button type="button" class="btn btn-light">Cancel</button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  document.getElementById("coverImageInput").addEventListener("change", function () {
    document.getElementById("coverImageText").value = this.files[0].name;
  });

  document.getElementById("filePathInput").addEventListener("change", function () {
    document.getElementById("filePathText").value = this.files[0].name;
  });
</script>

<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<?php include "../../assets/includes/footer.php"; ?>