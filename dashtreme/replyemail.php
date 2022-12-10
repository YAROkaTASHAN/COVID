<?php include "header.php"; ?>
<br><br><br>
<?php
include "config.php";
$id = $_GET["id"];
$email = $_GET["email"];
$subject = $_GET["subject"];
$sql = "SELECT * FROM `feedback` WHERE `mid`='$id';";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {


?>
<div class="container">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Feedback messages</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Gmail</th>
                            <th>Subject</th>
                            <th>Messages</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Gmail</th>
                            <th>Subject</th>
                            <th>Messages</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                        <tr>
                            <td>
                                <?php echo $row['email']; ?>
                            </td>
                            <td>
                                <?php echo $row['subject']; ?>
                            </td>
                            <td>
                                <?php echo $row['message']; ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<?php } ?>
<div class="content-wrapper">
    <div class="container-fluid">

        <div class="row mt-3">
            <div class="col-lg">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Reply</div>
                        <hr>
                        <form action="mailer/send.php" method="POST">
                            <div class="form-group">
                                <label for="input-1">email</label>
                                <input type="text" name='email' class="form-control" id="input-1"
                                    value="<?php echo $email; ?>">
                            </div>
                            <div class="form-group">
                                <label for="input-1">Subject</label>
                                <input type="text" name='subject' class="form-control" id="input-1"
                                    value="<?php echo $subject; ?>">
                            </div>
                            <div class="form-group">
                                <label for="input-1">Reply</label>
                                <input type="text" name='reply' class="form-control" id="input-1"
                                    placeholder="Enter Email Reply">
                            </div>
                            <div class="form-group">
                                <input type="submit" name='save' class="btn btn-light px-5" value="Send email">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--End Row-->

        <!--start overlay-->
        <div class="overlay toggle-menu"></div>
        <!--end overlay-->

    </div>
    <!-- End container-fluid-->

</div>

<br><br><br>
<?php include "footer.php"; ?>