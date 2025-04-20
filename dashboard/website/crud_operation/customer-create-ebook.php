<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
<style>
  .card {
    width: 600px;
    margin: auto;
    margin-top: 50px;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
  }
</style>
<?php

include "../../assets/includes/header.php"; ?>

<div class="row">
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add a New eBook to the Library</h4>
        <form class="forms-sample" action="customer-insert-ebook.php" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputName1">Name</label>
            <input type="text" name="title" class="form-control" placeholder="Name">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Author ID</label>
            <input type="text" name="author_id" class="form-control" placeholder="Author ID">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Category ID</label>
            <input type="text" name="category_id" class="form-control" placeholder="Category ID">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Description</label>
            <input type="text" name="description" class="form-control" placeholder="Description">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Language</label>
            <input type="text" name="language" class="form-control" placeholder="Language">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">ISBN</label>
            <input type="text" name="isbn" class="form-control" placeholder="ISBN">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Price</label>
            <input type="text" name="price" class="form-control" placeholder="Price">
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
            <input type="date" name="published_at" class="form-control">
          </div>
          <div class="form-group">
            <label>Cover Image</label>
            <input type="file" name="cover_image" class="file-upload-default" id="coverImageInput" style="display: none;">
            <div class="input-group col-xs-12">
              <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image" id="coverImageText">
              <span class="input-group-append">
                <button class="file-upload-browse btn btn-gradient-primary py-3" type="button" onclick="document.getElementById('coverImageInput').click();">Upload</button>
              </span>
            </div>
          </div>
          <div class="form-group">
            <label>File Upload</label>
            <input type="file" name="file_path" class="file-upload-default" id="filePathInput" style="display: none;">
            <div class="input-group col-xs-12">
              <input type="text" class="form-control file-upload-info" disabled placeholder="Upload File" id="filePathText">
              <span class="input-group-append">
                <button class="file-upload-browse btn btn-gradient-primary py-3" type="button" onclick="document.getElementById('filePathInput').click();">Upload</button>
              </span>
            </div>
          </div>
          <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
          <button type="reset" class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  // Show selected file names
  document.getElementById('coverImageInput').addEventListener('change', function () {
    document.getElementById('coverImageText').value = this.files[0].name;
  });

  document.getElementById('filePathInput').addEventListener('change', function () {
    document.getElementById('filePathText').value = this.files[0].name;
  });
</script>

<style>
  .container-scroll {
    overflow: hidden; /* hides scroll bar */
  }
</style>

<!-- container-scroll scroll bar khtm kar dou is ka -->