  <?PHP

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








  include "database.php";
  if (isset($_POST['submit'])) {
    $id =  $_POST['std_id'];
    $name = $_POST['std_name'];
    $english = (int) $_POST['english'];
    $maths = (int)$_POST['maths'];
    $science = (int)$_POST['science'];



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


    if (isset($errors) && !empty($errors)) {

      $queryString = http_build_query(['errors' => $errors, 'std_id' =>$id]);
      header("location:./update.php?" . $queryString);
    } else {


    $total_marks = $maths + $science + $english;
    $percentage = round((($total_marks / 300) * 100), 4);
    $grade = grade($percentage);
    $name = validation($name);





    $sql = " UPDATE marksheet  SET `std_name` = '$name', `english`= '$english', `maths`='$maths', `science` ='$science', `total_marks`= '$total_marks', `GARDE`= '$grade',`percentage`= '$percentage' WHERE  std_id ='$id' ";
// print_r($sql);
    $data = mysqli_query($conn,$sql);



    if ($data) {
      header('location:show.php');
    } else {
      echo "error";
    }
  }

  }

  ?>