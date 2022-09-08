<?php
    $username = "banaterra";
    $password = "SCtXEzGN";
    $db = "banaterra";
    $conn = new mysqli($localhost, $username, $password, $db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $title = $_REQUEST["t"];
    $auth_n = $_REQUEST["a"];
    $genre = $_REQUEST["g"];
    $year = $_REQUEST["y"];
    $desc = $_REQUEST["d"];
    $conn->query("set names 'utf8'");
    $sql = "select id from authors where name ='" . $auth_n . "'";
    $resultId = $conn->query($sql);
    $row = $resultId->fetch_assoc();
    $authId = $row["id"];
    $sql = "insert into books (title, writer, year, genre, descr) values ('" . $title. "' , " . $authId . ", " . $year. " , '" .$genre. "' , '" . $desc . "');";
    echo "Book Added!";
    $conn->query($sql);
?>