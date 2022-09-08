<?php
    $q = $_REQUEST["q"];
    $op = $_REQUEST["op"];
    $func = "";
    if ($op == "add") {
        $func = "setAuth('";
    } else if ($op == "rem") {
        $func = "remAuth('";
    }
    $username = "banaterra";
    $password = "SCtXEzGN";
    $db = "banaterra";
    $conn = new mysqli($localhost, $username, $password, $db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "select name from authors where name like '%" . $q . "%'";
//    echo $sql;
    $conn->query("set names 'utf8'");
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
//            echo "<div class='indAuth' onclick=\"" . $func . $row["name"] ."')\"><span>".$row["name"]."</span></div>";
            echo "<div class='indAuth' onclick=\"setAuth('" . $row["name"] ."', '" . $op . "')\"><span>".$row["name"]."</span></div>";

        }
    } else {
        if ($op == "add") {
            echo "<div class='indAuth' onclick=\"addAuth('". $q ."')\" id = 'addAuthLabel'><span> Add Author </span></div>";
        } else if ($op = "rem") {
            echo "<div class='indAuth' ><span> No Such Author! </span></div>";
        }
    }

// Cre
//    echo "<>lol<br>lol<br>lol<br>lol<br>lol<br>lol<br>lol<br>lol<br>lol<br>lol<br>lol<br>lol<br>lol<br>lol";
?>