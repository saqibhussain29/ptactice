<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Document</title>
  <style>
    /* .form-section {
      margin-top: 100px;
      margin-bottom: 100px;
    } */

    H1 {
      text-align: center;
    }

    td{
      text-align: center;
    }
  </style>
</head>

<body>
<?PHP   include "navbar.php";  ?>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="show.php">MARKSHEET</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>

          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
          </li>
        </ul>
  </nav>
  <!-- <div class="container"> -->
    <h1> SEARCH MARKSHEET RESULT</h1>
    <form class="d-flex  pt-5 pb-4   ">
      <input class="form-control me-2" type="search" placeholder="ENTER NAME" aria-label="Search" action="" method="get" name="std_name" value="<?php echo isset($_GET['std_name']) ? htmlspecialchars($_GET['std_name']) : ''; ?>">
      <input class="form-control me-2" type="search" placeholder="ENTER GRADE" aria-label="Search" action="" method="get" name="GARDE" value="<?php echo isset($_GET['GARDE']) ? htmlspecialchars($_GET['GARDE']) : ''; ?>">
      <button class="btn btn-outline-success  m-2 " type="submit" name="submit" value="search">Search</button><br><br>
    </form>
  <!-- </div> -->
  

  <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">My Website</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
    </ul>
  </div>
</nav>
  -->
  <div class="container  mt-5 mb-4" >
    <table class="table table-bordered">
      <thead class="thead-dark">
        <tr>
          <th scope="col">STUDENT ID </th>
          <th scope="col">STUDENT NAME </th>
          <th scope="col">ENGLISH</th>
          <th scope="col">MATHS</th>
          <th scope="col">SCIENCE</th>
          <th scope="col">TOTAL MARKS</th>
          <th scope="col">OBTAINED MARKS</th>
          <th scope="col">GRADE</th>
          <th scope="col">PERCENTAGE</th>
          <th scope="col"> ACTION</th>
        </tr>
      </thead>
      <tbody>
        <?php

        include 'database.php';
        if (isset($_GET['submit'])) {

          $name =  $_GET['std_name'];
          $grade = $_GET['GARDE'];

          $name = filter_var($name, FILTER_SANITIZE_STRING);
          $grade = filter_var($grade, FILTER_SANITIZE_STRING);

          if (!empty($name) && !empty($grade)) {
            $sql = "SELECT * FROM marksheet WHERE std_name  LIKE '%$name%' AND GARDE = '$grade'";
          } elseif (!empty($name)) {
            $sql = "SELECT * FROM marksheet WHERE std_name  LIKE '%$name%'";
          } elseif (!empty($grade)) {
            $sql = "SELECT * FROM marksheet WHERE GARDE = '$grade'";
          } else {
            $sql = "SELECT * FROM marksheet";
          }

          $result = mysqli_query($conn, $sql);
        } else {
          $sql = "SELECT * FROM marksheet";
          $result = mysqli_query($conn, $sql);
        }


        // $result = mysqli_query($conn,$sql);

        // $nums = mysqli_num_rows($query);
        while ($data = mysqli_fetch_array($result)) {

        ?>
          <tr>

            <th><?php echo $data[0]; ?></th>
            <td><?php echo $data[1]; ?></td>
            <td><?php echo $data[2]; ?></td>
            <td><?php echo $data[3]; ?></td>
            <td><?php echo $data[4]; ?></td>
            <td><?php echo "300"; ?></td>
            <td><?php echo $data[5]; ?></td>
            <td><?php echo $data[6]; ?></td>
            <td><?php echo $data[7] . "%"; ?></td>
            <td> <a href="delete.php?std_id=<?php echo $data[0]; ?>"><i class="fa-sharp fa-solid fa-trash" class='delete' onclick='return checkdelete()'></i></a> |
             <a href="detail.php?std_id=<?php echo $data[0]; ?>"><i class="fa-solid fa-door-open"></i></a> |  <a href="update.php?std_id=<?php echo $data[0]; ?>"><i class="fa-solid fa-door-open"></i></a> </td>
            
            <!-- </table> -->

          <?php
        }

          ?>

      </tbody>
    </table>
  </div>
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
                <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab fa-facebook"></i></a>
              </li>
              <li class="list-inline-item">
                <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab fa-twitter"></i></a>
              </li>
              <li class="list-inline-item">
                <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab fa-google-plus"></i></a>
              </li>
              <li class="list-inline-item">
                <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab fa-linkedin-in"></i></a>
              </li>
              <li class="list-inline-item">
                <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab fa-youtube"></i></a>
              </li>
            </ul>

          </div>

        </div>

      </div>

    </div>

  </footer>
</body>

<!-- 
src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"> -->

<script>
  function checkdelete() {
    return confirm('ARE YOU WANT TO DELETE IT ?');
  }
</script>

</html>