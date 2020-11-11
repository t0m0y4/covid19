<?php
include "navbar.php";
if (!empty($_SESSION['usuario']))
 {
    session_destroy();
  }
$controller = new covid19Controller;
?>
<style>
.card-title{
  font-size: 35px;
  font-weight: bold;

}
 p {
   font-size: 25px;
 }
</style>
<div class="container-fluid" style="margin-top:10px;">
  <div class="row" style="margin-bottom:10px;">
    <div class="col-lg-2 col-lg-2">
    </div>
    <div class="col-lg-3 col-lg-3">
      <?php $controller->centralAmericaUpdateControllert(); ?>
    </div>
    <div class="col-lg-5 col-md-5">
      <div id="map" ></div>
      <script>
      <?php $controller->mapChartController();?>
      </script>

  </div>
  </div>


<div class="row">
  <div class="col-md-2 col-lg-2">
    <?php $controller->lastUpdateController(); ?>
  </div>
  <div class="col-md-10 col-lg-10">
<?php
$controller->centralAmericaController();
?>



</tbody>
</table>

</div>
</div>
</div>
