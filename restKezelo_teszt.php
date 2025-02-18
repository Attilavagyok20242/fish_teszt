<?php
require_once("restKezelo.php");
$restKezelo=new Restkezelo();
echo "200-as teszt - OK-ra";
echo $restKezelo->gethttpStatusUzenet(200). "<br>";
echo "400-as teszt - BAD-ra";
echo $restKezelo->gethttpStatusUzenet(400). "<br>";
echo "404-as teszt - NOT FOUND-ra";
echo $restKezelo->gethttpStatusUzenet(404). "<br>";
echo "500-as teszt - Internal server-re";
echo $restKezelo->gethttpStatusUzenet(500). "<br>";
echo " Ismeretlen statusz kód";
echo $restKezelo->gethttpStatusUzenet(500). "<br>";