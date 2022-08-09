<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" href="assets/styles.css">
    </head>
    <body>
        <script>
            var admin_open = 0;
            function show_admin(id) {
                var label = document.getElementById(id);
                var window = document.getElementById("options_window");
                if (admin_open == 0) {
                    admin_open = 1;
                    window.style.left = "0px";
                    label.style.left = "330px";
                } else if (admin_open == 1) {
                    admin_open = 0;
                    console.log("lamao");
                    window.style.left = "-300px";
                    label.style.left = "30px";
                }
            }
        </script>
        <div id="options_window">
        </div>
        <div id="adminBox_label" class="extrude" onclick="show_admin('adminBox_label')">
            <img src="assets/options_icon.png" id="options_icon">
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
                            public $isbn;
                            function __construct($title, $author, $desc, $year, $genre, $isbn){
                                $this->title = $title;
                                $this->author = $author;
                                $this->desc = $desc;
                                $this->year = $year;
                                $this->genre = $genre;           
                                $this->isbn = $isbn;                      
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
                            function get_isbn() {
                                return $this->isbn;
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
                function book_display(id) {
                    book_container = document.getElementById("product_" + id);
                    book = document.getElementById("product_book_" + id);
                    desc = document.getElementById("product_desc_" + id);
                    info = document.getElementById("product_info_" + id);
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
                                        $books[$n] = new Book($row["title"], $author["name"], $row["descr"], $row["year"], $row["genre"], $row["isbn"]);
                                        mt_srand($row["id"]);
                                        echo 
                                            "<td>
                                                <div style='position: relative;'>
                                                    <div class='product_cell extrude' id='product_". $n ."' onclick=book_display(" . $n . ")>
                                                        <div class='book_container'>
                                                            <div class='book_desc' id='product_desc_" . $n . "'>
                                                                " . $books[$n]->get_desc() . "
                                                            </div>
                                                            <div class='book_cover' id='product_book_" . $n . "' style=' background-color: #". str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT) .";' title='" . str_replace("'","`", $books[$n]->get_title()) . "'>
                                                                <div style='margin: 5px; box-sizing: border-box;'>
                                                                    <b>
                                                                        <p style='color: white; text-shadow: 2px 2px 5px #888888;'>
                                                                            " . $books[$n]->get_title() . "
                                                                        </p>
                                                                    </b>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class='book_info' id='product_info_" . $n . "'>
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
                                    } else {
                                        echo "0 results";
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
                            if ($page * 20 < $all_nr) {
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