<?php

require "../config/database.php";

session_start();


if (!isset($_SESSION["admin"])) {
    echo "<script> location.replace('index.php') </script>";
}


$query = "select (select count(id) from pcos_2023_form where status = 'PCOS') as pcos, (select count(id) from pcos_2023_form where status = 'NON PCOS') as nonpcos ";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Results</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <style>
        .bg-primary-subtle-2 {
            background-color: #eaf2fb !important;
        } 
        .form-control {
            box-shadow: none !important;
        }

        .form-select {
            box-shadow: none !important;
        }
    </style>
</head>

<body>

    <div class="d-flex flex-column bg-white min-vh-100">

        <nav class="navbar navbar-expand-lg border-bottom shadow-sm">
            <div class="container-fluid my-1 mx-5">
                <a class="navbar-brand text-primary-emphasis fw-bold fs-4" href="#">PCOS</a>
                <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-1">
                        <li class="nav-item">
                            <a class="nav-link text-primary-emphasis fw-bold" aria-current="page" href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary-emphasis fw-bold " aria-current="page" href="users.php">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary-emphasis fw-bold text-decoration-underline tug-2 active" aria-current="page" href="results.php">Results</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary-emphasis fw-bold" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>



        <?php
        if (isset($_SESSION["fail"])) {
        ?>
            <div class="position-fixed top-0 toastae start-50 translate-middle-x p-3" style="z-index: 11">
                <div id="liveToast" class="toast bg-danger bg-opacity-75 hide" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body ms-auto text-white">
                            Delete Failed !
                        </div>
                        <button type="button" class="btn-close shadow-none btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>

        <?php
        }
        unset($_SESSION["fail"]);
        ?>




        <?php
        if (isset($_SESSION["save"])) {
        ?>
            <div class="position-fixed top-0 toastae start-50 translate-middle-x p-3" style="z-index: 11">
                <div id="liveToast" class="toast bg-success bg-opacity-75 hide" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body ms-auto text-white">
                            Delete Succesfull !
                        </div>
                        <button type="button" class="btn-close shadow-none btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>

        <?php
        }
        unset($_SESSION["save"]);
        ?>




        <div class="container-fluid flex-fill d-flex bg-primary-subtle-2">

            <div class="container-fluid bg-white shadow-sm rounded-3  my-3">

                <h4 class="text-start ms-3 my-4 text-primary-emphasis text-decoration-underline tug-1">Results</h4>
                <hr>

                <div class="row mt-5 justify-content-center">

                    <div class="col-md-11">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="usertable">
                                <thead class="bg-primary text-white">
                                    <tr class="align-middle text-center text-nowrap">
                                        <th>Name</th>
                                        <th>Age </th>
                                        <th>Weight (Kgs)</th>
                                        <th>Height (Cms)</th>
                                        <th>Blood Group </th>
                                        <th>Result </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "select * from pcos_2023_form ";
                                    $result = mysqli_query($link, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <tr class="align-middle  text-nowrap">
                                            <td><?= $row["username"] ?></td>
                                            <td><?= $row["age"] ?></td>
                                            <td><?= $row["weight"] ?></td>
                                            <td><?= $row["height"] ?></td>
                                            <td><?= $row["bloodgroup"] ?></td>
                                            <td><?= $row["status"] ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>


    </div>

    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        $(function() {

            $("#usertable").DataTable({
                lengthMenu: [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, 'All'],
                ],
            });

            $('.toast').toast('show');

            $("input,textarea,select").on("keydown change", function() {
                $(this).removeClass("is-invalid")
            })

        })
    </script>
</body>

</html>