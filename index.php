<?php
require_once 'vendor/autoload.php';

use Ballen\Distical\Calculator as DistanceCalculator;
use Ballen\Distical\Entities\LatLong;
use SujalPatel\IntToEnglish\IntToEnglish;



try{

echo'
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="UTF-8">
</head>

<body>


    <div >

        <div >
            <h4>Examen Despliegue Aplicaciones Web</h4>
        </div>
    <aside>
        <h5>Enlace Heroku </h5>
        Pulsa sobre esta imagen para ver desplegada la aplicacion sobre heroku
        <p>
        <a title="Heroku" href="https://examen-adrianiglesias.herokuapp.com/"><img src="img/heroku-logo-solid-gradient.png
    " alt="Heroku" width="120" height="120" /></a></p>
    </aside>
<form  method = "POST">
<div >
    
    <div >
        <label for="lt1">Introduce la Latitud 1:</label>
        <input name="lt1" type="text" class="validate">
        
    </div>
    <div class="input-field col s2">
        <label for="lg1">Introduce la Longitud   1:</label>
        <input name="lg1" type="text" class="validate">
    
    </div>
    <div class="input-field col s2">
        <label for="lt2">Introduce la Latitud  2:</label>
        <input name="lt2" type="text" class="validate">
    
    </div>
    <div class="input-field col s2">
        <label for="lg2">Introduce la Longitud 2:</label>
        <input name="lg2" type="text" class="validate">
    
    </div>
    <button  type="submit" name="calcular">Calcular</button>
    </div>
    </form>'
    ;
        if (isset($_REQUEST['calcular'])) {
        $lt1 = htmlspecialchars($_REQUEST['lt1']);
        $lg1 = htmlspecialchars($_REQUEST['lg2']);
        $lt2 = htmlspecialchars($_REQUEST['lt2']);
        $lg2 = htmlspecialchars($_REQUEST['lg2']);
        $ipValladolid = new LatLong($lt1, $lg1);
        $ipSevilla = new LatLong($lt2, $lg2);
        $distanceCalculator = new DistanceCalculator($ipValladolid, $ipSevilla);
        $distance = (int)$distanceCalculator->get()->asKilometres();
      
        echo '<div class="col s12">';
        echo '<p>Distancia Valladolid y Sevilla es : ' . $distance . '</p>';
      
        echo '<p>La distancia en ingles es: ' . IntToEnglish::Int2Eng($distance) . '</p>';
        echo '</div>';
    }
   
} catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}


 
        


