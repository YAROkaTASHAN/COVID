<?php
include "config.php" ;
 $id = $_GET["id"] ;

 $sql ="DELETE FROM `hospital` WHERE `hid`=$id ";
 $result =mysqli_query($conn,$sql);
 if($result){
    header("location:{$host}Rhospital.php");
 }
?>