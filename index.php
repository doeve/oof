<html>
    <head>
        <link rel="stylesheet" href="assets/styles.css">
    </head>
    <body>
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
                        <input id="search_bar" name="s" class="extrude" placeholder="go nuts">
                        <button type="submit" id="search_button" class="extrude" title="">
                            <img src="assets/search_icon.png" id="search_image">
                        </button>
                    </form>
                    <button id="search_filter" class="extrude">
                        Filter
                    </button>
                </div>
            </div>
            <hr style="transform: translate(-50%, -10px);">
            <!--admin box-->
            <div style="margin: auto; height:200px; width:100%; background-color: rgb(36, 171, 171); padding: 30px; box-sizing: border-box; overflow-y: scroll;">
                <b>
                    <?php
                        $server = "localhost";
                        $username = "banaterra";
                        $password = "SCtXEzGN";
                        $db = "banaterra";
                        $conn = new mysqli($localhost, $username, $password);
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        echo "Connected successfully <br>";
                        if ($_GET["p"] == "") {
                            $page = "1";
                        } else {
                            $page = $_GET["p"];
                        }
                        $l_lim = $page * 30 - 30;
                        $h_lim = 30;
                        $php = "select B.* from books B";
                        if ($_GET["s"] != "" or $_GET["d"] != "" or $_GET["g"] != "") {
                            $php .= " where ";
                        }
                        if ($_GET["s"] != "") {
                            $search = $_GET["s"];
                            $php .= "(B.title like '%". $search ."%' or B.writer in (select A.id from authors A where A.name like '%" . $search . "%'))"; 
                            if ($_GET["d"] != "" or $_GET["g"]) {
                                $php .= " and ";
                            }
                        }
                        if ($_GET["d"] != "") {
                            $date_l = explode("-", $_GET["d"])[0];
                            $date_h = explode("-", $_GET["d"])[1];
                            $php .= "(B.year >= " . $date_l . " and B.year <= " . $date_h . ")";
                            if ($_GET["g"] != "") {
                                $php .= " and ";
                            }
                        }
                        if ($_GET["g"] != "") {
                            $genre = $_GET["g"];
                            $php .= "(B.genre like '%" . $genre . "%')";
                        }
                        $php .= " limit " . $l_lim . ", " . $h_lim;
                        echo $php;
                    ?>
                </b>
            </div>
            <!--admin box-->
            <div id="products">
                <table id="product_table">
                    <tr>
                        <td>
                            <div style="position: relative;">
                                <div class="product_cell extrude">
                                    <div class="book_container">
                                        <div class="book_cover">
                                            alo
                                        </div>
                                    </div>
                                    <div class="book_info">
                                        salut   
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div style="position: relative;">
                                <div class="product_cell extrude">
                                    <div class="book_container">
                                        <div class="book_cover">
                                            alo
                                        </div>
                                    </div>
                                    <div class="book_info">
                                        salut   
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div style="position: relative;">
                                <div class="product_cell extrude">
                                    <div class="book_container">
                                        <div class="book_cover">
                                            alo
                                        </div>
                                    </div>
                                    <div class="book_info">
                                        salut   
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div style="position: relative;">
                                <div class="product_cell extrude">
                                    <div class="book_container">
                                        <div class="book_cover">
                                            alo
                                        </div>
                                    </div>
                                    <div class="book_info">
                                        salut   
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="position: relative;">
                                <div class="product_cell extrude">
                                    <div class="book_container">
                                        <div class="book_cover">
                                            alo
                                        </div>
                                    </div>
                                    <div class="book_info">
                                        salut   
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div style="position: relative;">
                                <div class="product_cell extrude">
                                    <div class="book_container">
                                        <div class="book_cover">
                                            alo
                                        </div>
                                    </div>
                                    <div class="book_info">
                                        salut   
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div style="position: relative;">
                                <div class="product_cell extrude">
                                    <div class="book_container">
                                        <div class="book_cover">
                                            alo
                                        </div>
                                    </div>
                                    <div class="book_info">
                                        salut   
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div style="position: relative;">
                                <div class="product_cell extrude">
                                    <div class="book_container">
                                        <div class="book_cover">
                                            alo
                                        </div>
                                    </div>
                                    <div class="book_info">
                                        salut   
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="position: relative;">
                                <div class="product_cell extrude">
                                    <div class="book_container">
                                        <div class="book_cover">
                                            alo
                                        </div>
                                    </div>
                                    <div class="book_info">
                                        salut   
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div style="position: relative;">
                                <div class="product_cell extrude">
                                    <div class="book_container">
                                        <div class="book_cover">
                                            alo
                                        </div>
                                    </div>
                                    <div class="book_info">
                                        salut   
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div style="position: relative;">
                                <div class="product_cell extrude">
                                    <div class="book_container">
                                        <div class="book_cover">
                                            alo
                                        </div>
                                    </div>
                                    <div class="book_info">
                                        salut   
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div style="position: relative;">
                                <div class="product_cell extrude">
                                    <div class="book_container">
                                        <div class="book_cover">
                                            alo
                                        </div>
                                    </div>
                                    <div class="book_info">
                                        salut   
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="position: relative;">
                                <div class="product_cell extrude">
                                    <div class="book_container">
                                        <div class="book_cover">
                                            alo
                                        </div>
                                    </div>
                                    <div class="book_info">
                                        salut   
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div style="position: relative;">
                                <div class="product_cell extrude">
                                    <div class="book_container">
                                        <div class="book_cover">
                                            alo
                                        </div>
                                    </div>
                                    <div class="book_info">
                                        salut   
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div style="position: relative;">
                                <div class="product_cell extrude">
                                    <div class="book_container">
                                        <div class="book_cover">
                                            alo
                                        </div>
                                    </div>
                                    <div class="book_info">
                                        salut   
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div style="position: relative;">
                                <div class="product_cell extrude">
                                    <div class="book_container">
                                        <div class="book_cover">
                                            alo
                                        </div>
                                    </div>
                                    <div class="book_info">
                                        salut   
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>