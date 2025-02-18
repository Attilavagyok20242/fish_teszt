<?php
require_once "FishingRodRestKezelo.php";
$fishingRodrestKezelo= new FishingRodrestKezelo();
echo json_encode([
    "message" => "Összes horgászbot teszt:\n",
    "data" =>$fishingRodrestKezelo->getAllFRod()
]);
print ("\n");

$fishingRodrestKezelo= new FishingRodrestKezelo();
echo json_encode([
    "message" => "Horgászbot id .  Ismeretlen:\n",
    "data" =>$fishingRodrestKezelo->getRodById(999)
]);
print ("\n");
$fishingRodrestKezelo= new FishingRodrestKezelo();
echo json_encode([
    "message" => "Horgászbot lekérdezés .  Ismeretlen Tipus:\n",
    "data" =>$fishingRodrestKezelo->getRodByType('Unknown')
]);
print ("\n");
$fishingRodrestKezelo= new FishingRodrestKezelo();
echo json_encode([
    "message" => "Hibás lekérdezés .  Ismeretlen Tipus:\n",
    "data" =>$fishingRodrestKezelo->getFault()
]);
print ("\n");