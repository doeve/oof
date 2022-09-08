<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
<script>
    var rem_book = 0;
    var admin_open = 0;
    function show_admin(id) {
        rem_book = 0;
        var label = document.getElementById(id);
        var window = document.getElementById("options_window");
        if (admin_open == 0) {
            admin_open = 1;
            window.style.left = "0px";
            label.style.left = "380px";
        } else if (admin_open == 1) {
            document.getElementById("remAuthor").style.display = "none";
            document.getElementById("addAuthor").style.display = "none";
            admin_open = 0;
            window.style.left = "-350px";
            label.style.left = "30px";
        }
    }
</script>
<div id="options_window">
    <table style="vertical-align: middle; display: table-cell;">
        <tr>
            <th style="width: 30%;">
                <nav id="nav_bar">
                    <ul class="nav_item extrude" id="add_b" onclick="navigation('add_b')">
                        Add Book
                    </ul>
                    <ul class="nav_item extrude" id="remove_b" onclick="navigation('remove_b')">
                        Remove Book
                    </ul>
                    <ul class="nav_item extrude" id="remove_a" onclick="navigation('remove_a')">
                        Remove Auth.
                    </ul>
                </nav>
            </th>
            <th style="height: 300px; overflow: hidden; position: relative;">
                <div id="options_interface">
                    <table style="width: 100%;">
                        <tr>
                            <form style="margin: 0px;">
                                <th style="height: 300px; padding: 5px;">
                                    <div class="option_interface">
                                        <div style="position: relative;">
                                                <div id="add_book">
                                                    <div class="book_container">
                                                        <div class="book_desc" style="transform: translate(0px, -100%);">
                                                            Full incontinence of feces
                                                        </div>
                                                        <div class="book_cover" style="background-color: rgb(120, 120, 120); transform: translate(0px, -130%);">
                                                            <div style="margin: 5px; box-sizing: border-box;">
                                                                <input id="add_b_title" class = "add_book_input" style="width: 100%;" placeholder="Title" onchange="console.log('alma')">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="book_info" style="background-color: white;">
                                                        <div style="padding: 5px; box-sizing: border-box;">
                                                            <b>
                                                                <input id="add_b_auth" class = "add_book_input" style="width: 100%;" placeholder="Author" onkeyup="showAuth(this.value, 'addAuthor')">
                                                            </b>
                                                            <br>
                                                                <input id="add_b_gen" class = "add_book_input" style="width: 100%;" placeholder="Genre">
                                                            <br>
                                                                <input type="number" id="add_b_year" class = "add_book_input" style="width: 100%;" placeholder="Year">
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div id="add_b_next" class="extrude" onclick="add_desc()">
                                        <img src="assets/right_icon.png" id="right_icon">
                                    </div>
                                </th>
                                <th style="height: 300px; padding: 5px;">
                                    <div class="option_interface" style="margin-left: 30px;">
                                        <div style="position: relative">
                                            <textarea  class="add_book_input" id="add_desc" rows = "5" cols = "60" name = "description" placeholder="Enter Description"></textarea>
                                            <div id="output_desc" style="height: 20px; width: 100%"/>
                                        </div>
                                    </div>
                                </th>
                            </form>
                        </tr>
                        <tr>
                            <th style="height: 300px; padding: 5px;">
                                <div id="remBookResponse" style="height: 30px; width: 100%;"></div>
                                <div class="option_interface">
                                    Select Books to remove
                                </div>
                                <div id="rmBooks_label" class="extrude button_label" onclick="rem_books(sel_books)">
                                    <img src="assets/trash.png" class="icon">
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <th style="height: 300px; padding: 5px;">
                                <div id="remAuthResponse" style="height: 30px; width: 100%;"></div>
                                <div class="option_interface">
                                    Select Authors to remove
                                    <input id="rem_b_auth" class = "add_book_input" style="width: 100%;" placeholder="Author" onkeyup="showAuth(this.value, 'remAuthor')">
                                </div>
                                <div id="rmAuth_label" class="extrude button_label" onclick="remAuth()">
                                    <img src="assets/checkmark.png" class="icon">
                                </div>
                            </th>
                        </tr>
