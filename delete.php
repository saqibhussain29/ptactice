<?php
include "database.php";
$id = $_GET['std_id'];
$sql = " DELETE FROM  marksheet WHERE std_id = '$id'";
$query=    mysqli_query($conn,$sql);

if($query){
    header('location:show.php');
}
else{
    echo "error";
}


?>