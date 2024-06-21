<?php
session_start();
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
        <?php include('message.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student Edit
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


                                <form action="code.php" method="POST">

                                    <input type="hidden" name="student_id" value="<?= $student_id?>">
                                    <div class="mb-3">
                                        <Label>Student Name</Label>
                                        <input type="text" name="name" value="<?= $tudent['name']?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <Label>Student Email</Label>
                                        <input type="text" name="email" value="<?= $tudent['email']?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <Label>Student Phone</Label>
                                        <input type="text" name="phone" value="<?= $tudent['phone']?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <Label>Student Course</Label>
                                        <input type="text" name="course" value="<?= $tudent['course']?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" name="update_student" class="btn btn-primary">Update Student</button>
                                    </div>
                                </form>
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