<!--                        <tr>-->
<!--                            <th style="height: 300px; padding: 5px;">-->
<!--                                <div class="option_interface">-->
<!--                                </div>-->
<!--                            </th>-->
<!--                        </tr>-->
                    </table>
                </div>
            </th>
        </tr>
    </table>
</div>
<script>
    var book_added = 0;
    var desc_add = 0;
    var button = document.getElementById("add_b");
    var interface = document.getElementById("options_interface");
    interface.style.transform = "translate(0, -150px)";
    button.style.backgroundColor = "#2CB6E8";
    function navigation(id) {
        if (button != null) {
            button.style.backgroundColor = "#2596be";
        }
        button = document.getElementById(id);
        button.style.backgroundColor = "#2CB6E8";
        switch (id) {
            case "add_b":
                rem_book = 0;
                // console.log("?");
                document.getElementById("remAuthor").style.display = "none";
                desc_add = 0;
                interface.style.transform = "translate(0, -150px)";
                break;
            case "remove_b":
                rem_book = 1;
                document.getElementById("remAuthor").style.display = "none";
                document.getElementById("addAuthor").style.display = "none";
                interface.style.transform = "translate(0, -450px)";
                break;
            case "remove_a":
                rem_book = 0;
                document.getElementById("addAuthor").style.display = "none";
                interface.style.transform = "translate(0, -750px)";
                break;
        }
    }

    async function fade_out(el)
    {
        while(el.style.backgroundColor!="#FFFFFF")
        {
            el.style.backgroundColor = el.style.backgroundColor + 1
        }
    }

    function add_desc() {
        var title = document.getElementById("add_b_title")
        var author = document.getElementById("add_b_auth")
        var genre = document.getElementById("add_b_gen")
        var year = document.getElementById("add_b_year")
        var icon = document.getElementById("right_icon")
        var desc = document.getElementById("add_desc")
        var button = document.getElementById("add_b_next")
        var emp = false
        // title.style.animation = "";
        // author.style.animation = "";
        // genre.style.animation = "";
        // year.style.animation = "";
        if (desc_add == 0) {
            if (title.value == "") {
                emp = true
                // title.style.animation = "fadeIn 2s";
                title.style.animation = 'none';
                title.offsetHeight; /* trigger reflow */
                title.style.animation = null;
            }
            if (author.value == "") {
                emp = true
                author.style.animation = 'none';
                author.offsetHeight; /* trigger reflow */
                author.style.animation = null;
            }
            if (genre.value == "") {
                emp = true
                genre.style.animation = 'none';
                genre.offsetHeight; /* trigger reflow */
                genre.style.animation = null;
            }
            if (year.value == "") {
                emp = true
                year.style.animation = 'none';
                year.offsetHeight; /* trigger reflow */
                year.style.animation = null;
            }
        } else if (desc_add == 1) {
            if (desc.value == "") {
                console.log("lmao")
                emp = true
                desc.style.animation = 'none';
                desc.offsetHeight;
                desc.style.animation = null;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("output_desc").innerHTML = this.responseText;
                    }
                };
                console.log(title.value + " " + author.value + " " + genre.value + " " + year.value + " " + desc.value)
                xmlhttp.open("GET", "query/addBook.php?t=" + title.value + "&a=" + author.value + "&g=" + genre.value + "&y=" + year.value + "&d=" + desc.value, true);
                xmlhttp.send();
            }
        }
        var interface = document.getElementById("options_interface");
        // if (desc_add == 1 && book_added == 0) {
        //     book_added = 1;
        // }
        if (desc_add == 0 && emp == false) {
            document.getElementById("output_desc").innerHTML = "";
            button.style.backgroundColor = "#70EE9C";
            button.style.width = "40px";
            button.style.right = "-20px";
            // button.style.transform = "translate(30px, 0px)"
            desc_add = 1;
            icon.style.marginLeft = "15px";
            interface.style.transform = "translate(-238px, -150px)";
            console.log("whatthfeuck");
        } else if (desc_add == 1) {
            desc_add = 2;
        } else if (desc_add == 2 && emp == false){
            desc_add = 0;
            button.style.backgroundColor = "rgba(255,255,255,0.5)";
            icon.style.marginLeft = "-5px";
            button.style.width = "25px";
            button.style.right = "-10px";
            interface.style.transform = "translate(0px, -150px)"
        }
    }

    function showAuth(str, id) {
        var authCol = document.getElementById(id);
        if (str == "") {
            authCol.style.display = "none";
            return
        } else {
            // console.log("nah")
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    authCol.style.display = "block";
                    authCol.innerHTML = this.responseText;
                }
            };
            if (id == "addAuthor") {
                xmlhttp.open("GET", "query/getAuth.php?q=" + str + "&op=add", true)
            } else if (id == "remAuthor") {
                xmlhttp.open("GET", "query/getAuth.php?q=" + str + "&op=rem",  true)
            }
            xmlhttp.send();
        }
    }

    function setAuth(auth, op) {
        // console.log("set " + auth);
        if (op == "add") {
            var authCol = document.getElementById("addAuthor");
            var authInp = document.getElementById("add_b_auth");
        } else if (op == "rem") {
            var authCol = document.getElementById("remAuthor");
            var authInp = document.getElementById("rem_b_auth");
        }
        authCol.style.display = "none";
        authInp.value = auth;
    }

    function remAuth() {
        var auth = document.getElementById("rem_b_auth").value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("remAuthResponse").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "query/remAuth.php?a=" + auth, true)
        xmlhttp.send();
    }

    function addAuth(auth) {
        var authCol = document.getElementById("addAuthLabel");
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                authCol.innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "query/addAuth.php?a=" + auth, true)
        xmlhttp.send();
    }

    function rem_books(sel_books) {
        if (sel_books.length == 0) {
            alert("you need to select at least one book!")
        } else {
            console.log(sel_books);
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("remBookResponse").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "query/remBook.php?q=" + sel_books , true)
            xmlhttp.send();
        }
    }
