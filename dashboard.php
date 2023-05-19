<?php

require "config/database.php";

session_start();


if (!isset($_SESSION["user"])) {
    echo "<script> location.replace('login.php') </script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <style>
        .bg-primary-subtle-2 {
            background-color: #eaf2fb !important;
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
                            <a class="nav-link text-decoration-underline tug-2 active text-primary-emphasis fw-bold" aria-current="page" href="dashboard.php">Dashboard</a>
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
                            Login Failed !
                        </div>
                        <button type="button" class="btn-close shadow-none btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>

        <?php
        }
        unset($_SESSION["fail"]);
        ?>




        <div class="container-fluid flex-fill d-flex bg-primary-subtle-2">

            <div class="container-fluid bg-white shadow-sm rounded-3  my-3">

                <h4 class="text-start ms-3 my-4 text-primary-emphasis text-decoration-underline tug-1">Form</h4>
                <hr>

                <div class="row mb-1 justify-content-center">

                    <div class="col-md-12">

                        <form method="post" action="saveform.php" id="userloginform">

                            <div class="row justify-content-center">

                                <div class="col-md-12">

                                    <div class="row justify-content-evenly">

                                        <div class="col-md-5 my-3 position-relative">
                                            <div class="period">
                                                <label for="period" class="form-label d-block mb-3 fs-5">1) Do you have irregular periods? </label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="period" id="periodyes" value="1">
                                                    <label class="form-check-label" for="periodyes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="period" id="periodno" value="0">
                                                    <label class="form-check-label" for="periodno">No</label>
                                                </div>
                                            </div>
                                            <div class="invalid-tooltip rounded-3 ">
                                                * Select Your Answer
                                            </div>
                                        </div>

                                        <div class="col-md-5 my-3 position-relative">
                                            <div class="pregnant">
                                                <label for="pregnant" class="form-label d-block mb-3 fs-5">2) Do you have difficulty in getting pregnant? </label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="pregnant" id="pregnantyes" value="1">
                                                    <label class="form-check-label" for="pregnantyes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="pregnant" id="pregnantno" value="0">
                                                    <label class="form-check-label" for="pregnantno">No</label>
                                                </div>
                                            </div>
                                            <div class="invalid-tooltip rounded-3 ">
                                                * Select Your Answer
                                            </div>
                                        </div>

                                        <div class="col-md-5 my-3 position-relative">
                                            <div class="excesshair">
                                                <label for="excesshair" class="form-label d-block mb-3 fs-5">3) Do you have excessive hair growth? </label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="excesshair" id="excesshairyes" value="1">
                                                    <label class="form-check-label" for="excesshairyes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="excesshair" id="excesshairno" value="0">
                                                    <label class="form-check-label" for="excesshairno">No</label>
                                                </div>
                                            </div>
                                            <div class="invalid-tooltip rounded-3 ">
                                                * Select Your Answer
                                            </div>
                                        </div>

                                        <div class="col-md-5 my-3 position-relative">
                                            <div class="weightgain">
                                                <label for="weightgain" class="form-label d-block mb-3 fs-5">4) Do you have problem of weight gain? </label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="weightgain" id="weightgainyes" value="1">
                                                    <label class="form-check-label" for="weightgainyes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="weightgain" id="weightgainno" value="0">
                                                    <label class="form-check-label" for="weightgainno">No</label>
                                                </div>
                                            </div>
                                            <div class="invalid-tooltip rounded-3 ">
                                                * Select Your Answer
                                            </div>
                                        </div>

                                        <div class="col-md-5 my-3 position-relative">
                                            <div class="thinhair">
                                                <label for="thinhair" class="form-label d-block mb-3 fs-5">5) Do you have thinning hair? </label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="thinhair" id="thinhairyes" value="1">
                                                    <label class="form-check-label" for="thinhairyes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="thinhair" id="thinhairno" value="0">
                                                    <label class="form-check-label" for="thinhairno">No</label>
                                                </div>
                                            </div>
                                            <div class="invalid-tooltip rounded-3 ">
                                                * Select Your Answer
                                            </div>
                                        </div>

                                        <div class="col-md-5 my-3 position-relative">
                                            <div class="skinacne">
                                                <label for="skinacne" class="form-label d-block mb-3 fs-5">6) Do you have oily skin or acne? </label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="skinacne" id="skinacneyes" value="1">
                                                    <label class="form-check-label" for="skinacneyes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="skinacne" id="skinacneno" value="0">
                                                    <label class="form-check-label" for="skinacneno">No</label>
                                                </div>
                                            </div>
                                            <div class="invalid-tooltip rounded-3 ">
                                                * Select Your Answer
                                            </div>
                                        </div>

                                        <div class="col-md-5 my-3 position-relative">
                                            <label for="age" class="form-label d-block mb-3 fs-5">
                                                7) Your Age (Yrs) ?
                                            </label>
                                            <input type="number" name="age" id="age" placeholder="Age (Yrs)" class="form-control shadow-none border-0 rounded-0 border-dark border-bottom" value="<?= $_SESSION["userage"] ?>" min="1" max="100">
                                            <div class="invalid-tooltip rounded-3">
                                                * Enter Your Age
                                            </div>
                                        </div>

                                        <div class="col-md-5 my-3 position-relative">
                                            <label for="weight" class="form-label d-block mb-3 fs-5">8) Your Weight (Kgs) ? </label>

                                            <input type="number" name="weight" id="weight" placeholder="Weight (Kgs)" class="form-control shadow-none border-0 rounded-0 border-dark border-bottom" min="1" max="200">
                                            <div class="invalid-tooltip rounded-3">
                                                * Enter Your Weight
                                            </div>
                                        </div>

                                        <div class="col-md-5 my-3 position-relative">
                                            <label for="height" class="form-label d-block mb-3 fs-5">9) Your Height (Cms) ? </label>

                                            <input type="number" name="height" id="height" placeholder="Height (Cms)" class="form-control shadow-none border-0 rounded-0 border-dark border-bottom" min="1" max="300">
                                            <div class="invalid-tooltip rounded-3">
                                                * Enter Your Height
                                            </div>
                                        </div>

                                        <div class="col-md-5 my-3 position-relative">
                                            <label for="bmi" class="form-label d-block mb-3 fs-5">10) Your BMI? </label>

                                            <input type="number" name="bmi" id="bmi" placeholder="BMI" class="form-control shadow-none border-0 rounded-0 border-dark border-bottom bg-secondary-subtle" readonly>
                                            <div class="invalid-tooltip rounded-3">
                                                * Enter Your BMI
                                            </div>
                                        </div>

                                        <div class="col-md-5 my-3 position-relative">
                                            <label for="bloodgroup" class="form-label d-block mb-3 fs-5">11) Your Blood Group? </label>

                                            <select id="bloodgroup" name="bloodgroup" class="form-select shadow-none border-0 rounded-0 border-dark border-bottom">
                                                <option value="">Select Blood Type</option>
                                                <option value="0">A positive (A+)</option>
                                                <option value="1">A negative (A-)</option>
                                                <option value="2">B positive (B+)</option>
                                                <option value="3">B negative (B-)</option>
                                                <option value="4">O positive (O+)</option>
                                                <option value="5">O negative (O-)</option>
                                                <option value="6">AB positive (AB+)</option>
                                                <option value="7">AB negative (AB-)</option>
                                            </select>
                                            <div class="invalid-tooltip rounded-3">
                                                * Select Your Blood Group
                                            </div>
                                        </div>

                                        <div class="col-md-5 my-3 position-relative">
                                            <label for="bpm" class="form-label d-block mb-3 fs-5"> 12) Your Pulse Rate (Bpm) ? </label>

                                            <input type="number" name="bpm" id="bpm" placeholder="Pulse Rate" class="form-control shadow-none border-0 rounded-0 border-dark border-bottom" min="1">
                                            <div class="invalid-tooltip rounded-3">
                                                * Enter Your Pulse Rate
                                            </div>
                                        </div>

                                        <div class="col-md-5 my-3 position-relative">
                                            <label for="breathminute" class="form-label d-block mb-3 fs-5"> 13) Your Breaths Per Minute? </label>

                                            <input type="number" name="breathminute" id="breathminute" placeholder="Breaths Per Minute" class="form-control shadow-none border-0 rounded-0 border-dark border-bottom" min="1">
                                            <div class="invalid-tooltip rounded-3">
                                                * Enter Your Breaths Per Minute
                                            </div>
                                        </div>

                                        <div class="col-md-5 my-3 position-relative">
                                            <div class="foodregular">
                                                <label for="foodregular" class="form-label d-block mb-3 fs-5"> 14) Do you consume fast food regularly? </label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="foodregular" id="foodregularyes" value="1">
                                                    <label class="form-check-label" for="foodregularyes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="foodregular" id="foodregularno" value="0">
                                                    <label class="form-check-label" for="foodregularno">No</label>
                                                </div>
                                            </div>
                                            <div class="invalid-tooltip rounded-3 ">
                                                * Select Your Answer
                                            </div>
                                        </div>

                                        <div class="col-md-5 my-3 position-relative">
                                            <div class="excerciseregular">
                                                <label for="excerciseregular" class="form-label d-block mb-3 fs-5"> 15) Do you perform exercise regularly? </label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="excerciseregular" id="excerciseregularyes" value="1">
                                                    <label class="form-check-label" for="excerciseregularyes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="excerciseregular" id="excerciseregularno" value="0">
                                                    <label class="form-check-label" for="excerciseregularno">No</label>
                                                </div>
                                            </div>
                                            <div class="invalid-tooltip rounded-3 ">
                                                * Select Your Answer
                                            </div>
                                        </div>

                                        <div class="col-md-5 my-3 position-relative">
                                            <div class="havebp">
                                                <label for="havebp" class="form-label d-block mb-3 fs-5"> 16) Do you have BP? </label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="havebp" id="havebpyes" value="1">
                                                    <label class="form-check-label" for="havebpyes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="havebp" id="havebpno" value="0">
                                                    <label class="form-check-label" for="havebpno">No</label>
                                                </div>
                                            </div>
                                            <div class="invalid-tooltip rounded-3 ">
                                                * Select Your Answer
                                            </div>
                                        </div>




                                    </div>

                                </div>

                                <div class="col-md-12">

                                    <div class="row justify-content-evenly my-4 g-3">

                                        <div class="col-md-5  position-relative">
                                            <button class="btn btn-danger shadow-none w-100" type="reset" id="reset">Reset</button>
                                        </div>

                                        <input type="hidden" name="result" value="">

                                        <div class="col-md-5  position-relative">
                                            <button class="btn btn-primary shadow-none w-100" type="submit" name="saveuser">Submit</button>
                                        </div>

                                    </div>


                                    <div class="toast-container position-fixed top-0 end-0 p-3">
                                        <div id="liveToast" class="toast resulttoast" role="alert" aria-live="assertive" aria-atomic="true" style="display: none;">
                                            <div class="toast-header bg-primary-subtle">
                                                <strong class="me-auto">Your Result</strong>
                                                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                            </div>
                                            <div class="toast-body result">

                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>


    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>

    <script>
        $(function() {

            $('.toast').toast('show');

            $("#weight").on("change input", function() {
                debugger;
                var weight = $("#weight").val();
                var height = $("#height").val();

                if (weight !== "" && height !== "" && weight !== NaN && height !== NaN && weight !== 0 && height !== 0) {
                    var mydata=height/100;
                    mydata=mydata*mydata;
                    mydata=mydata.toFixed(4);
                    var bmi = (weight / mydata).toFixed(2);
                    $("#bmi").val(bmi);
                } else {
                    $("#bmi").val(0);
                }
            })

            $("#height").on("change input", function() {
                debugger;
                var weight = $("#weight").val();
                var height = $("#height").val();

                if (weight !== "" && height !== "" && weight !== NaN && height !== NaN && weight !== 0 && height !== 0) {
                    var mydata=height/100;
                    mydata=mydata*mydata;
                    mydata=mydata.toFixed(4);
                    var bmi = (weight / mydata).toFixed(2);
                    $("#bmi").val(bmi);
                } else {
                    $("#bmi").val(0);
                }
            })

          

            $("#userloginform").on("submit", function(e) {
                debugger;

                var period = $("input:radio[name='period']:checked").val()
                var pregnant = $("input:radio[name='pregnant']:checked").val()
                var excesshair = $("input:radio[name='excesshair']:checked").val()
                var weightgain = $("input:radio[name='weightgain']:checked").val()
                var thinhair = $("input:radio[name='thinhair']:checked").val()
                var skinacne = $("input:radio[name='skinacne']:checked").val()
                var foodregular = $("input:radio[name='foodregular']:checked").val()
                var excerciseregular = $("input:radio[name='excerciseregular']:checked").val()
                var havebp = $("input:radio[name='havebp']:checked").val()

                var age = $("#age").val()
                var weight = $("#weight").val()
                var height = $("#height").val()
                var bmi = $("#bmi").val()
                var bloodgroup = $("#bloodgroup").val()
                var bpm = $("#bpm").val()
                var breathminute = $("#breathminute").val()

                var testemail = new RegExp("[a-z0-9]+@[a-z]+\.[a-z]{2,3}");
                var testphone = new RegExp("^[6-9][0-9]{9}$");
                var testaadhar = new RegExp("^[2-9]{1}[0-9]{3}[0-9]{4}[0-9]{4}$");

                var state = true;


                if (period != "" && period !== undefined) {
                    $(".period").removeClass("is-invalid");
                } else {
                    $(".period").addClass("is-invalid");
                    e.preventDefault();
                    state = false;
                }


                if (pregnant != "" && pregnant !== undefined) {
                    $(".pregnant").removeClass("is-invalid");
                } else {
                    $(".pregnant").addClass("is-invalid");
                    e.preventDefault();
                    state = false;
                }


                if (excesshair != "" && excesshair !== undefined) {
                    $(".excesshair").removeClass("is-invalid");
                } else {
                    $(".excesshair").addClass("is-invalid");
                    e.preventDefault();
                    state = false;
                }


                if (weightgain != "" && weightgain !== undefined) {
                    $(".weightgain").removeClass("is-invalid");
                } else {
                    $(".weightgain").addClass("is-invalid");
                    e.preventDefault();
                    state = false;
                }


                if (thinhair != "" && thinhair !== undefined) {
                    $(".thinhair").removeClass("is-invalid");
                } else {
                    $(".thinhair").addClass("is-invalid");
                    e.preventDefault();
                    state = false;
                }


                if (skinacne != "" && skinacne !== undefined) {
                    $(".skinacne").removeClass("is-invalid");
                } else {
                    $(".skinacne").addClass("is-invalid");
                    e.preventDefault();
                    state = false;
                }


                if (foodregular != "" && foodregular !== undefined) {
                    $(".foodregular").removeClass("is-invalid");
                } else {
                    $(".foodregular").addClass("is-invalid");
                    e.preventDefault();
                    state = false;
                }


                if (excerciseregular != "" && excerciseregular !== undefined) {
                    $(".excerciseregular").removeClass("is-invalid");
                } else {
                    $(".excerciseregular").addClass("is-invalid");
                    e.preventDefault();
                    state = false;
                }


                if (havebp != "" && havebp !== undefined) {
                    $(".havebp").removeClass("is-invalid");
                } else {
                    $(".havebp").addClass("is-invalid");
                    e.preventDefault();
                    state = false;
                }


                if (age != "" && age !== undefined) {
                    $("#age").removeClass("is-invalid");
                } else {
                    $("#age").addClass("is-invalid");
                    e.preventDefault();
                    state = false;
                }


                if (weight != "" && weight !== undefined) {
                    $("#weight").removeClass("is-invalid");
                } else {
                    $("#weight").addClass("is-invalid");
                    e.preventDefault();
                    state = false;
                }


                if (height != "" && height !== undefined) {
                    $("#height").removeClass("is-invalid");
                } else {
                    $("#height").addClass("is-invalid");
                    e.preventDefault();
                    state = false;
                }


                if (bmi != "" && bmi !== undefined) {
                    $("#bmi").removeClass("is-invalid");
                } else {
                    $("#bmi").addClass("is-invalid");
                    e.preventDefault();
                    state = false;
                }


                if (bloodgroup != "" && bloodgroup !== undefined) {
                    $("#bloodgroup").removeClass("is-invalid");
                } else {
                    $("#bloodgroup").addClass("is-invalid");
                    e.preventDefault();
                    state = false;
                }


                if (bpm != "" && bpm !== undefined) {
                    $("#bpm").removeClass("is-invalid");
                } else {
                    $("#bpm").addClass("is-invalid");
                    e.preventDefault();
                    state = false;
                }


                if (breathminute != "" && breathminute !== undefined) {
                    $("#breathminute").removeClass("is-invalid");
                } else {
                    $("#breathminute").addClass("is-invalid");
                    e.preventDefault();
                    state = false;
                }

                if (state === true) 
                {
                    e.preventDefault();

                   

                    $.ajax({
                        type: "POST",
                        url: 'saveform.php',
                        data: $(this).serialize(),
                        success: function(response) {
                            console.log(response)
                        },
                        error: function(data){
                            console.log(data)
                        }
                    });
                }

            })

            function alerter(data)
            {

                $(".result").text(data);
                    $("input[name='result']").val(data);
                    $('.toast').toast('show');
                    $('.resulttoast').show();
            }

            $("input,textarea,select").on("keydown change", function() {
                $(this).removeClass("is-invalid")
            })

            $("#reset").on("click", function() {
                $("input,textarea,select,radio,.period,.pregnant,.excesshair,.weightgain,.thinhair,.skinacne,.foodregular,.excerciseregular,.havebp").removeClass("is-invalid")
            })

        })
    </script>
</body>

</html>