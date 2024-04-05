<?php 


function show($stuff)
{
    echo "<pres>";
    print_r($stuff);
    echo "</pres>";
}

function splitURL(){
    $URL = $_GET['url'] ?? 'home';
    $URL = explode("/", $URL);
    show($URL);
}
