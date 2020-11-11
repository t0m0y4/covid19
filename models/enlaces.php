<?php

class EnlacesModels{

    public function enlaceModel($enlaces){

        if($enlaces == "formularioPreguntas" ||
           $enlaces == "login3" ||
           $enlaces == "inicio" ||
           $enlaces == "modalEncuesta"||
           $enlaces == "covid19Status" ||
           $enlaces == "covid19World" ||
           $enlaces == "detallesEncuesta") {

            $module = "views/model/".$enlaces.".php";

        }

        else if($enlaces == "index"){

            $module = "views/model/inicio.php";

        }

        else{

            $module = "views/model/inicio.php";
        }

        return $module;
    }
}
