<?php include "database.php"; ?>
<html>

<head>
  <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">

  <title>Mark Sheet</title>
</head>

<style>
  /* 
h1 {
  color: #333;
  font-size: 2.5rem;
  text-align: center;
}  */

  table {
    border-collapse: collapse;
    margin: 0 auto;
  }

  th,
  td {
    padding: 0.5rem;
    border: 1px solid #333;
  }

  th {
    background-color: #eee;
  }

  body {
    background-color: #f1f1f1;
  }

  h1 {
    color: #333;
    font-size: 2.5rem;
    text-align: center;
  }

  table {
    border-collapse: collapse;
    margin: 0 auto;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  th,
  td {
    padding: 0.5rem;
    border: 1px solid #333;
  }

  th {
    background-color: #eee;
  }


  /* 
.wrapper{
  position: fixed;
  left: 50%;
  top:80%;
  transform: translate(-50%, -50%);
} */
  /* 
a{
  display: block;
  width: 200px;
  height: 40px;
  line-height: 40px;
  font-size: 18px;
  font-family: sans-serif;
  text-decoration: none;
  color: #375A7F;
  border: 2px solid #333;
  letter-spacing: 2px;
  text-align: center;
  position: relative;
  transition: all .35s;
}



a:after{
  position: absolute;
  content: "";
  top: 0;
  left: 0;
  width: 0;
  height: 100%;
  background: #375A7F;
  transition: all .35s;
}

a:hover{
  color: #fff;
}

a:hover:after{
  width: 100%;
}
a span{
  position: relative;
  z-index: 2;
} */
</style>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="show.php">MARKSHEET</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>

          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
          </li>
        </ul>
  </nav>
  <h1>Mark Sheet</h1>

  <?php
  $errors = array();
  function validation($name)
  {
    $name = trim($name);
    $name = stripcslashes($name);
    $name = htmlspecialchars($name);
    return $name;
  }
  function grade($percentage)
  {
    if ($percentage >= 90) {
      return "A";
    } elseif ($percentage >= 80) {
      return "B";
    } elseif ($percentage  >= 70) {
      return "C";
    } elseif ($percentage >= 60) {
      return "D";
    } else {
      return "F";
    }
  }
  // $errors="";
  if (isset($_POST['submit'])) {
    // if ($_SERVER["request_method"]== "POST"){

    $name = $_POST['std_name'];
    $english = (int) $_POST['english'];
    $maths = (int)$_POST['maths'];
    $science = (int)$_POST['science'];

    // if (!is_numeric($maths)) {
    //   header("location: ./marks.php");
    // } 

    if (preg_match('/^[0-9]*$/', $name)) {
      // header("location: ./marks.php");
      // header("location: ./index.php?errors='please enter valid name.'");
      ($errors["name"] =  "please enter your name ");
    }

    if ($maths < 0 || $maths > 100) {
      $errors["maths"] = "Please enter a valid number for Maths ";
    } elseif (empty($maths)) {
      $errors["maths"] = "please enter your marks";
    }
    if ($english < 0 || $english > 100) {
      $errors["english"] = "Please enter a valid number for English ";
    } elseif (empty($english)) {
      $errors["english"] = "please enter your marks";
    }

    if ($science < 0 || $science > 100) {
      $errors["science"] = "Please enter a valid number for Science ";
    } elseif (empty($science)) {
      $errors["science"] = "please enter your marks";
    }
    // if(empty($maths)|| empty($english) || empty($science)){

    //   $errors["maths"."english"."science"]  = "please enter the marks";

    // }
    // if ($maths < 0 || $maths > 100 || $science < 0 || $science > 100 || $english < 0 || $english > 100)
    // {
    // ( $errors[] =  "please enter valid number ");

    //     header("location: ./index.php?"  .$queryString );

    // $errors = array();

    if (isset($errors) && !empty($errors)) {

      $queryString = http_build_query(['errors' => $errors]);
      header("location:./index.php?" . $queryString);
    }

    else{

    
    $total_marks = $maths + $science + $english;
    $percentage = round((($total_marks / 300) * 100), 4);
    $grade = grade($percentage);
    $name = validation($name);

   

    // if($total_marks!="" && $grade!=""  ){

    // $grade= $percentage;
    // $grade = "A+";
    // } elseif ($percentage >= 80) {
    // $grade = "A";
    // } elseif ($percentage >= 70) {
    // $grade = "B+";
    // } elseif ($percentage >= 60) {
    // $grade = "B";
    // } elseif ($percentage >= 50) {
    // $grade = "C";
    // } elseif ($percentage >= 40) {
    // $grade = "D";
    // } else {
    // $grade = "Fail";
    // }

    $sql = "INSERT INTO marksheet (std_name,english,maths,science,total_marks,GARDE,percentage) VALUES('$name','$english','$maths','$science','$total_marks','$grade',$percentage )";
    mysqli_query($conn, $sql);

    // else{
    //   header('location error.php');
    // }
    echo "<h2>Mark Sheet for $name</h2>";
    echo "<table border='1'>";
    echo "<tr><td>Subject</td><td>Marks Obtained</td></tr>";
    echo "<tr><td>Maths</td><td>$maths</td></tr>";
    echo "<tr><td>Science</td><td>$science</td></tr>";
    echo "<tr><td>English</td><td>$english</td></tr>";
    echo "<tr><td>Total Marks</td><td>$total_marks/300</td></tr>";
    echo "<tr><td>Percentage</td><td>$percentage%</td></tr>";
    echo "<tr><td>Grade</td><td> $grade</td></tr>";
    echo "</table>";
  }

  //   header('location error.php'); }
}

  ?>

  </span>
  <!-- <div class="wrapper">
  <a href="hello.php"><span>student marksheet!</span></a>
</div> -->
</body>
<script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</html>