<?php
session_start();

if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] != 2) {
  header("location: ../login-auth/login.php");
  exit;
}
 include "../assets/includes/header.php"; ?>
<style>
    .profile-card {
  background: #fff;
  padding: 30px;
  border-radius: 15px;
  text-align: center;
  box-shadow: 0 10px 25px rgba(0,0,0,0.1);
  /* max-width: 300px; */
  width: 100%;
}

.profile-pic {
  width: 100px;
  height: 100px;
  object-fit: cover;
  border-radius: 50%;
  margin-bottom: 15px;
}

.name {
  margin: 10px 0 5px;
  font-size: 22px;
  color: #333;
}

.bio {
  font-size: 14px;
  color: #777;
  margin: 5px 0;
}

.email {
  font-size: 14px;
  color: #555;
  margin-top: 10px;
}
</style>
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
                <a class="dropdown-item" href="#">
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
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="auth-view.php">
                <span class="menu-title">View Books</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="auth-profile.php">
                <span class="menu-title">Profile</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Profile
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="row">

            <div class="profile-card col-md-12 grid-margin ">

            <?php
                $authorsql = "SELECT author_id FROM authors where user_id = " . $_SESSION['user_id'] ;
                $author_id = $conn->query($authorsql);
                $num = mysqli_num_rows($author_id);

                $sql = "SELECT author_name, bio, profile_image FROM authors WHERE author_id = $num";
                $result = $conn->query($sql);

                    $row = $result->fetch_assoc();

                    if (!empty($row['profile_image'])) {
                        $imagePath = "../uploads/images/" . htmlspecialchars($row['profile_image']);
                    } else {

                        $imagePath = "https://randomuser.me/api/portraits/men/75.jpg";
                    }

                    if (!empty($row['author_name'])) {
                        $author_name = htmlspecialchars($row['author_name']);
                    } else {

                        $author_name = "User";
                    }
                    if (!empty($row['bio'])) {
                        $bio = htmlspecialchars($row['bio']);
                    } else {

                        $bio = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,";
                    }


                    $emailsql = "SELECT email FROM users WHERE id = " . $_SESSION['user_id'];
                    $emailresult = $conn->query($emailsql);
    
                    $emailrow = $emailresult->fetch_assoc();
                    
                    if (!empty($emailrow['email'])) {
                        $email = htmlspecialchars($emailrow['email']);
                    } else {

                        $email = "abc@gmail.com";
                    }

                    echo '<img src="' . $imagePath . '" alt="User Picture" class="profile-pic" style="height:150px; width:150px;">';
                    echo '<h2 class="name">'. $author_name .'</h2>';
                    echo '<p class="bio">'. $bio .'</p>';
                    echo '<p class="email">'. $email .'</p>';

                ?>

                
            </div>

            </div>
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">All Books</h4>
                    <div class="table-responsive">
                    <table class="table">
                    <thead>
                      <tr>
                        <th>Book</th>
                        <th>Price</th>
                        <th>Access</th>
                        <th>Images</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      
                      $authorsql = "SELECT author_id FROM authors where user_id = " . $_SESSION['user_id'] ;
                      $author_id = $conn->query($authorsql);
                      $num = mysqli_num_rows($author_id);
                      $sql = "SELECT * FROM ebooks where author_id = " . $num ;
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0):
                        while ($row = $result->fetch_assoc()):
                      ?>
                          <tr>
                            <td><?= htmlspecialchars($row['title']) ?></td>
                            <td><?= htmlspecialchars($row['price']) ?></td>
                            <td>
                              <?php if (!empty($row['file_path'])): ?>
                                <!-- Displaying the book name instead of 'Download eBook' -->
                                <a href="../uploads/files/<?= htmlspecialchars($row['file_path']) ?>" class="btn btn-info btn-sm" download>
                                  <?= basename($row['file_path']) ?> <!-- This will display the file name -->
                                </a>
                              <?php else: ?>
                                <span>No File Available</span>
                              <?php endif; ?>
                            </td>


                            <td>
                              <?php if (!empty($row['cover_image'])): ?>
                                <img src="../uploads/images/<?= htmlspecialchars($row['cover_image']) ?>" alt="Cover Image" style="width: 100px; height: 120px; border-radius: 0;">
                              <?php else: ?>
                                <img src="https://via.placeholder.com/100x150?text=No+Image" alt="No Image" style="width: 100px; height: 150px; border-radius: 0;">
                              <?php endif; ?>
                            </td>


                            <td>
                              <span>
                                <a href="edit-book-form.php?id=<?= $row['ebook_id'] ?>" class="btn btn-gradient-info btn-fw">Edit</a>
                                <a href="admin-delete-ebook.php?id=<?= $row['ebook_id'] ?>" class="btn btn-gradient-danger btn-fw" onclick="return confirm('Are you sure you want to delete this eBook?');">Delete</a>
                              </span>
                            </td>
                          </tr>
                      <?php
                        endwhile;
                      else:
                        echo "<p class='text-center'>No eBooks found.</p>";
                      endif;

                      $conn->close();
                      ?>
                    </tbody>
                  </table>
                    </div>
                  </div>
                </div>
              </div>
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