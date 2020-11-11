<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BICU | Covid19</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" type="text/css" href="views/public/css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="views/css/principal.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">


      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
      <script src="views/public/js/validarIngreso.js"></script>


      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="views/js/sweetalert-2.min.js"></script>
      <script src="views/js/sweetalert.min.js"></script>
  </head>
  <body>
<?php
if(isset($_GET['action']))
{
switch ($_GET['action'])
{
  case "login2":
    echo '<link rel="stylesheet" type="text/css" href="views/css/login2.css">';
    echo '';
    break;

  case "login3":
      echo '<script src="views/js/login3.js"></script>';
      echo '<link rel="stylesheet" type="text/css" href="views/css/login3.css">';
      echo '';
      break;

  case "inicio":
      echo '<link rel="stylesheet" type="text/css" href="views/css/home.css">';
      break;

  case "formularioPreguntas":
      echo '<script src="views/js/sweetalert-2.min.js"></script>';
      echo '<script src="views/js/sweetalert.min.js"></script>';
      echo '<link rel="stylesheet" type="text/css" href="views/css/questionario.css">';
    break;
  case "covid19Status":
          echo '<link rel="stylesheet" type="text/css" href="views/css/home.css">';
    break;

case "covid19World":
        echo '<link rel="stylesheet" type="text/css" href="views/css/home.css">';
  break;
  case "detallesEncuesta":
          echo '<link rel="stylesheet" type="text/css" href="views/css/home.css">';
          echo '<link rel="stylesheet" type="text/css" href="views/css/detallesEncuesta.css">';
    break;
  default:
      echo '<link rel="stylesheet" type="text/css" href="views/css/home.css">';
    break;

}
}
else {
if(isset($_SESSION['validarUsuario']))
{
  echo '<link rel="stylesheet" type="text/css" href="views/css/home.css">';
}
else {
    echo '<link rel="stylesheet" type="text/css" href="views/css/home.css">';
}
}
?>


<?php
    $modulos = new Enlaces();
    $modulos -> enlacesController();
?>
  </body>

<script type="text/javascript">
  $(document).ready(function(){

    setInterval(function(){
      $.post('models/update_covid19.php',{type:'update'}, function(data){
        console.log(1);
      });
  }, 3600000);

  });
  

</script>
</html>