</script>
<div id="adminBox_label" class="extrude" onclick="show_admin('adminBox_label')">
    <img src="assets/options_icon.png" class="icon">
</div>
<div class="authorQuery" id="addAuthor">
</div>
<div class="authorQuery" id="remAuthor">
</div>
<div id="main_container">
    <div id="cover_container">
        <img src="assets/notebook.jpg" id="image"/>
        <div>
            <font id="general">genaseral</font>
            <font id="bookshop">bookafschop.com</font>
        </div>
    </div>
    <hr style="transform: translate(-50%, 10px);">
    <div id="command_container">
        <div id="command_tools">
            <form style="margin: 0px; display: inline-block;" role="presentation">
                <input id="search_bar" name="s" class="extrude" placeholder="go nuts" style="height: 25px" value="<?php echo $_GET["s"] ?>">
                <button type="submit" id="search_button" class="extrude">
                    <img src="assets/search_icon.png" id="search_image">
                </button>
            </form>
            <script>
                var filter_open = 0;
                function filter_expand(id) {
                    if (filter_open == 0) {
                        filter_open = 1;
                        document.getElementById(id).style.width = "410px";
                        document.getElementById("search_filter").style.borderRadius = "7px 0px 0px 7px";
                        document.getElementById("filter_properties").style.paddingLeft = "72px";
                        document.getElementById("filters").style.display = "block";
                        document.getElementById("filters").style.opacity = "1";
                    } else if (filter_open == 1) {
                        filter_open = 0;
                        document.getElementById(id).style.width = "0px";
                        document.getElementById("search_filter").style.borderRadius = "7px";
                        document.getElementById("filter_properties").style.paddingLeft = "67px";
                        document.getElementById("filters").style.opacity = "0";
                        document.getElementById("filters").style.display = "none";
                        var year_l = document.getElementById("year_l").value;
                        var year_h = document.getElementById("year_h").value;
                        var genre = document.getElementById("genre_s").value;
                        var search = document.getElementById("search_bar").value;
                        if (year_l != "" && year_h != "") {
                            var year = year_l + "-" + year_h;
                            console.log(year);
                        } else {
                            var year = "";
                        }
                        if (year_l != "<?php echo explode("-", $_GET["d"])[0]; ?>" || year_h != "<?php echo explode("-", $_GET["d"])[1]; ?>" || genre != "<?echo $_GET["g"]?>") {
                            window.location = "?s=" + search + "&d=" + year + "&g=" + genre + "&p=1";
                        }
                    }
                }
            </script>
            <div id="filter_container" class="extrude">
                <button id="search_filter" onclick="filter_expand('filter_properties')">
                    Filter
                </button>
                <div id="filter_properties">
                    <div id="filters">
                        date:
                        <input id="year_l" class="year_int" maxlength="4" value="<?php echo explode("-", $_GET["d"])[0]; ?>">
                        -
                        <input id="year_h" class="year_int" maxlength="4" value="<?php echo explode("-", $_GET["d"])[1] ?>">
                        genre:
                        <input id="genre_s" value="<?echo $_GET["g"]?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr style="transform: translate(-50%, -10px);">
    <!--admin box-->
    <div style="margin: auto; height:200px; width:100%; background-color: rgb(36, 171, 171); padding: 30px; box-sizing: border-box; overflow-y: scroll;">
        <b>
            <?php
            class Book {
                public $title;
                public $author;
                public $desc;
                public $year;
                public $genre;
                public $id;
                function __construct($title, $author, $desc, $year, $genre, $id){
                    $this->title = $title;
                    $this->author = $author;
                    $this->desc = $desc;
                    $this->year = $year;
                    $this->genre = $genre;
                    $this->id = $id;
                }
                function get_title() {
                    return $this->title;
                }
                function get_author() {
                    return $this->author;
                }
                function get_desc() {
                    return $this->desc;
                }
                function get_year() {
                    return $this->year;
                }
                function get_genre() {
                    return $this->genre;
                }
                function get_id() {
                    return $this->id;
                }
            }

            $server = "localhost";
            $username = "banaterra";
            $password = "SCtXEzGN";
            $db = "banaterra";
            $conn = new mysqli($localhost, $username, $password, $db);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            echo "Connected successfully <br>";
            if ($_GET["p"] == "") {
                $page = "1";
            } else {
                $page = $_GET["p"];
            }
            $l_lim = $page * 24 - 24;
            $h_lim = 24;
            $sql = "select B.* from books B";
            if ($_GET["s"] != "" or $_GET["d"] != "" or $_GET["g"] != "") {
                $sql .= " where ";
            }
            if ($_GET["s"] != "") {
                $search = $_GET["s"];
                $sql .= "(B.title like '%". $search ."%' or B.writer in (select A.id from authors A where A.name like '%" . $search . "%'))";
                if ($_GET["d"] != "" or $_GET["g"]) {
                    $sql .= " and ";
                }
            }
            if ($_GET["d"] != "") {
                $date_l = explode("-", $_GET["d"])[0];
                $date_h = explode("-", $_GET["d"])[1];
                $sql .= "(B.year >= " . $date_l . " and B.year <= " . $date_h . ")";
                if ($_GET["g"] != "") {
                    $sql .= " and ";
                }
            }
            if ($_GET["g"] != "") {
                $genre = $_GET["g"];
                $sql .= "(B.genre like '%" . $genre . "%')";
            }
            $all_sql = $sql;
            $sql .= " limit " . $l_lim . ", " . $h_lim;
            echo $sql ."<br>";
            $conn->query("set names 'utf8'");
            $result = $conn->query($sql);
            $all_res = $conn->query($all_sql);
            // if ($result->num_rows > 0) {
            //     // output data of each row
            //     while($row = $result->fetch_assoc()) {
            //         echo "id: " . $row["id"]. " - Name: " . $row["title"]. "<br>";
            //     }
            //     } else {
            //         echo "0 results";
            // }
            $books = array();
            $nr = $result->num_rows;
            $all_nr = $all_res->num_rows;
            echo $all_nr . " results";
            ?>
        </b>
    </div>
    <!--admin box-->
    <script>
        var book_open = 0;
        let sel_books = []
        function book_clicked(id) {
            var product = document.getElementById("product_" + id);
            var book = document.getElementById("product_book_" + id);
            var desc = document.getElementById("product_desc_" + id);
            var info = document.getElementById("product_info_" + id);
            if (rem_book == 0) {
                if (book_open == 0) {
                    book_open = 1;
                    book.style.transform = "translate(0px, 0px)";
                    desc.style.transform = "translate(0px, 0px)";
                    info.style.backgroundColor = "rgb(220, 220, 220)";
                } else if (book_open == 1) {
                    book_open = 0;
                    book.style.transform = "translate(0px, -130%)";
                    desc.style.transform = "translate(0px, -100%)";
                    info.style.backgroundColor = "white";
                }
            } else {
                if (product.style.boxShadow == "") {
                    product.style.boxShadow = "0px 0px 15px 5px #FF4747";
                    sel_books.push(id);
                } else {
                    product.style.boxShadow = "";
                    sel_books = sel_books.filter(idn => idn != id);
                }
            }
        }
    </script>
    <div id="products">
        <table id="product_table">
            <?php
            $n = 0;
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    if ($n % 4 == 0) {
                        echo "<tr>";
                    }
                    $author_r = $conn->query("select name from authors where id=" . $row["writer"] . "");
                    $author = $author_r->fetch_assoc();
                    $books[$n] = new Book($row["title"], $author["name"], $row["descr"], $row["year"], $row["genre"], $row["id"]);
                    mt_srand($row["id"]);
                    echo
                        "<td>
                                                <div style='position: relative;'>
                                                    <div class='product_cell extrude' id='product_".  $books[$n]->get_id() ."' onclick=book_clicked(" .  $books[$n]->get_id() . ")>
                                                        <div class='book_container'>
                                                            <div class='book_desc' id='product_desc_" .  $books[$n]->get_id() . "'>
                                                                " . $books[$n]->get_desc() . "
                                                            </div>
                                                            <div class='book_cover' id='product_book_" . $books[$n]->get_id() . "' style=' background-color: #". str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT) .";' title='" . str_replace("'","`", $books[$n]->get_title()) . "'>
                                                                <div style='margin: 5px; box-sizing: border-box;'>
                                                                    <b>
                                                                        <p style='color: white; text-shadow: 2px 2px 5px #888888;'>
                                                                            " . $books[$n]->get_title() . "
                                                                        </p>
                                                                    </b>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class='book_info' id='product_info_" .  $books[$n]->get_id() . "'>
                                                            <div style='padding: 5px; box-sizing: border-box;'>
                                                                <b>
                                                                    ". $books[$n]->get_author() ."
                                                                </b>
                                                                <br>
                                                                    " . $books[$n]->get_genre() . "
                                                                <br>
                                                                    " . $books[$n]->get_year() . "
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>";

                    if ($n % 4 == 3) {
                        echo "</tr>";
                    }
                    $n += 1;
                }
            }
            ?>
        </table>
    </div>
    <div id="pages_container">
        <div id="pages">
            <b>
                <?php
                if ($page != 1) {
                    echo
                        "<a href='?s=" . $search . "&d=" . $_GET["d"] . "&g=" . $_GET["g"] . "&p=" . ($page - 1) . "'>
                                        <
                                    </a>";
                } else {
                    echo "< ";
                }
                echo $page;
                if ($page * 24 < $all_nr) {
                    echo
                        "<a href='?s=" . $search . "&d=" . $_GET["d"] . "&g=" . $_GET["g"] . "&p=" . ($page +1) . "'>
                                        >
                                    </a>";
                } else {
                    echo " >";
                }
                ?>
            </b>
        </div>
    </div>
</div>
</body>
</html>