<?php
if (isset($_GET["errors"])) {
  $errors = $_GET["errors"];
}



//  echo var_dump(($_GET["errors"]));

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=10">
  <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
  <title>Document</title>
  <STyle>
    H1 {
      text-align: center;

    }

    .form-section {
      margin-top: 80px;

    }
  </STyle>
</head>

<body>

<?PHP      include "navbar.php";  ?>
  <div class="container mt-6   form-section ">

    <!-- <H1>STUDENT DATA SHEET </H1> -->
    <form action="process.php" method="POST">
      <!-- <div  class="margin-6"> -->
      <div class="form-group mb-6  ">
        <label class="form-label" for="exampleInputEmail1">NAME</label>
        <input type="text" name="std_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your name " />
        <span class="text-danger"><?php if (isset($errors['name'])) echo $errors['name']; ?></span><br><br>
      </div>
      <div class="form-group  mb-6 ">
        <label for="exampleInputEmail1">ENGLISH MARKS</label>
        <input type="TEXT" name="english" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter english marks" />
        <span class="text-danger">
          <?php if (isset($errors['english'])) echo $errors['english']; ?></span><br><br>
      </div>
      <div class="form-group  ">
        <label for="exampleInputEmail1">MATHS MARKS</label>
        <input type="text" name="maths" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter maths marks">
        <span class="text-danger"><?php if (isset($errors['maths'])) echo $errors['maths']; ?></span><br><br>
      </div>
      <div class="form-group ">
        <label for="exampleInputEmail1">SCIENCE MARKS</label>
        <input type="text" name="science" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter science marks">
        <span class="text-danger"><?php if (isset($errors['science'])) echo $errors['science']; ?></span> <br><br>

      </div    class=" pt-5 pb-4">
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      <a href="./index.php" class="btn btn-primary">RESTART</a>


  </div>
  <footer class="bg-white text-dark pt-5 pb-4">

		<div class="container text-center text-md-left">

			<div class="row text-center text-md-left">

				<div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
					<h5 class="text-uppercase mb-4 font-weight-bold text-warning">school name</h5>
					<p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet,
						ital consectetur lorem ipsum dolor sit amet adipisicing elit.</p>

				</div>

				<div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
					<h5 class="text-uppercase mb-4 font-weight-bold text-warning">Products</h5>
					<p>
						<a href="#" class="text-white" style="text-decoration: none;"> TheProviders</a>
					</p>
					<p>
						<a href="#" class="text-white" style="text-decoration: none;"> Creativity</a>
					</p>
					<p>
						<a href="#" class="text-white" style="text-decoration: none;"> SourceFiles</a>
					</p>
					<p>
						<a href="#" class="text-white" style="text-decoration: none;"> bootstrap 5 alpha</a>
					</p>

				</div>

				<div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
					<h5 class="text-uppercase mb-4 font-weight-bold text-warning">Useful links</h5>
					<p>
						<a href="#" class="text-white" style="text-decoration: none;"> Your Account</a>
					</p>
					<p>
						<a href="#" class="text-white" style="text-decoration: none;"> Become an Affiliates</a>
					</p>
					<p>
						<a href="#" class="text-white" style="text-decoration: none;">Shipping Rates</a>
					</p>
					<p>
						<a href="#" class="text-white" style="text-decoration: none;"> Help</a>
					</p>
				</div>

				<div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
					<h5 class="text-uppercase mb-4 font-weight-bold text-warning">Contact</h5>
					<p>
						<i class="fas fa-home mr-3"></i>AKBAR PUBLIC SCHOOL
					</p>
					<p>
						<i class="fas fa-envelope mr-3"></i>hello@gmail.com
					</p>
					<p>
						<i class="fas fa-phone mr-3"></i>090078609
					</p>
					<p>
						<i class="fas fa-print	 mr-3"></i>+01 335 633 77
					</p>
				</div>

			</div>

			<hr class="mb-4">

			<div class="row align-items-center">

				<div class="col-md-7 col-lg-8">
					<p> Copyright ©2020 All rights reserved by:
						<a href="#" style="text-decoration: none;">
							<strong class="text-warning">The Providers</strong>
						</a>
					</p>

				</div>

				<div class="col-md-5 col-lg-4">
					<div class="text-center text-md-right">

						<ul class="list-unstyled list-inline">
							<li class="list-inline-item">
								<a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i
										class="fab fa-facebook"></i></a>
							</li>
							<li class="list-inline-item">
								<a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i
										class="fab fa-twitter"></i></a>
							</li>
							<li class="list-inline-item">
								<a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i
										class="fab fa-google-plus"></i></a>
							</li>
							<li class="list-inline-item">
								<a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i
										class="fab fa-linkedin-in"></i></a>
							</li>
							<li class="list-inline-item">
								<a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i
										class="fab fa-youtube"></i></a>
							</li>
						</ul>

					</div>

				</div>

			</div>

		</div>

	</footer>
  
</body>

<script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</html>