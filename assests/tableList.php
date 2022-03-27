<?php
    $connection = mysqli_connect("localhost", "root", "" , "sketch_art_hub") or die("Unsuccessfull connection");

    $query = "SELECT * FROM user_query";

    $result = mysqli_query($connection, $query);
    echo $result;

    $row = fetch_assoc_array($result);

    $count = mysqli_num_rows($result);

    if($count == 0){
        echo "No";
    }
?>