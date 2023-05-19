<?php

require "config/database.php";

session_start();


if (isset($_SESSION["user"])) {
    echo "<script> location.replace('dashboard.php') </script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
</head>

<body>

    <div class="d-flex flex-column bg-white min-vh-100">

        <nav class="navbar navbar-expand-lg border-bottom">
            <div class="container-fluid my-1 mx-5">
                <a class="navbar-brand text-primary-emphasis fw-bold fs-4" href="#">PCOS</a>
                <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-1">
                        <li class="nav-item">
                            <a class="nav-link text-primary-emphasis fw-bold" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary-emphasis fw-bold" href="login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary-emphasis fw-bold text-decoration-underline tug-2 active" href="register.php">Register</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        

        <?php
        if (isset($_SESSION["exists"])) {
        ?>

            <div class="position-fixed top-0 toastae start-50 translate-middle-x p-3" style="z-index: 11">
                <div id="liveToast" class="toast bg-danger bg-opacity-75 hide" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body ms-auto text-white">
                            User Already Exists !
                        </div>
                        <button type="button" class="btn-close shadow-none btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>

        <?php
        }
        unset($_SESSION["exists"]);
        ?>

        <?php
        if (isset($_SESSION["save"])) {
        ?>

            <div class="position-fixed top-0 toastae start-50 translate-middle-x p-3" style="z-index: 11">
                <div id="liveToast" class="toast bg-success bg-opacity-75 hide" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body ms-auto text-white">
                            Registration Success !
                        </div>
                        <button type="button" class="btn-close shadow-none btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>

        <?php
        }
        unset($_SESSION["save"]);
        ?>

        <?php
        if (isset($_SESSION["fail"])) {
        ?>
            <div class="position-fixed top-0 toastae start-50 translate-middle-x p-3" style="z-index: 11">
                <div id="liveToast" class="toast bg-danger bg-opacity-75 hide" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body ms-auto text-white">
                            Registration Failed !
                        </div>
                        <button type="button" class="btn-close shadow-none btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>

        <?php
        }
        unset($_SESSION["fail"]);
        ?>



        <div class="container-fluid flex-fill d-flex">
            <div class="row ">
                <div class="col-md-5 d-flex align-items-center">

                    <form method="post" action="saveuser.php" id="saveuserform">

                        <div class="row justify-content-center">
                            <div class="col-md-10 mt-4 mb-3">
                                <h4 class="text-center text-decoration-underline tug-1 text-primary-emphasis">Register</h4>
                            </div>
                            <div class="col-md-10 my-1 position-relative">
                                <label for="name" class="form-label">Name :</label>
                                <input type="text" name="name" id="name" placeholder="Name" class="form-control shadow-none border border-secondary">
                                <div class="invalid-tooltip rounded-3">
                                    * Enter Name
                                </div>
                            </div>
                            <div class="col-md-10 my-1 position-relative">
                                <label for="email" class="form-label">Email :</label>
                                <input type="text" name="email" id="email" placeholder="E-mail" class="form-control shadow-none border border-secondary">
                                <div class="invalid-tooltip rounded-3 alertemail">
                                    * Enter Valid Email
                                </div>
                            </div>
                            <div class="col-md-10 my-1 position-relative">
                                <label for="password" class="form-label">Password :</label>
                                <input type="password" name="password" id="password" placeholder="Password" class="form-control shadow-none border border-secondary">
                                <div class="invalid-tooltip rounded-3 ">
                                    * Enter Password
                                </div>
                            </div>
                            <div class="col-md-10 my-1 position-relative">
                                <label for="phone" class="form-label">Phone :</label>
                                <input type="text" name="phone" id="phone" placeholder="Phone" class="form-control shadow-none border border-secondary">
                                <div class="invalid-tooltip rounded-3 alertphone">
                                    * Enter Valid Phone
                                </div>
                            </div>
                            <div class="col-md-10 my-1">
                                <div class="row">
                                    <div class="col-md-6 position-relative">
                                        <label for="age" class="form-label">Age :</label>
                                        <input type="number" name="age" id="age" min="1" max="100" placeholder="Age" class="form-control shadow-none border border-secondary">
                                        <div class="invalid-tooltip rounded-3 ">
                                            * Select Age
                                        </div>
                                    </div>
                                    <div class="col-md-6 position-relative">
                                        <label for="gender" class="form-label">Gender :</label>
                                        <select name="gender" id="gender" class="form-control shadow-none border border-secondary">
                                            <option value="">Select Gender</option>
                                            <!--<option value="male">Male</option>-->
                                            <option value="female">Female</option>
                                        </select>
                                        <div class="invalid-tooltip rounded-3 ">
                                            * Select Gender
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10 my-4">
                                <button type="submit" name="saveuser" class="btn btn-primary w-100 shadow-none">Register</button>

                                <div class="text-center gap-2 pt-4">
                                    <div class="d-inline">
                                        Already have an account?
                                        <a href="login.php" class="text-decoration-none text-white shadow-none rounded-2 btn btn-sm btn-primary">
                                            Login
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
                <div class="col-md-7 d-md-flex flex-md-column d-none align-items-center justify-content-center">
                    <img src="images/hero.jpg" alt="hero" class="img-fluid">
                    <!-- <div class="h4 fw-bold text-center fw-normal text-primary-emphasis">
                        Bharath Arogya Sugama Vyavastha
                    </div> -->
                </div>
            </div>
        </div>


    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>


    <script>
        $(function() {

            $('.toast').toast('show');


            $("#saveuserform").on("submit", function(e) {
                debugger;

                var email = $("#email").val()
                var password = $("#password").val()
                var name = $("#name").val()
                var phone = $("#phone").val()
                var gender = $("#gender").val()
                var age = $("#age").val()
                var testemail = new RegExp("[a-z0-9]+@[a-z]+\.[a-z]{2,3}");
                var testphone = new RegExp("^[6-9][0-9]{9}$");
                var testaadhar = new RegExp("^[2-9]{1}[0-9]{3}[0-9]{4}[0-9]{4}$");


                if (email != "") {
                    if (!testemail.test(email)) {
                        $(".alertemail").text("* Enter Valid Email");
                        $("#email").addClass("is-invalid");
                        e.preventDefault();
                    } else {
                        $("#email").removeClass("is-invalid");
                    }
                } else {
                    $(".alertemail").text("* Enter Email");
                    $("#email").addClass("is-invalid");
                    e.preventDefault();
                }


                if (password != "") {
                    $("#password").removeClass("is-invalid");
                } else {
                    $("#password").addClass("is-invalid");
                    e.preventDefault();
                }

                if (phone != "") {
                    if (!testphone.test(phone)) {
                        $(".alertphone").text("* Enter Valid Phone");
                        $("#phone").addClass("is-invalid");
                        e.preventDefault();

                    } else {
                        $("#phone").removeClass("is-invalid");
                    }
                } else {
                    $(".alertphone").text("* Enter Phone");
                    $("#phone").addClass("is-invalid");
                    e.preventDefault();
                }

                if (name != "") {
                    $("#name").removeClass("is-invalid");
                } else {
                    $("#name").addClass("is-invalid");
                    e.preventDefault();

                }

                if (gender != "") {
                    $("#gender").removeClass("is-invalid");
                } else {
                    $("#gender").addClass("is-invalid");
                    e.preventDefault();

                }

                if (age != "") {
                    $("#age").removeClass("is-invalid");
                } else {
                    $("#age").addClass("is-invalid");
                    e.preventDefault();

                }

            })

            $("input,textarea,select").on("keydown change", function() {
                $(this).removeClass("is-invalid")
            })

        })
    </script>
</body>

</html>