<?php
    session_start();

    $user_id = $_SESSION["user_id"];
    $connection = mysqli_connect("localhost", "root", "", "sketch_art_hub" ) or die("Unsuccessfull connection!!");
    if(isset($_POST["url"])){
        $sendURL = $_POST["url"];
        echo $sendURL;
        $query = "INSERT INTO url(send_url, user_id) VALUES('$sendURL', '$user_id')";
        if(mysqli_query($connection, $query)){
            echo '<script>alert("Record added succesfully!!!")</script>';
        }
        else{
            echo '<script>alert("Record adding failed!!!")</script>';
        }
    }
    echo "<script>alert('Hello')</script>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Hello World </h1>
</body>
</html>