<?php
class covid19Controller
{
  public function centralAmericaController()
  {

    $respuesta = jsonDataModel::centralAmericaModel();
    $flags = jsonDataModel::flagsModel();
    //[country, cases, todayCases, deaths, todayDeaths, recovered, active, critical, totalTests]
    // Comparison function
    function cases_compare($element1, $element2) {
    $case1 = $element1['cases'];
    $case2 = $element2['cases'];
    return $case2 - $case1;
      }
    usort($respuesta, 'cases_compare');
    $echo_json ='<table class="table table-bordered">
                <thead><tr>
                <th>Paise</th>
                <th>Casos</th>
                <th>Casos_Hoy</th>
                <th>Muertes</th>
                <th>Muertes_Hoy</th>
                <th>Recuperados</th>
                <th>Activos</th>
                <th>Criticos</th>
                <th>Cant.Pruebas</th><tr></thead><tbody>';

    foreach ($respuesta as $value) {
      if($value["todayCases"] > 0){
        $todayCases = '<td style="font-weight:bold; background:#F3E2A9;">+'.number_format($value["todayCases"]).'</td>';
      }
      else {
        $todayCases = '<td></td>';
      }
      if($value["todayDeaths"] > 0)
      {
        $todayDeaths = '<td style="background:#DF0101; text-align:center; font-weight:bold; color:#ffffff">+'.number_format($value["todayDeaths"]).'</td>';
      }
      else{
          $todayDeaths = '<td></td>';
      }
    $echo_json .= '<tr>';
    $echo_json .= '<td><img src='.$flags[$value["country"]].' width="25px" height="20px"></img> '.$value["country"].'</td>
                  <td>'.number_format($value["cases"]).'</td>';
                  $echo_json .= $todayCases;
                  $echo_json .= '<td>'.number_format($value["deaths"]).'</td>';
                  $echo_json .= $todayDeaths;
                  $echo_json .= '<td>'.number_format($value["recovered"]).'</td>
                  <td>'.number_format($value["active"]).'</td>
                  <td>'.number_format($value["critical"]).'</td>
                  <td>'.number_format($value["totalTests"]).'</td>';


    $echo_json .='</tr>';
  }
    echo $echo_json;
    //var_dump($respuesta);

  }

  public function lastUpdateController()
  {
    $respuesta = jsonDataModel::updateTimeModel();

    $echo_time = '<div class="card bg-light">
                <div class="card-body">
    <h5 class="card-title" style="font-size:2vw;">Actualización de Base de datos</h5>
    <p class="card-text" style="font-size:1vw;">Ultime descarga: </p>
    <p class="card-text" style="font-size:1vw;">'.$respuesta["time"].'</p>
    <p style="font-size:1vw;">Fuente:<b>Global Coronavirus information</b></p>
  </div>
    </div>';

    echo $echo_time;
  }

  public function worldUpdateControllert()
  {
      //[country, cases, todayCases, deaths, todayDeaths, recovered, active, critical, totalTests]
    $respuesta = jsonDataModel::worldModel();
    $echo_world = '<div class="card bg-light">
                <div class="card-body">
    <h5 class="card-title" style="font-size:2vw;text-align:center; font-weight:normal;">Casos Mundiales:</h5>

    <h3 class="card-text" style="text-align:center; font-size:2vw; font-weight:bold;">'.number_format($respuesta["cases"]).'</h3>
    <p class="card-text" style="font-size:1vw;text-align:center;">de los cuales <b style="color:red;">'.number_format($respuesta["critical"]).'</b> estan criticos</>

    <div class="row">
    <div class="col-md-6 col-sm-6">
    <h2 class="card-text" style="font-size:1.2vw;text-align:center;">Muertes_Hoy:</h4>
    <p class="card-text" style="font-size:1.2vw;text-align:center; color:red;"><b>'.number_format($respuesta["todayDeaths"]).'</b></p>
    </div>
    <div class="col-md-6 col-sm-6">
    <h2 class="card-text" style="font-size:1.2vw;text-align:center;">Casos_Hoy:</h4>
    <p class="card-text" style="font-size:1.2vw;text-align:center; color:#800000;"><b>'.number_format($respuesta["todayCases"]).'</b></p>
    </div>
    </div>
    <hr>
    <div class="row">
    <div class="col-md-6 col-sm-6">
    <h2 class="card-text" style="font-size:1.2vw;text-align:center;">Muertes:</h4>
    <p class="card-text" style="font-size:1.2vw;text-align:center; color:red;"><b>'.number_format($respuesta["deaths"]).'</b></p>
    </div>
    <div class="col-md-6 col-sm-6">
    <h2 class="card-text" style="font-size:1.2vw;text-align:center;">Recuperados:</h4>
    <p class="card-text" style="font-size:1.2vw;text-align:center; color:green;"><b>'.number_format($respuesta["recovered"]).'</b></p>
    </div>
    </div>



  </div>
    </div>';

    echo $echo_world;
  }

