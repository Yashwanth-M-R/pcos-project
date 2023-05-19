<?php

require "../config/database.php";

session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

        $state = true;

        $uid = mysqli_real_escape_string($link, trim($_POST['butdel']));

        $query = "delete from pcos_2023_user where uid = '$uid'";

        if (!mysqli_query($link, $query)) 
        {
            $state = false;
        }

        if ($state) 
        {
            $_SESSION["save"] = "yes";
            echo "<script> location.replace('users.php') </script>";
        } 
        else 
        {
            $_SESSION["fail"] = "yes";
            echo "<script> location.replace('users.php') </script>";
        }

    mysqli_close($link);
}
else 
{
    echo "<script> location.replace('users.php') </script>";
}
