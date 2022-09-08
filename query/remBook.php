<?php
    $q = $_REQUEST["q"];
    $books = explode(",", $q);
    $username = "banaterra";
    $password = "SCtXEzGN";
    $db = "banaterra";
    $conn = new mysqli($localhost, $username, $password, $db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "delete from books where";
    $s = "";
    for ($i = 0; $i < count($books) - 1; $i++) {
        $s .= " id = " . $books[$i] . " or";
    }
    $s .= " id = ". end($books);
    $sql .= $s;
    $conn->query($sql);
    echo "Books are removed!";
?>