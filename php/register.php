<?php
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
    // if (mysqli_connect_errno()) {
    //     echo "Failed to connect to MySQL: " . mysqli_connect_error();
    // }

    //getting input from post;
    $username = $_POST["username"];
    $password = $_POST["password"];
    $dob = $_POST["dob"];
    $email = $_POST["email"];
    $contact = $_POST["phone"];

    function check_input($value) {
        global $conn;

        // Stripslashes
        if (get_magic_quotes_gpc()) {
            $value = stripslashes($value);
        }
        // Quote if not a number
        if (!is_numeric($value)) {
            $value = mysqli_real_escape_string($conn, $value);
        }
        return $value;
    }

    $username = check_input($username);
    $password = check_input($password);
    $dob = check_input($dob);
    $email = check_input($email);
    $contact = check_input($contact);
    $password = check_input($password);
    $password = hash('md5',$password);
    $user_id  = hash('md5',$username.time());

    //creating query;
    $query = "INSERT INTO users VALUES('$user_id', '$username', '$password', '$email', STR_TO_DATE('$dob','%Y-%m-%d'), '$contact')";

    //getting result;
    $result = mysqli_query($conn, $query);
    if ( false===$result ) {
        // printf("error: %s\n", mysqli_error($conn));
    } else {
        setcookie("user", $username, (time()+3600), "/");
        header("location:events.php");
    }

    mysqli_close($conn);
?>