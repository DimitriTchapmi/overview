<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=overview;charset=utf8', 'root', 'overview');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}