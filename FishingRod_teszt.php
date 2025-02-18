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
echo "<h2>Id alapján horgászbotot</h2>";
$rbid=$fr->getFishingRodById(1);
if (!empty($rbid))
{
    foreach ($rbid as $pbot)
    {
        echo "id: " . $pbot['fr_ID'] . " - Név: " . $pbot['name'] . "<br>";
    }
}
else
{
    echo "Nincs találat az ID-s horgászbot leérdezésre!";
}



echo "<h2>Unknown Id alapján horgászbotot</h2>";
$rbuid=$fr->getFishingRodById(9999);
if (empty($rbuid))
{
    echo "<br>";
    print_r($rbuid);
    echo "nincs találat a hibás ID-ra";
}
else
{
    echo "Nem várt találat!";
    echo "<br>";
    print_r($rbuid);
}


echo "<h2>Típus alapján horgászbotot</h2>";
$rbtype=$fr->getFishingRodByType('Rakos');
if (!empty($rbtype))
{
    foreach ($rbtype as $pbot)
    {
        echo "id: " . $pbot['fr_ID'] . " - Név: " . $pbot['name'] . "<br>";
    }
}
else
{
    echo "Nincs találat a típusra!";
}


echo "<h2>THibás típusú horgászbot</h2>";
$rbnutype=$fr->getFishingRodByType('Unknown');
print_r($rbnutype);

if (empty($rbnutype))
{
    echo "ezt vártuk";
}
else
{
    echo "Hiba: nem várt találat!";
}