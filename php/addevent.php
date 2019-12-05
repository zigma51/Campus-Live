<?php
    $event_name = $_POST["event_name"];
    $event_type = $_POST["event_type"];
    $event_org = $_POST["event_org"];
    $event_venue = $_POST["event_venue"];
    $event_desc = $_POST["event_desc"];
    $event_image = $_FILES["event_image"]["name"];
    $event_date = $_POST["event_date"];

    // echo "<pre>".$_FILES["event_image"]."</pre>";

    $date = date("Y-m-d");

    $image_dir = "../images/".$event_name."_".$_FILES["event_image"]["name"];

    move_uploaded_file($_FILES["event_image"]["tmp_name"], $image_dir);

    //setting database info;
    $server_name = "localhost";
    $server_user = "id11302812_root";
    $server_password = "superuser";

    //add databasae name here;
    $database_name = "id11302812_campuslive";

    $conn = mysqli_connect($server_name, $server_user, $server_password, $database_name);

    $query = "INSERT INTO events VALUES(5,'$event_name', '$event_type', '$event_org', '$event_venue', '$event_desc', '$image_dir', STR_TO_DATE('$event_date','%Y-%m-%d'),STR_TO_DATE('$date','%Y-%m-%d') )";

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script type='text/javascript'>";
        echo "if(true){location.href='events.php';}</script>";
    }
    // else {
    //     echo "Failed to Add Event<br>".mysqli_error($conn);
    // }

    mysqli_close($conn);
?>