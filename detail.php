<?php
include "database.php";

$id = $_GET['std_id'];

$sql = " SELECT * FROM marksheet WHERE std_id ='$id'";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($query);


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
  <title>Document</title>
  <style>
    body {
      background-color: #f1f1f1;
    }

    h1 {
      text-align: center;
      margin-bottom: 60px;
    }

    table {
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 10px;
    }

    tr {
      font-size: 20px;
      font-weight: bold;
      border-bottom: 1px solid #ddd;
    }

    td {
      font-size: 18px;
      padding: 10px;
      border-bottom: 1px solid #ddd;
    }

    th {
      font-size: 20px;
      font-weight: bold;
      background-color: #ddd;
      padding: 10px;
      border-bottom: 1px solid #ddd;
    }
  </style>

</head>

<body>
 <?php include "navbar.php";  ?>
  <h1>MARKSHEET</h1>
  <table class="table">
    <thead>
      <!-- <tr> -->
      <tr>
        <td>Student id </td>
        <td><?php echo $data[0]; ?></td>
      </tr>
      <tr>
        <td>student name</td>
        <td><?php echo $data[1]; ?></td>
      </tr>
      <tr>
        <td>maths marks</td>
        <td><?php echo $data[2]; ?></td>
      </tr>
      <tr>
        <td>science marks</td>
        <td><?php echo $data[3]; ?></td>
      </tr>
      <tr>
        <td>english marks</td>
        <td><?php echo $data[4]; ?></td>
      </tr>
      <tr>
        <td>total marks</td>
        <td><?php echo $data[5] . "/300"; ?></td>
      </tr>
      <tr>
        <td>GRADE</td>
        <td><?php echo $data[6]; ?></td>
      </tr>
      <!-- </tr> -->
    </thead>
    <!-- <tbody> -->
    <!-- <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    
  </tbody> -->
  </table>
  <footer class="bg-white text-dark pt-5 pb-4">

<div class="container text-center text-md-left">

  <div class="row text-center text-md-left">

    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
      <h5 class="text-uppercase mb-4 font-weight-bold text-warning">AKBAR PUBLIC SCHOOL</h5>
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
        <i class="fas fa-home mr-3"></i>New York, NY 2333, US
      </p>
      <p>
        <i class="fas fa-envelope mr-3"></i>theproviders98@gmail.com
      </p>
      <p>
        <i class="fas fa-phone mr-3"></i>+92 3162859445
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