  public function centralAmericaUpdateControllert()
  {
      //[country, cases, todayCases, deaths, todayDeaths, recovered, active, critical, totalTests]
    $respuesta = jsonDataModel::centralAmericaModel();
    $cases = 0;
    $critical = 0;
    $todayDeaths = 0;
    $todayCases = 0;
    $deaths = 0;
    $recovered = 0;
    foreach ($respuesta as $value) {
      $cases += $value["cases"];
      $critical += $value["critical"];
      $todayDeaths += $value["todayDeaths"];
      $todayCases += $value["todayCases"];
      $deaths += $value["deaths"];
      $recovered += $value["recovered"];
    }
    $echo_world = '<div class="card bg-light">
                <div class="card-body">
    <h5 class="card-title" style="font-size:2vw;text-align:center; font-weight:normal;">Casos de Centro America:</h5>

    <h3 class="card-text" style="text-align:center; font-size:2vw; font-weight:bold;">'.number_format($cases).'</h3>
    <p class="card-text" style="font-size:1vw;text-align:center;">de los cuales <b style="color:red;">'.number_format($critical).'</b> estan criticos</>

    <div class="row">
    <div class="col-md-6 col-sm-6">
    <h2 class="card-text" style="font-size:1.2vw;text-align:center;">Muertes_Hoy:</h4>
    <p class="card-text" style="font-size:1.2vw;text-align:center; color:red;"><b>'.number_format($todayDeaths).'</b></p>
    </div>
    <div class="col-md-6 col-sm-6">
    <h2 class="card-text" style="font-size:1.2vw;text-align:center;">Casos_Hoy:</h4>
    <p class="card-text" style="font-size:1.2vw;text-align:center; color:#800000;"><b>'.number_format($todayCases).'</b></p>
    </div>
    </div>
    <hr>
    <div class="row">
    <div class="col-md-6 col-sm-6">
    <h2 class="card-text" style="font-size:1.2vw;text-align:center;">Muertes:</h4>
    <p class="card-text" style="font-size:1.2vw;text-align:center; color:red;"><b>'.number_format($deaths).'</b></p>
    </div>
    <div class="col-md-6 col-sm-6">
    <h2 class="card-text" style="font-size:1.2vw;text-align:center;">Recuperados:</h4>
    <p class="card-text" style="font-size:1.2vw;text-align:center; color:green;"><b>'.number_format($recovered).'</b></p>
    </div>
    </div>



  </div>
    </div>';

    echo $echo_world;
  }

  public function mapChartController()
  {
    $nicaragua = jsonDataModel::nicaraguaModel();
    $costarica = jsonDataModel::costaricaModel();
    $panama = jsonDataModel::panamaModel();
    $honduras = jsonDataModel::hondurasModel();
    $belize = jsonDataModel::belizeModel();
    $elsalvador = jsonDataModel::elsalvadorModel();
    $guatemala = jsonDataModel::guatemalaModel();
    /*
    013 - Central America 	BZ, CR, GT, HN, MX, NI, PA, SV
    */

    /*
    Costa Rica (CR)
    Belize (BZ)
    Guatemala (GT)
    Honduras (HN)
    Nicaragua (NI)
    Panama (PA)
    El Salvador(SV)
    */
      $echo_map="    google.charts.load('current', {
            'packages':['geochart'],
            'mapsApiKey': 'AIzaSyA3SUpSCjA4fKx0vyLllm5UaLSVNg1cbGo'
          });
          google.charts.setOnLoadCallback(drawRegionsMap);

          function drawRegionsMap() {
            var data = google.visualization.arrayToDataTable([
              ['Country',   'Casos', 'Muertes'],
              ['".$costarica["country"]."', ".$costarica["cases"].", ".$costarica["deaths"]."],
              ['".$belize["country"]."', ".$belize["cases"].", ".$belize["deaths"]."],
              ['".$guatemala["country"]."', ".$guatemala["cases"].", ".$guatemala["deaths"]."],
              ['".$honduras["country"]."', ".$honduras["cases"].", ".$honduras["deaths"]."],
              ['".$nicaragua["country"]."', ".$nicaragua["cases"].", ".$nicaragua["deaths"]."],
              ['".$panama["country"]."',  ".$panama["cases"].", ".$panama["deaths"]."],
              ['".$elsalvador["country"]."', ".$elsalvador["cases"].", ".$elsalvador["deaths"]."],
            ]);

            var options = {
              region: '013', // Central America
              colorAxis: {colors: ['#FFB700', 'red', '#800000']},
              backgroundColor: '#81d4fa',
              datalessRegionColor: '#f8bbd0',
              defaultColor: '#f5f5f5',
            };

            var chart = new google.visualization.GeoChart(document.getElementById('map'));
            chart.draw(data, options);
          };";

