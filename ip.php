<?php
//look up what the local definition of the ip adress was for that machine 
$servername = "localhost";
$username = "timepcou_iptrack";
$password = "space(176)";

try {
    $conn = new PDO("mysql:host=$servername;dbname=timepcou_iptrack", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }


/*
query("select * from IPTrack where MachineID=? ORDER BY DateUpdated DESC",$_POST['MachineID']);
if($StoredMachineID==$_POST['MachineID']){
    echo '1'; //no error,  no change
}else{
    echo '2'; //no error, changed
    query("insert into IPTrack (MachineID,IP) values($MachineID,$ip)");
}

//check the other addresses to make sure everyone is present
//query("select max(DateUpdated) from IPTrack where ... GROUP BY MachineID");

//if a device hasn't registered recently then alert James to this fault
*/
