<?php
class jsonDataModel
{
  public function centralAmericaModel()
  {
    $central_america = array();
    $central_america[] = jsonDataModel::nicaraguaModel();
    $central_america [] = jsonDataModel::costaricaModel();
    $central_america[] = jsonDataModel::belizeModel();
    $central_america []= jsonDataModel::elsalvadorModel();
    $central_america[] = jsonDataModel::guatemalaModel();
    $central_america[] =jsonDataModel::hondurasModel();
    $central_america[]= jsonDataModel::panamaModel();

    return $central_america;
  }
 public function flagsModel()
 {
   $flags = fopen("models/covid19_json/flags.json",'r');
   $read_flags = json_decode(fread($flags, filesize("models/covid19_json/flags.json")), true);

   return $read_flags;
 }
public function updateTimeModel()
{
  $time = fopen("models/covid19_json/time.json",'r');
  $read_time = json_decode(fread($time, filesize("models/covid19_json/time.json")), true);

  return $read_time;
}
 public function nicaraguaModel()
 {
   $json = fopen("models/covid19_json/nicaragua.json",'r');
   $j_json = json_decode(fread($json, filesize("models/covid19_json/nicaragua.json")), true);

   return $j_json;
   fclose($json);
 }

 public function costaricaModel()
 {
   $json = fopen("models/covid19_json/costa_rica.json","r");
   $j_json = json_decode(fread($json, filesize("models/covid19_json/costa_rica.json")), true);

   return $j_json;
   fclose($json);
 }

 public function elsalvadorModel()
 {
   $json = fopen("models/covid19_json/el_salvador.json","r");
   $j_json = json_decode(fread($json, filesize("models/covid19_json/el_salvador.json")), true);

   return $j_json;
   fclose($json);
 }

 public function belizeModel()
 {
   $json = fopen("models/covid19_json/belize.json","r");
   $j_json = json_decode(fread($json, filesize("models/covid19_json/belize.json")), true);

   return $j_json;
   fclose($json);
 }

 public function guatemalaModel()
 {
   $json = fopen("models/covid19_json/guatemala.json","r");
   $j_json = json_decode(fread($json, filesize("models/covid19_json/guatemala.json")), true);

   return $j_json;
   fclose($json);
 }

 public function hondurasModel()
 {
   $json = fopen("models/covid19_json/honduras.json","r");
   $j_json = json_decode(fread($json, filesize("models/covid19_json/honduras.json")), true);

   return $j_json;
   fclose($json);
 }

 public function panamaModel()
 {
   $json = fopen("models/covid19_json/panama.json","r");
   $j_json = json_decode(fread($json, filesize("models/covid19_json/panama.json")), true);

   return $j_json;
   fclose($json);
 }

 public function worldModel()
 {
   $json = fopen("models/covid19_json/world.json","r");
   $j_json = json_decode(fread($json, filesize("models/covid19_json/world.json")), true);

   return $j_json;
   fclose($json);
 }

 public function worldTotalModel()
 {
   $json = fopen("models/covid19_json/casos_mundiales.json","r");
   $j_json = json_decode(fread($json, filesize("models/covid19_json/casos_mundiales.json")), true);

   return $j_json;
   fclose($json);
 }

 public function worldFlagsModel()
 {
   $flags = fopen("models/covid19_json/world_flags.json",'r');
   $read_flags = json_decode(fread($flags, filesize("models/covid19_json/world_flags.json")), true);

   return $read_flags;
 }
}

 ?>
