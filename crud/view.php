<?php

require 'dbcon.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Edit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

</head>

<body>
    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student View details
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if (isset($_GET['id'])) {
                            $student_id = mysqli_real_escape_string($con, $_GET['id']); //real_escape makes the query secure
                            $query = "SELECT * FROM students WHERE id='$student_id' ";
                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                $tudent = mysqli_fetch_array($query_run);

                        ?>


                                <div class="mb-3">
                                    <Label>Student Name</Label>
                                    <p class="form-control"><?= $tudent['name'] ?></p>
                                </div>

                                <div class="mb-3">
                                    <Label>Student Email</Label>
                                    <p class="form-control"><?= $tudent['email'] ?></p>
                                </div>

                                <div class="mb-3">
                                    <Label>Student Phone</Label>
                                    <p class="form-control"><?= $tudent['phone'] ?></p>
                                </div>

                                <div class="mb-3">
                                    <Label>Student Course</Label>
                                    <p class="form-control"><?= $tudent['course'] ?></p>
                                </div>


                        <?php

                            } else {
                                echo "<h4>No such ID</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>