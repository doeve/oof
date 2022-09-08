<?php
    $username = "banaterra";
    $password = "SCtXEzGN";
    $db = "banaterra";
    $conn = new mysqli($localhost, $username, $password, $db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $auth = $_REQUEST["a"];
    $sql = "insert into authors (name) values ('" . $auth . "')";
    $conn->query($sql);
    echo "Author Added!";
?>