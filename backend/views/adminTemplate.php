<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>BICU | Covid19</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
  <!-- Theme style -->
  <link rel="stylesheet" href="views/public/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
  <script src="views/public/js/jquery.min.js"></script>

  <link rel="stylesheet" href="views/css/default.css">
  <script src="views/js/sweetalert-2.min.js"></script>
  <script  src="views/js/sweetalert.min.js"></script>


</head>

<body class="hold-transition sidebar-mini">
<div id="charts_"></div>
<div class="wrapper">
  <?php
    $new_template = new adminEnlaceController();
    $new_template->enlaceController();
   ?>


</div>
<?php
 if(isset($_GET['action']))
 {
   switch($_GET['action'])
   {
     case "login":
         echo '<link rel="stylesheet" type="text/css" href="views/css/login2.css">';
       break;

     case "inicio":
      echo "<script src='views/js/inicioController.js'></script>";
       break;
     case "encuestas":
       echo "<script src='views/js/introduccionEncuesta.js'></script>";
       echo '<link rel="stylesheet" type="text/css" href="views/css/encuestas.css">';
       break;

    case "verUsuariosEncuestas":
        echo '<link rel="stylesheet" type="text/css" href="views/public/css/dataTables.bootstrap4.min.css">';
        echo '<script src="views/js/gestorEncuesta.js"></script>';
      break;

    case "modificarPreguntas":
        echo '<script src="views/js/pre_resEncuesta.js"></script>';
        break;
      default:

      break;
   }
 }

 else{
   if(isset($_SESSION['validarIngreso']))
   {

   }
else{
   echo '<link rel="stylesheet" type="text/css" href="views/css/login2.css">';
 }
 }

?>
<!-- REQUIRED SCRIPTS -->
  <script src="views/js/default.js"></script>
<!-- jQuery -->
<script src="views/public/js/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="views/public/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="views/public/js/adminlte.js"></script>

<link rel="stylesheet" type="text/css" href="views/public/css/dataTables.bootstrap4.min.css">


<script>
/*$(function () {
$("#example1").DataTable({
"responsive": true,
"autoWidth": false,
});
$("#example2").DataTable({
"paging": true,
"lengthChange": false,
"searching": false,
"ordering": true,
"info": true,
"autoWidth": false,
"responsive": true,
});
});*/
</script>
<script>
$(document).ready(function(){

  setInterval(function(){
    $.post("../models/update_covid19.php", {type:"update"},function(data){

    });
  }, 1800000);

});
</script>
</body>
</html>
