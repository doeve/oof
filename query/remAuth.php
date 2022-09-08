<?php
    $a = $_REQUEST["a"];
    $books = explode(",", $a);
    $username = "banaterra";
    $password = "SCtXEzGN";
    $db = "banaterra";
    $conn = new mysqli($localhost, $username, $password, $db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "select B.* from books B where B.writer in (select A.id from authors A where A.name like '%" . $a . "%')";
    $conn->query("set names 'utf8'");
    $result = $conn->query($sql);
    $nr = $result->num_rows;
    if ($nr != 0) {
        echo "There are still ".$nr." books!";
    } else {
        $sql = "delete from authors where name = '".$a."'";
        $result = $conn->query($sql);
        $nr = $result->num_rows;
        if ($nr != 0) {
            echo "Author removed!";
        } else {
            echo "No such Author!";
        }
    }
?>