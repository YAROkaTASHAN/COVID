<?php include "header.php"; ?>
<div class="clearfix"></div>
<div class="content-wrapper">
    <div class="container-fluid">

        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body"></div>
                    <div class="col-md col-lg">
                        <!-- Form Start -->
                        <?php
                        include "config.php";
                        $id = $_GET["id"];
                        $sql = "SELECT * FROM `covidtest` WHERE `tid`='$id';";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {

                        ?>
                        <table class="table table-bordered ml-10" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <h3>Patient Detail</h3>
                                <tr>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>State</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>State</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>

                                <tr>
                                    <td>
                                        <?php echo $row['name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['address']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['state']; ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <?php } ?>
                        <?php
                        include "config.php";
                        $id = $_GET["id"];
                        $sql = "SELECT * FROM `covidtest` WHERE `tid`='$id';";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {

                        ?>
                        <form action="" method="POST">
                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <div class="form-group">
                                <label for="input-4">REMARKS(Positive/negative)</label>
                                <input type="text" name='hospital' class="form-control" id="input-5"
                                    value="<?php echo $row['remarks']; ?>">
                            </div>
                            <?php } ?>
                            <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                        </form>
                        <?php } ?>
                        <!-- /Form -->
                        <?php
                        include "config.php";
                        if (isset($_POST["submit"])) {
                            $hospital = $_POST["hospital"];

                            $query = "UPDATE `covidtest` SET `remarks`='$hospital' WHERE `tid`='$id';";
                            $result = mysqli_query($conn, $query);
                            if ($result) {
                                header("location:{$host}hospitalupdatestatus.php");
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php include "footer.php"; ?>