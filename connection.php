<?php

$dbname ="formulier";
$user ="sjoerd";
$password ="MyNewPass4!";
// Proberen verbinding te maken met de database en de verbinding opslaan in de variable conn
try{
    // de host van de docker is db
    $conn = new PDO("mysql:host=db;dbname=$dbname",$user,$password);
}catch(PDOexception $ex){
    // als de verbdingn maken mislukt
    echo"verbinding mislukt";
}

?>