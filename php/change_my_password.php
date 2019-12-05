<?php

    // add your code here
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $conf_password = $_POST['confpassword'];
    
    if(strcmp($password,$conf_password) != 0){
    echo "<script type=text/javascript>";
    echo "var r = confirm('Passwords do not match');";
    echo "if(true){location.href='../index.html#forgotpassword'};</script>";
    }
    
    //setting database info;
    $server_name = "localhost";
    $server_user = "id11302812_root";
    $server_password = "superuser";
    
    //add databasae name here;
    $database_name = "id11302812_campuslive"; 
    
    //add tabblename here;
    $table_name = 'users';
    
    //connection object;
    $conn = mysqli_connect($server_name, $server_user, $server_password, $database_name);
    
    $query = "SELECT contact from users WHERE username = '$username'";
    
    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) == 0){
        echo "<script type=text/javascript>";
        echo "var r = confirm('Username Not found please fill again');";
        echo "if(true){location.href='../index.html#forgotpassword'};</script>";
    }
    
    while ($row = mysqli_fetch_assoc($result)) {
        if(strcmp($phone, $row["contact"]) != 0 ){
            echo "<script type=text/javascript>";
            echo "var r = confirm('Contact does not match with registered contact number!');";
            echo "if(true){location.href='../index.html#forgotpassword'};</script>";
        } else {
            $password = hash('md5', $password);
    
            $query = "UPDATE users SET password ='$password' WHERE username = '$username'";
        
            $result = mysqli_query($conn, $query);
        
            if(!$result){
                echo "<script type=text/javascript>";
                echo "var r = confirm('Internal Error Occured');";
                echo "if(true){location.href='../index.html#forgotpassword'};</script>";
            } else {
                echo "<script type=text/javascript>";
                echo "var r = confirm('Password Updated. Login with new password');";
                echo "if(true){location.href='../index.html#login'};</script>";
            }
        }
    }
?>