<?php
if (isset($_POST["submit"])) {
    include "config.php";
    $orderno = rand(100000, 1000000);
    $pname = $_POST["pname"];
    $pmobile = $_POST["pmobile"];
    $pgmail = $_POST["pgmail"];
    $pdob = $_POST["pdob"];
    $pcnic = $_POST["pcnic"];
    $paddress = $_POST["paddress"];
    $pstate = $_POST["pstate"];
    $testtime = $_POST["testtime"];
    $sql = "INSERT INTO `covidtest`(`orderno`,`name`, `mobile`, `gmail`, `dob`, `cnic`, `address`, `state`, `timeslot`, `hospital`, `remarks`) VALUES ('{$orderno}','{$pname}','{$pmobile}','{$pgmail}','{$pdob}','{$pcnic}','{$paddress}','{$pstate}','{$testtime}','0','0');";
    if (mysqli_query($conn, $sql)) {
        echo "<script>
          alert('Copy your order number for searching your result: $orderno');
          window.location.href = 'index.php';
        </script>";
    }
    ;

}