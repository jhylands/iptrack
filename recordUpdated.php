<?php
//connect to the database
include 'sqlConnect.php';

//get the machine in question 
$machine = $_GET['MachineID'];

//serve the ip of the machine 
$con = SQLconnect(0);
$stmt = $con->prepare("select ip from TrustedIP where Machine = :MID order by DateUpdated");
$stmt->bindParam(':MID',$machine);
$stmt->execute();
echo $stmt->fetch()['ip'];


