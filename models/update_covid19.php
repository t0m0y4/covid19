<?php
if(isset($_POST["type"]))
{
  date_default_timezone_set("America/Managua");
  if($_POST["type"] == "update")
  {
    ///Update Download Time
    $file = fopen("covid19_json/time.json", 'w+');
    $get_time= date("Y-m-d h:i:s");
    $aray_write = array("time"=>$get_time);
    fwrite($file, json_encode($aray_write));
    fclose($file);
    ///Update_time

    //Update worl Database
    updateWorld();
    updateTotal();
    //Update world

    $contry_links = array("nicaragua", "belize","costa%20rica","el%20salvador","guatemala","honduras","panama");
    $file_name = array("nicaragua.json","belize.json","costa_rica.json","el_salvador.json","guatemala.json","honduras.json","panama.json");

      for($x=0;$x <= sizeof($file_name)-1;$x++){
          updateContry($file_name[$x], $contry_links[$x]);
      }



    return "ok";
  }
}
function updateContry($file_name, $link)
{
  $url = "https://coronavirus-19-api.herokuapp.com/countries/".$link;
  $get_content = file_get_contents($url);
  $get_json = json_decode($get_content);

  $file_name = "covid19_json/".$file_name;
  $file = fopen($file_name,'w');
  fwrite($file, json_encode($get_json));
  fclose($file);
}

function updateWorld()
{
  $url = "https://coronavirus-19-api.herokuapp.com/countries/world";
  $get_content = file_get_contents($url);
  $get_json = json_decode($get_content);

  $file_name = "covid19_json/world.json";
  $file = fopen($file_name,'w');
  fwrite($file, json_encode($get_json));
  fclose($file);
}

function updateTotal()
{
  $url = "https://coronavirus-19-api.herokuapp.com/countries";
  $get_content = file_get_contents($url);

  $file_name = "covid19_json/casos_mundiales.json";
  $file = fopen($file_name,'w');
  fwrite($file, $get_content);
  fclose($file);
}

 ?>
