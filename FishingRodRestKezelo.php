<?php
require_once("restKezelo.php");
require_once("FishingRod.php");

class FishingRodrestKezelo extends Restkezelo
{
    function getAllFRod()
    {
        $fishingrod= new FishingRod();
        $soradat=$fishingrod->getAllFishingRods();
        if(empty($soradat))
        {
            $statusCode=404;
            $soradat=array('error'=>'Semmilyen pecabotot nem találtunk!');
        }
        else
        {
            $statusCode=200;
        }
        $this->sethttpFejlec($statusCode);
        $result["fishingRods"]=$soradat;

        //Válasz küldée json-ben
        $response=$this->encodeJson($result);
        echo $response;
    }

    function getRodById($id)
    {
        $fishingrod=new FishingRod();
        $soradat=$fishingrod->getFishingRodById($id);
        if(empty($soradat))
        {
            $statusCode=404;
            $soradat=array('error'=>'Semmilyen pecabotot nem találtunk erre az id-ra!');
        }
        else
        {
            $statusCode=200;
        }
        $this->sethttpFejlec($statusCode);
        $result["fishingRodById"]=$soradat;

        //Válasz küldése json-ben
        $response=$this->encodeJson($result);
        echo $response;
    }

    function getRodByType($tid)
    {
        $fishingrod=new FishingRod();
        $soradat=$fishingrod->getFishingRodByType($tid);
        if(empty($soradat))
        {
            $statusCode=404;
            $soradat=array('error'=>"Semmilyen ilyen típusú bot ne található!");
        }
        else
        {
            $statusCode=200;
        }
        $this->sethttpFejlec($statusCode);
        $result["fishingRodByManufacturer"]=$soradat;

        //Válasz json formátumban
        $response=$this->encodeJson($result);
        echo $response;
    }

    function getFault()
    {
        $statusCode=400;
        $this->sethttpFejlec($statusCode);
        $soradat=array('error'=>'Rossz kérés');
        $result["hiba"]=$soradat;

        //Válasz küldése JSON forátumban
        $response=$this->encodeJson($result);
        echo $response;
    }


    function encodeJson($responseData)
    {
        $jsonResponse= json_encode($responseData);
        return $jsonResponse;
    }
}

?>