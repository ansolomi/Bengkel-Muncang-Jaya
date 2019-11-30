<?php
/* Attempt to connect to database */
$link = pg_connect("host=localhost dbname=sbdtest user=postgres password=asdf");
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . "Error");
}
?>

