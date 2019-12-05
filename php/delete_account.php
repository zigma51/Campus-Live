<?php

    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = hash('md5', $password);
    $email = $_POST['email'];
    $phone = $_POST['phone'];

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

    $query = "SELECT * FROM users WHERE username='$username'";

    $result  = mysqli_query($conn, $query);

    if(mysqli_num_rows($result)==0){
        echo "<script type=text/javascript>";
        echo "var r = confirm('Username not found. Please fill again!');";
        echo "if(true){location.href='../index.html#deleteaccount'};</script>";
    }else{
        while ($row = mysqli_fetch_assoc($result)) {
            if(( strcmp($password, $row["password"]) != 0 ) or
            ( strcmp($email, $row["email"]) != 0 ) or
            ( strcmp($phone, $row["contact"]) != 0 )) {
                echo "<script type=text/javascript>";
                echo "var r = confirm('Invalid details please fill again!');";
                echo "if(true){location.href='../index.html#deleteaccount'};</script>";
            } else {
                
                $query = "DELETE FROM users WHERE username='$username'";

                $result = mysqli_query($conn, $query);

                if($result) {
                    echo "<script type=text/javascript>";
                    echo "var r = confirm('Account Deleted Successfully!');";
                    echo "if(true){location.href='../index.html'};</script>";
                } else {
                    echo "<script type=text/javascript>";
                    echo "var r = confirm('Problem Deleting account. Please try again!');";
                    echo "if(true){location.href='../index.html#deleteaccount'};</script>";
                }
            }
        }
    }

?>