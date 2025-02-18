<?php
require_once "FishingRod.php";
$fr=new FishingRod();
echo "<h2>Összes horgászbotot</h2>";
$ar=$fr->getAllFishingRods();
if(!empty($ar)){
    foreach($ar as $pbot){
        echo "id:".$pbot['fr_ID']."-Név:".$pbot['name']."<br>";
    }
}
else{
    echo "Nincs találat az összes horgászbot lekérdezésére!";
}