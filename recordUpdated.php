<?php
//connect to the database
include 'sqlConnect.php';

//get the machine in question 
$machine = $_GET['MachineID'];

//serve the ip of the machine 
$con = MYSQLconnect();
$stmt = $con->prepare("select ip from IPTrack where MachineID = :MID");
$stmt->bindParam(':MID',$machine);
$stmt->execute();
echo $stmt->fetch()['ip'];


