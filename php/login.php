<?php

    // echo $_COOKIE["user"];
    $black_list_words = array("' or 1=1--",
    "or 1=1--",
    "' or 'a'='a'",
    "') or ('a'='a",
    ') or ("a"="a"',
    "1'or'1'='1",
    "DROP sampletable;#",
    "'admin'--'",
    "32302",
    "DROP members--",
    "SELECT IF(1=1,'true','false')",
    "' UNION SELECT 1, 'anotheruser', 'doesnt matter', 1--",
    "admin' --",
    "admin' #",
    "admin'/*",
    "' or 1=1--",
    "' or 1=1#",
    "' or 1=1/*",
    "') or '1'='1--",
    "') or ('1'='1--",
    "....",
    " HAVING 1=1 --",
    "' GROUP BY table.columnfromerror1 HAVING 1=1 --",
    "' GROUP BY table.columnfromerror1, columnfromerror2 HAVING 1=1 --",
    "' GROUP BY table.columnfromerror1, columnfromerror2, columnfromerror(n) HAVING 1=1 --",
    "union",
    "'; insert into users values( 1, 'hax0r', 'coolpass', 9 )/*",
    "WAITFOR DELAY '0:0:10'--");

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

    //getting input from post;
    $user_name = $_POST["username"];
    $password = $_POST["password"];

    //blacklisting user input;
    if (in_array($user_name, $black_list_words)) {
        echo "<script type='text/javascript'>";
        echo "var r = confirm('Invalid username entry!')";
        echo "if (true) { location.href='../index.html' } </script>";
        // header("location:../index.html");
    }
    if (in_array($password, $black_list_words)) {
        echo "<script type='text/javascript'>";
        echo "var r = confirm('Invalid password entry!')";
        echo "if (true) { location.href='../index.html' } </script>";
        // header("location:../index.html");
    }

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

    $user_name = check_input($user_name);
    // echo "<br>".$user_name;

    $password = check_input($password);
    $password = hash('md5', $password);

    //creating query;
    $query = "SELECT password FROM users WHERE username='$user_name'";
    // echo "<br>".$query;

    //getting result;
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result)==0) {
        echo "<script type='text/javascript'>";
        echo "var r = confirm('Invalid Username or password entry!');";
        echo "if(true){location.href='../index.html';}</script>";
        // echo "Invalid username or password";
    }

    while ($row = mysqli_fetch_assoc($result)) {
        if(strcmp($password, $row["password"]) == 0 ){
            setcookie("user", $user_name, (time()+3600), "/");
            echo "<script type='text/javascript'>if(true){location.href='events.php';}</script>";
        } else {
            echo "<script type='text/javascript'>";
            echo "var r = confirm('Wrong password entry!');";
            echo "if(true){location.href='../index.html';}</script>";
        }
    }
    mysqli_close($conn);

?>