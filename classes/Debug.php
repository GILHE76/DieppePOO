<?php
class Debug
{
    public static function dump($test)
    {
        echo "<pre>";
        var_dump($test);
        echo "</pre>";
    }
}