<?php
//php file to contain a simplified SQL structure
function SQLConnect($vocal){
//look up what the local definition of the ip adress was for that machine 
$servername = "localhost";
$username = "timepcou_iptrack";
$password = "space(176)";

try {
    $conn = new PDO("mysql:host=$servername;dbname=timepcou_iptrack", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($vocal){echo "Connected successfully"; }
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
} 
return $conn;
}
