<?php include "../assets/includes/db.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>BookSaw - Free Book Store HTML CSS Template</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="format-detection" content="telephone=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="author" content="">
	<meta name="keywords" content="">
	<meta name="description" content="">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="icomoon/icomoon.css">
	<link rel="stylesheet" type="text/css" href="css/vendor.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<!-- jQuery -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<!-- Slick CSS -->
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

	<!-- Slick Theme (optional) -->
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

	<!-- Slick JS -->
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>



</head>
<style>
	.book-look-image {
		border-left: 20px solid #3c3c3c;
		box-shadow: 8px 8px 20px rgba(0, 0, 0, 0.3);
		width: 100%;
		height: 500px;
		display: block;
		transform: perspective(800px) rotateY(-5deg);
		transition: box-shadow 0.3s ease, transform 0.3s ease;
	}

	.book-look-image:hover {
		box-shadow: 12px 12px 30px rgba(0, 0, 0, 0.4);
		transform: perspective(800px) rotateY(0deg);
	}

	.book-with-spine {
		position: relative;
		display: inline-block;
	}

	.book-with-spine img {
		width: 100%;
		height: auto;
		border-radius: 4px;
		box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
	}

	/* Fake spine effect on the left */
	.book-spine-fake {
		content: '';
		position: absolute;
		top: 0;
		left: 0;
		width: 12px;
		height: 100%;
		background: linear-gradient(to right, #ccc, #eee);
		border-radius: 4px 0 0 4px;
		box-shadow: inset -2px 0 4px rgba(0, 0, 0, 0.2);
		z-index: 2;
	}
</style>

<body data-bs-spy="scroll" data-bs-target="#header" tabindex="0">

	<!-- header start -->

	<?php include 'header.php' ?>
	<!--header-wrap-->

	<!-- carousel start -->
	<section id="billboard">
		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<button class="prev slick-arrow">
						<i class="icon icon-arrow-left"></i>
					</button>

					<div class="main-slider pattern-overlay">
						<?php
						$conn = new mysqli("localhost", "root", "", "ebook");
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}

						$query = "SELECT * FROM banners";
						$result = $conn->query($query);

						while ($row = $result->fetch_assoc()) {
						?>
							<div class="slider-item">
								<div class="row align-items-center">

									<div class="col-md-8">
										<div class="banner-content">
											<h3 class="banner-title"><?php echo $row['title']; ?></h3>
											<p><?php echo $row['description']; ?></p>
											<div class="btn-wrap">
												<a href="#" class="btn btn-outline-accent btn-accent-arrow">Read More
													<i class="icon icon-ns-arrow-right"></i>
												</a>
											</div>
										</div>
									</div>


									<div class="col-md-4 text-center">
										<img src="../assets/uploads/images/<?php echo $row['image']; ?>" alt="banner" class="img-fluid banner-image book-look-image">
									</div>
								</div>
							</div>
						<?php } ?>
					</div>

					<button class="next slick-arrow">
						<i class="icon icon-arrow-right"></i>
					</button>

				</div>
			</div>
		</div>
	</section>
	<!-- carousel end -->

	<!-- featured-books start -->
	<section id="featured-books" class="py-5 my-5">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-header align-center">
						<div class="title">
							<span>Some quality items</span>
						</div>
						<h2 class="section-title">Popular Books</h2>
					</div>

					<div class="product-list" data-aos="fade-up">
						<div class="row">
							<div class="col-md-12">
								<ul class="nav nav-tabs">
									<li class="nav-item">
										<a class="nav-link active" href="#" data-category="all">All Categories</a>
									</li>

									<?php
									$query = "SELECT * FROM categories";
									$result = mysqli_query($conn, $query);
									while ($row = mysqli_fetch_assoc($result)) {
									?>
										<li class="nav-item">
											<a class="nav-link" href="#" data-category="<?php echo $row['category_id']; ?>">
												<?php echo $row['category_name']; ?>
											</a>
										</li>
									<?php } ?>
								</ul>
							</div>
						</div>

						<div class="row" id="book-list">
							<?php
							$query = "SELECT * FROM ebooks";
							$result = mysqli_query($conn, $query);
							while ($row = mysqli_fetch_assoc($result)) {
							?>
								<div class="col-md-3 book-item" data-category="<?php echo $row['category_id']; ?>">
									<div class="product-item">
										<figure class="product-style book-wrapper">
											<!-- Book Cover with Spine -->
											<div class="book-with-spine">
												<span class="book-spine-fake"></span>
												<img src="../assets/uploads/images/<?php echo $row['cover_image']; ?>" alt="Book Cover">
											</div>

											<figcaption>
												<h3><?php echo $row['title']; ?></h3>
												<div class="item-price">$ <?php echo number_format($row['price'], 2); ?></div>
											</figcaption>

											<form method="POST" action="../website/crud_operation/customer-manage-cart.php">
												<input type="hidden" name="ebook_id" value="<?php echo $row['ebook_id']; ?>">
												<button type="submit" name="Add_To_Cart" class="add-to-cart" data-product-tile="add-to-cart">Add to Cart</button>
											</form>
										</figure>
									</div>
								</div>
							<?php } ?>
						</div><!-- row end -->
					</div><!-- product-list end -->

				</div>
			</div>

			<!-- Optional: View all products -->
			<div class="row">
				<div class="col-md-12">
					<div class="btn-wrap align-right">
						<a href="#" class="btn-accent-arrow">View all products <i class="icon icon-ns-arrow-right"></i></a>
					</div>
				</div>
			</div>

		</div>
	</section>
	<!-- featured-books end -->

	<!-- Featured Books Section -->
	<section id="featured-books" class="py-5 my-5">
		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<div class="section-header align-center">
						<div class="title">
							<span>Some quality items</span>
						</div>
						<h2 class="section-title">Featured Books</h2>
					</div>

					<!-- Product List -->
					<div class="product-list" data-aos="fade-up">
						<div class="row">

							<?php
							$query = "SELECT * FROM ebooks LIMIT 4";
							$result = mysqli_query($conn, $query);

							while ($row = mysqli_fetch_assoc($result)) {
							?>
								<div class="col-md-3 mb-4">
									<div class="product-item">
										<figure class="product-style book-wrapper">

											<!-- Book Cover with Spine -->
											<div class="book-with-spine">
												<span class="book-spine-fake"></span>
												<img src="../assets/uploads/images/<?php echo $row['cover_image']; ?>" alt="Book Cover">
											</div>

											<figcaption>
												<h3><?php echo $row['title']; ?></h3>
												<div class="item-price">$ <?php echo number_format($row['price'], 2); ?></div>
											</figcaption>

											<form method="POST" action="../website/crud_operation/customer-manage-cart.php">
												<input type="hidden" name="ebook_id" value="<?php echo $row['ebook_id']; ?>">
												<button type="submit" name="Add_To_Cart" class="add-to-cart" data-product-tile="add-to-cart">Add to Cart</button>
											</form>

										</figure>
									</div>
								</div>

							<?php
							}
							?>

						</div><!-- row end -->
					</div><!-- product-list end -->

				</div>
			</div>

			<!-- View All Button -->
			<div class="row">
				<div class="col-md-12">
					<div class="btn-wrap align-right">
						<a href="#" class="btn-accent-arrow">View all products <i class="icon icon-ns-arrow-right"></i></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- featured-best-selling -->

	<!-- Popular Books start -->
	<section id="best-selling" class="leaf-pattern-overlay">
		<div class="corner-pattern-overlay"></div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8">
					<div class="row">

						<?php

						$query = "SELECT * FROM ebooks WHERE ebook_id= 1 LIMIT 1";
						$result = mysqli_query($conn, $query);

						if (mysqli_num_rows($result) > 0) {
							$row = mysqli_fetch_assoc($result);
						?>

							<div class="col-md-6">
								<figure class="products-thumb">
									<img src="../assets/uploads/images/<?php echo $row['cover_image']; ?>" alt="<?php echo $row['title']; ?>" class="single-image">
								</figure>
							</div>

							<div class="col-md-6">
								<div class="product-entry">
									<h2 class="section-title divider">Best Selling Book</h2>

									<div class="products-content">

										<h3 class="item-title"><?php echo $row['title']; ?></h3>
										<p><?php echo $row['description']; ?></p>
										<div class="item-price">$ <?php echo number_format($row['price'], 2); ?></div>
										<div class="btn-wrap">
											<form action="add_to_cart.php" method="POST">
												<input type="hidden" name="book_id" value="<?php echo $row['ebook_id']; ?>">
												<input type="hidden" name="book_title" value="<?php echo $row['title']; ?>">
												<input type="hidden" name="book_price" value="<?php echo $row['price']; ?>">
												<button type="submit" name="add_to_cart" class="btn-accent-arrow">
													Shop it now <i class="icon icon-ns-arrow-right"></i>
												</button>
											</form>
										</div>
									</div>

								</div>
							</div>

						<?php } else { ?>
							<div class="col-12">
								<p class="text-center">No bestseller book found.</p>
							</div>
						<?php } ?>

					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Popular best-selling -->


	<?php include 'footer.php' ?>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		$(document).ready(function() {
			$('.nav-link').on('click', function(e) {
				e.preventDefault();
				var category = $(this).data('category');

				if (category === 'all') {
					$('.book-item').show();
				} else {
					$('.book-item').hide();
					$('.book-item[data-category="' + category + '"]').show();
				}

				$('.nav-link').removeClass('active');
				$(this).addClass('active');
			});
		});
	</script>
	<!-- Popular Books end -->

	<script src="js/jquery-1.11.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
		crossorigin="anonymous"></script>
	<script src="js/plugins.js"></script>
	<script src="js/script.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<!-- jQuery -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<!-- Make sure jQuery is loaded -->


</body>

</html>