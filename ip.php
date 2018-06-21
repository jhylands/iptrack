<?php
if(!isset($_GET['MachineID'])){
	die(403);
}

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


try { 
    $stmt = $conn->prepare("select * from TrustedIP where Machine=:MID ORDER BY DateUpdated DESC");
    $stmt->bindParam(':MID',$_GET['MachineID']);
    $stmt->execute();
    $StoredMachineIP = $stmt->fetch()['IP'];
}
catch(PDOException $e){
	echo 'fail' . $e->getMessage();
}

if($StoredMachineIP==$_SERVER['REMOTE_ADDR']){
    echo '1'; //no error,  no change
    $stmt = $conn->prepare("Update TrustedIP set DateUpdated=now() where Machine=:MID order by DateUpdated limit 1");
    $stmt->bindParam(':MID',$_GET['MachineID']);
    $stmt->execute();
}else{
    echo '2'; //no error, changed
    $stmt = $conn->prepare("insert into TrustedIP (Machine,IP) values(:MID,:IP)");
    $stmt->bindParam(':MID',$_GET['MachineID']);
    $stmt->bindParam(':IP',$_SERVER['REMOTE_ADDR'] );
    $stmt->execute();
}

//check the other addresses to make sure everyone is present
//query("select max(DateUpdated) from IPTrack where ... GROUP BY MachineID");

//if a device hasn't registered recently then alert James to this fault
$stmt = $conn->prepare("SELECT * FROM (select Machine,max(DateUpdated) as DateUpdated from `TrustedIP` GROUP by Machine) as lastCheckin WHERE lastCheckin.DateUpdated <now()-INTERVAL 1 HOUR");
$stmt->execute();
foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
    echo $row['Machine'] . "<br />";
}

