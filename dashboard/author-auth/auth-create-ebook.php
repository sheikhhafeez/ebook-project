<?php

session_start();

if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] != 2) {
  header("location: ../login-auth/login.php");
  exit;
}
include "../assets/includes/header.php"; ?>

    <div class="container-scroller">
      <!-- <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-3">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/purple-bootstrap-admin-template/" target="_blank" class="btn me-2 buy-now-btn border-0">Buy Now</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/purple-bootstrap-admin-template/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white mr-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div> -->
      <!-- partial:partials/_navbar.php -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
          <a class="navbar-brand brand-logo" href="index.php"><img src="../assets/images/logo.svg" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="index.php"><img src="../assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-md-block">
            <form class="d-flex align-items-center h-100" action="#">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
              </div>
            </form>
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="../assets/images/faces/face1.jpg" alt="image">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black">David Greymaax</p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="#">
                  <i class="mdi mdi-cached me-2 text-success"></i> Activity Log </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../login-auth/logout.php">
                  <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
              </div>
            </li>
            <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-email-outline"></i>
                <span class="count-symbol bg-warning"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-end navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                <h6 class="p-3 mb-0">Messages</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="../assets/images/faces/face4.jpg" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a message</h6>
                    <p class="text-gray mb-0"> 1 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="../assets/images/faces/face2.jpg" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a message</h6>
                    <p class="text-gray mb-0"> 15 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="../assets/images/faces/face3.jpg" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Profile picture updated</h6>
                    <p class="text-gray mb-0"> 18 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <h6 class="p-3 mb-0 text-center">4 new messages</h6>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                <i class="mdi mdi-bell-outline"></i>
                <span class="count-symbol bg-danger"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-end navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <h6 class="p-3 mb-0">Notifications</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-success">
                      <i class="mdi mdi-calendar"></i>
                    </div>
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject font-weight-normal mb-1">Event today</h6>
                    <p class="text-gray ellipsis mb-0"> Just a reminder that you have an event today </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-warning">
                      <i class="mdi mdi-cog"></i>
                    </div>
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject font-weight-normal mb-1">Settings</h6>
                    <p class="text-gray ellipsis mb-0"> Update dashboard </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-info">
                      <i class="mdi mdi-link-variant"></i>
                    </div>
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject font-weight-normal mb-1">Launch Admin</h6>
                    <p class="text-gray ellipsis mb-0"> New admin wow! </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <h6 class="p-3 mb-0 text-center">See all notifications</h6>
              </div>
            </li>
            <li class="nav-item nav-logout d-none d-lg-block">
              <a class="nav-link" href="#">
                <i class="mdi mdi-power"></i>
              </a>
            </li>
            <li class="nav-item nav-settings d-none d-lg-block">
              <a class="nav-link" href="#">
                <i class="mdi mdi-format-line-spacing"></i>
              </a>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.php -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="../assets/images/faces/face1.jpg" alt="profile" />
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">David Grey. H</span>
                  <span class="text-secondary text-small">Project Manager</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="auth-create-ebook.php">
                <span class="menu-title">Create Books</span>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="auth-view.php">
                <span class="menu-title">Edit Books</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Create E-Books </h3>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Create</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create E-Books</li>
                  </ol>
                </nav>
              </div>
              <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Add a New eBook to the Library</h4>
                        <form class="forms-sample" action="auth-insert-ebook.php" method="POST" enctype="multipart/form-data">
                          <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" name="title" class="form-control" id="exampleInputName1" placeholder="Name">
                          </div>
                          <!-- <div class="form-group">
                            <label for="exampleInputName1">Author ID</label>
                            <input type="text" name="author_id" class="form-control" id="exampleInputName1" placeholder="Name">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputName1">Category ID</label>
                            <input type="text" name="category_id" class="form-control" id="exampleInputName1" placeholder="Name">
                          </div> -->
                          <div class="form-group">
                            <label for="exampleInputName1">Description</label>
                            <input type="text" name="description" class="form-control" id="exampleInputName1" placeholder="Name">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputName1">Language</label>
                            <input type="text" name="language" class="form-control" id="exampleInputName1" placeholder="Name">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputName1">ISBN</label>
                            <input type="text" name="isbn" class="form-control" id="exampleInputName1" placeholder="Name">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputName1">Price</label>
                            <input type="text" name="price" class="form-control" id="exampleInputName1" placeholder="Name">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputName1">Is Free</label>
                            <select name="is_free" class="form-control" id="is_free">
                              <option value="1">Yes</option>
                              <option value="0">No</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="published_at">Published Date</label>
                            <input type="date" name="published_at" class="form-control" id="exampleInputName1" placeholder="Name">
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
                          <button class="btn btn-light">Cancel</button>
                        </form>
                      </div>
                    </div>
                  </div>
                <!-- <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Add Books</h4>
                        </p>
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th> User </th>
                              <th> First name </th>
                              <th> Progress </th>
                              <th> Amount </th>
                              <th> Deadline </th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="py-1">
                                <img src="../assets/images/faces-clipart/pic-1.png" alt="image" />
                              </td>
                              <td> Herman Beck </td>
                              <td>
                                <div class="progress">
                                  <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                              </td>
                              <td> $ 77.99 </td>
                              <td> May 15, 2015 </td>
                            </tr>
                            <tr>
                              <td class="py-1">
                                <img src="../assets/images/faces-clipart/pic-2.png" alt="image" />
                              </td>
                              <td> Messsy Adam </td>
                              <td>
                                <div class="progress">
                                  <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                              </td>
                              <td> $245.30 </td>
                              <td> July 1, 2015 </td>
                            </tr>
                            <tr>
                              <td class="py-1">
                                <img src="../assets/images/faces-clipart/pic-3.png" alt="image" />
                              </td>
                              <td> John Richards </td>
                              <td>
                                <div class="progress">
                                  <div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                              </td>
                              <td> $138.00 </td>
                              <td> Apr 12, 2015 </td>
                            </tr>
                            <tr>
                              <td class="py-1">
                                <img src="../assets/images/faces-clipart/pic-4.png" alt="image" />
                              </td>
                              <td> Peter Meggik </td>
                              <td>
                                <div class="progress">
                                  <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                              </td>
                              <td> $ 77.99 </td>
                              <td> May 15, 2015 </td>
                            </tr>
                            <tr>
                              <td class="py-1">
                                <img src="../assets/images/faces-clipart/pic-1.png" alt="image" />
                              </td>
                              <td> Edward </td>
                              <td>
                                <div class="progress">
                                  <div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                              </td>
                              <td> $ 160.25 </td>
                              <td> May 03, 2015 </td>
                            </tr>
                            <tr>
                              <td class="py-1">
                                <img src="../assets/images/faces-clipart/pic-2.png" alt="image" />
                              </td>
                              <td> John Doe </td>
                              <td>
                                <div class="progress">
                                  <div class="progress-bar bg-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                              </td>
                              <td> $ 123.21 </td>
                              <td> April 05, 2015 </td>
                            </tr>
                            <tr>
                              <td class="py-1">
                                <img src="../assets/images/faces-clipart/pic-3.png" alt="image" />
                              </td>
                              <td> Henry Tom </td>
                              <td>
                                <div class="progress">
                                  <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                              </td>
                              <td> $ 150.00 </td>
                              <td> June 16, 2015 </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                </div> -->
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <?php include "../assets/includes/footer.php"; ?>