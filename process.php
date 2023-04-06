<?php
    $conn = new mysqli("localhost","root","","prokash");
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM user_details WHERE user_name='$username' AND password='$password'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    if ($row['user_name']=="$username" && $row['password']==$password) {
        echo "Welcome " .$username." You are successfully logged in!"; 
    }else{
        echo "<script>alert('Check your Credentials')</script>";
        echo "<script>location.replace('login.php')</script>";
    }
?>