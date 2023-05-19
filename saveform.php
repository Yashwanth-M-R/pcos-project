<?php

session_start();

require "config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
        $state = true;

        $period = mysqli_real_escape_string($link, trim($_POST['period']));
        $pregnant = mysqli_real_escape_string($link, trim($_POST['pregnant']));
        $excesshair = mysqli_real_escape_string($link, trim($_POST['excesshair']));
        $weightgain = mysqli_real_escape_string($link, trim($_POST['weightgain']));
        $thinhair = mysqli_real_escape_string($link, trim($_POST['thinhair']));
        $skinacne = mysqli_real_escape_string($link, trim($_POST['skinacne']));
        $foodregular = mysqli_real_escape_string($link, trim($_POST['foodregular']));
        $excerciseregular = mysqli_real_escape_string($link, trim($_POST['excerciseregular']));
        $havebp = mysqli_real_escape_string($link, trim($_POST['havebp']));
        $age = mysqli_real_escape_string($link, trim($_POST['age']));
        $weight = mysqli_real_escape_string($link, trim($_POST['weight']));
        $height = mysqli_real_escape_string($link, trim($_POST['height']));
        $bmi = mysqli_real_escape_string($link, trim($_POST['bmi']));
        $bloodgroup = mysqli_real_escape_string($link, trim($_POST['bloodgroup']));
        $bpm = mysqli_real_escape_string($link, trim($_POST['bpm']));
        $breathminute = mysqli_real_escape_string($link, trim($_POST['breathminute']));
        
        $stat = shell_exec('/opt/lampp/htdocs/api/process.py');
        $result = $stat;

        $user = mysqli_real_escape_string($link, trim($_SESSION['user']));
        $username = mysqli_real_escape_string($link, trim($_SESSION['username']));

        $uid = "uid_".substr(bin2hex(random_bytes(10)),0, 10);
        

        
        date_default_timezone_set("Asia/Calcutta");
        $date = date("d/m/Y h:i:s A");

            $query = "insert into pcos_2023_form (uid,user,username,period,pregnant,excesshair,weightgain,thinhair,skinacne,foodregular,excerciseregular,havebp,age,weight,height,bmi,bloodgroup,bpm,breathminute,status) values ('$uid','$user','$username','$period','$pregnant','$excesshair','$weightgain','$thinhair','$skinacne','$foodregular','$excerciseregular','$havebp','$age','$weight','$height','$bmi','$bloodgroup','$bpm','$breathminute','$result')";

           if(mysqli_query($link, $query))
           {
             echo json_encode("query success");
           }
           else
           {
            echo json_encode("query failure");
           }

    mysqli_close($link);
}
else
{
    echo json_encode("post failure");
} 
