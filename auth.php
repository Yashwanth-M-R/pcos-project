<?php
 
require "config/database.php";
 
session_start(); 
 
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{  
        $email = mysqli_real_escape_string($link, trim($_POST['email']));
        $password = mysqli_real_escape_string($link, trim($_POST['password']));

        $query = "select * from pcos_2023_user where email = '$email' and password = '$password'";

        $result = mysqli_query($link,$query);

        $row = mysqli_fetch_array($result);

       if (!empty($row["email"]) && !empty($row["password"])) 
        {
            $_SESSION["user"] = $row["email"];
            $_SESSION["username"] = $row["name"];
            $_SESSION["userage"] = $row["age"];
            $_SESSION["usergender"] = $row["gender"];
            echo "<script> location.replace('http://intrella.in/pcos/dashboard.php') </script>";
        } 
        else 
        {
            $_SESSION["fail"] = "yes";
            echo "<script> location.replace('index.php') </script>";
        } 
 
    mysqli_close($link);
}
else 
{
    echo "<script> location.replace('index.php') </script>";
}
