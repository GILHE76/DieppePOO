<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 03/05/2018
 * Time: 10:14
 */

class Berline extends Voitures
{
    public $couleur;

    public function peindre($color)
    {
        $this->couleur = $color;
    }
    public function distanceFreinage()
    {
        echo "je freine c'est génial";
    }

}