<?php
$conn = mysqli_connect("localhost","root","","what");
ini_set('display_errors', 0);
error_reporting(E_ALL ^ E_WARNING); 
// Include mpdf library file
require_once __DIR__ . '/autoload.php';
$mpdf =new mPDF();

$id  =$_GET['id'];
// Select data from MySQL database
$sql = "SELECT `orderno`, `name`, `mobile`, `gmail`, `dob`, `cnic`, `address`, `state`, `timeslot`, `hospital`, `remarks` FROM `covidtest` WHERE `orderno`='$id';";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $cnt = 1;
while ($row = mysqli_fetch_assoc($result)) {
$name=$row['name'];
$mobile=$row['mobile'];
$dob=$row['dob'];
$cnic=$row['cnic'];
$address=$row['address'];
$state=$row['state'];
$timeslot=$row['timeslot'];
$hospital=$row['hospital'];
$remarks=$row['remarks'];

}}

// Take PDF contents in a variable
$pdfcontent = '<h1 class="h3 mb-4 text-gray-800">Test Details#.$id.
</h1>
<div class="row">
<!-- personal information --->
<div class="col-lg-6">

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Personal Information</h6>
        </div>
        <div class="card-body">

            <table class="table table-bordered" width="100%" cellspacing="0">
                <tr>
                    <th>Full Name</th>
                    <td>
$name
                    </td>
                </tr>

                <tr>
                    <th>Mobile Number</th>
                    <td>
                    $mobile
                    </td>
                </tr>

                <tr>
                    <th>DOB (Date of Birth)</th>
                    <td>
                    $dob
                    </td>
                </tr>


                <tr>
                    <th>Cnic</th>
                    <td>
                    $cnic
                    </td>
                </tr>


                <tr>
                    <th>Full Address</th>
                    <td>
                    $address
                    </td>
                </tr>

                <tr>
                    <th>State</th>
                    <td>
                    $state
                    </td>
                </tr>
            </table>



        </div>
    </div>
</div>

<!-- Test Information --->
<div class="col-lg-6">

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Test Information</h6>
        </div>
        <div class="card-body">

            <table class="table table-bordered" width="100%" cellspacing="0">
                <tr>
                    <th>Order Number</th>
                    <td>
                    $id
                    </td>
                </tr>

                <tr>
                    <th>Time Slot</th>
                    <td>
                    $timeslot
                    </td>
                </tr>
                <tr>
                    <th>Hospital</th>
                    <td>
                    $hospital
                    </td>
                </tr>

                <tr>
                    <th>Report Status</th>
                    <td>
                    $remarks
                    </td>
                </tr>
            </table>
        </div>
    </div>

</div>
</div>';

$mpdf->WriteHTML($pdfcontent);

$mpdf->SetDisplayMode('fullpage');
$mpdf->list_indent_first_level = 0;

//call watermark content and image
$mpdf->SetWatermarkText('etutorialspoint');
$mpdf->showWatermarkText = true;
$mpdf->watermarkTextAlpha = 0.1;

//output in browser
$mpdf->Output();
?>