echo $echo_map;
  }

  public function worldCasesController()
  {

    $respuesta = jsonDataModel::worldTotalModel();
    //$flags = jsonDataModel::worldFlagsModel();
    //[country, cases, todayCases, deaths, todayDeaths, recovered, active, critical, totalTests]
    // Comparison function
    function cases_compare($element1, $element2) {
    $case1 = $element1['cases'];
    $case2 = $element2['cases'];
    return $case2 - $case1;
      }
    usort($respuesta, 'cases_compare');
    $echo_json ='<table class="table table-bordered">
                <thead><tr>
                <th>Paise</th>
                <th>Casos</th>
                <th>Casos_Hoy</th>
                <th>Muertes</th>
                <th>Muertes_Hoy</th>
                <th>Recuperados</th>
                <th>Activos</th>
                <th>Criticos</th>
                <th>Cant.Pruebas</th><tr></thead><tbody>';
    unset($respuesta[0]); // Remove World from array
    foreach ($respuesta as $value) {

      if($value["todayCases"] > 0){
        $todayCases = '<td style="font-weight:bold; background:#F3E2A9;">+'.number_format($value["todayCases"]).'</td>';
      }
      else {
        $todayCases = '<td></td>';
      }
      if($value["todayDeaths"] > 0)
      {
        $todayDeaths = '<td style="background:#DF0101; text-align:center; font-weight:bold; color:#ffffff">+'.number_format($value["todayDeaths"]).'</td>';
      }
      else{
          $todayDeaths = '<td></td>';
      }
    $echo_json .= '<tr>';
    $echo_json .= '<td>'.$value["country"].'</td>';
    $echo_json .= '<td>'.number_format($value["cases"]).'</td>';
                  $echo_json .= $todayCases;
                  $echo_json .= '<td>'.number_format($value["deaths"]).'</td>';
                  $echo_json .= $todayDeaths;
                  $echo_json .= '<td>'.number_format($value["recovered"]).'</td>
                  <td>'.number_format($value["active"]).'</td>
                  <td>'.number_format($value["critical"]).'</td>
                  <td>'.number_format($value["totalTests"]).'</td>';


    $echo_json .='</tr>';
  }
    echo $echo_json;
    //var_dump($respuesta);

  }

  public function worldChartController()
  {
    $respuesta = jsonDataModel::worldTotalModel();
    unset($respuesta[0]);
    /*
    013 - Central America 	BZ, CR, GT, HN, MX, NI, PA, SV
    */

    /*
    Costa Rica (CR)
    Belize (BZ)
    Guatemala (GT)
    Honduras (HN)
    Nicaragua (NI)
    Panama (PA)
    El Salvador(SV)
    */
      $echo_map="    google.charts.load('current', {
            'packages':['geochart'],
            'mapsApiKey': 'AIzaSyA3SUpSCjA4fKx0vyLllm5UaLSVNg1cbGo'
          });
          google.charts.setOnLoadCallback(drawRegionsMap);

          function drawRegionsMap() {
            var data = google.visualization.arrayToDataTable([
              ['Country',   'Casos', 'Muertes'],";
              foreach ($respuesta as $value) {
                if($value["country"] == "USA")
                {
                  $name = "United States";
                }

                else {
                  $name = $value["country"];
                }
                $echo_map .= "['".$name."', ".$value["cases"].", ".$value["deaths"]."],";
              }
            $echo_map .= "]);";

          $echo_map .="var options = {
              colorAxis: {colors: ['#FFB700', 'red', '#800000']},
              backgroundColor: '#81d4fa',
              datalessRegionColor: '#f8bbd0',
              defaultColor: '#f5f5f5',
            };

            var chart = new google.visualization.GeoChart(document.getElementById('map'));
            chart.draw(data, options);
          };";

echo $echo_map;
  }
}
 ?>
