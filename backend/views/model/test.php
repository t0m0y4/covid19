<?php
header("Content-type: application/json; charset=UTF-8");

echo '<script>alert("I am here");</script>';
if(isset($_POST["delete"])
{
  $response = array();
  $response["message"] = "Yesy";
  $response["status"] = "Ok";

  echo json_encode($response);
}
 ?>
