<?php
//look up what the local definition of the ip adress was for that machine 

query("select * from IPTrack where MachineID=? ORDER BY DateUpdated DESC",$_POST['MachineID']);
//if($StoredMachineID==$_POST['MachineID']){
    echo '1'; //no error,  no change
}else{
    echo '2'; //no error, changed
}

//check the other addresses to make sure everyone is present
query("select max(DateUpdated) from IPTrack where ... GROUP BY MachineID");

//if a device hasn't registered recently then alert James to this fault

