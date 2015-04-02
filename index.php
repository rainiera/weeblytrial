<?php
    session_start();

    // Make a database connection
    $dbhost = "localhost";
    $dbuser = "weeblytrial_cms";
    $dbpass = "pingpong";
    $dbname = "weeblytrial";
    // Make a connection handle
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    // See if connection succeeded
    function checkConnectionSuccess() {
        if(mysqli_connect_errno()) {
            die("Database connection failed: " .
                mysqli_connect_error() . 
                " (" .mysqli_connect_errno() . ")"
            );
        }
    }
    checkConnectionSuccess();

    // Perform database query for the pages table and order them by position
    $query = "SELECT * ";
    $query .= "FROM pages ";
    $query .= "WHERE visible = 1 ";
    $query .= "ORDER BY position ASC";
    $result = mysqli_query($connection, $query); // creates a resource object


    // See if there's a query error
    function checkQuerySuccess($result) {
        if (!$result) {
            die("Database query failed.");
        }
    }
    checkQuerySuccess($result);

// Set the number of pages and the array of page names

    // Count the number of pages
    $result = mysqli_query($connection, $query); // creates a resource object
    function countPages($result) {
        $numPages = 0;
        while ($row = mysqli_fetch_row($result)) {
            $numPages++;
        }
        return $numPages;
    }
    $numPages = countPages($result);

    // Make an array of page names from the pages table
    $result = mysqli_query($connection, $query); // creates a resource object
    function makePageNameArray($result) {
        $pageNames = array();
        while ($row = mysqli_fetch_row($result)) {
            array_push($pageNames, $row[2]);
        }
        return $pageNames;
    }
    $pageNames = makePageNameArray($result);

?>

<html>

<head>
    <title>
        Mini Weebly
    </title>
    <link rel="stylesheet" type="text/css" href="stylesheets/proximanovas/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/reset.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="javascripts/newpage.js"></script>
</head>

<body>

    <div id="header">
        <img src="stylesheets/sprites/Weebly-Logo.png" id="logo">
    </div>

    <!-- START SIDEBAR NAV -->

    <div class="sidebarNav">

        <div class="horizDivider"></div>

        <div class="sidebarTab">
            <div class="sidebarTabText">
                TEMPLATES
            </div>
        </div>

        <div class="horizDivider"></div>

        <div class="sidebarElementContainer">

            <div class="pageButtonContainer">
                <div class="pageButton" id="currentPage">
                    <div class="pageText">
                        PAGE
                    </div>
                </div>
                <div class="pageButton" id="addNewPage">
                    <div id="addNewPageText">
                        <form action="index.php" method="post" class="addNewPage">
                            <input type="text" name="newPageName" value="">
                        </form>
                    </div>
                </div>

                <!--

                Send a POST request once a page name has been entered,
                and add it to the DOM

                -->

                <?php

                    function addPageButton($newPageName = "PAGE") {
                        $inactivePageButton = "<div class=\"pageButton\" id=\"inactivePageButton\">
                                                <div class=\"pageText\">";
                        $inactivePageButton .= $newPageName;
                        $inactivePageButton .= "</div></div>";

                        echo $inactivePageButton;
                    }

                    function pageDBInsertion($newPageName = "PAGE", $position = 2,
                                                $visible = 1, $content = "default", $connection, $user_id) {
                        $query = "INSERT INTO pages (";
                        $query .= "user_id, page_name, position, visible, content";
                        $query .= ") VALUES (";
                        $query .= "{$user_id}, '{$newPageName}', {$position}, {$visible}, 'default'";
                        $query .= ")";
                        $result = mysqli_query($connection, $query);
                        checkQuerySuccess($result);
                    }

                    if (isset($_POST["newPageName"])) {
                        $newPageName = $_POST["newPageName"];
                        addPageButton($newPageName);
                        pageDBInsertion($newPageName, 1, 1, "default", $connection, 1);
                    }

                if($numPages > 0) {
                    foreach($pageNames as $name) {
                        addpageButton($name);
                    }
                }

                
                ?>



            </div>

        </div>

        <div class="horizDivider"></div>

        <div class="sidebarTab">
            <div class="sidebarTabText">
                ELEMENTS
            </div>
        </div>

        <div class="horizDivider"></div>

        <div class="sidebarElementContainer">
            <div class="elementsTile">
                <img src="stylesheets/sprites/Element-IconsTitle.png" class="tileImg">
                <div class="elementsTileText">TITLE</div>
            </div>

            <!--             <div class="vertDivider"></div>
 -->
            <div class="elementsTile">
                <img src="stylesheets/sprites/Element-IconsText.png" class="tileImg">
                <div class="elementsTileText">TEXT</div>
            </div>

            <div class="horizDivider"></div>

            <div class="elementsTile">
                <img src="stylesheets/sprites/Element-IconsImage.png" class="tileImg">
                <div class="elementsTileText">IMAGE</div>
            </div>


            <div class="elementsTile">
                <img src="stylesheets/sprites/Element-IconsNav.png" class="tileImg">
                <div class="elementsTileText">NAV</div>
            </div>

        </div>

        <div class="horizDivider"></div>


        <div class="sidebarTab">
            <div class="sidebarTabText">
                SETTINGS
            </div>
        </div>

        <div class="horizDivider"></div>

        <div class="sidebarElementContainer">
            <div id="settingsTabText">
                SITE GRID
            </div>
            <div id="settingsTabToggleContainer">
                <img src="images/Off.png" id="off">
            </div>
        </div>
    </div>


    <!-- START MAIN CONTENT -->

    <div id="mainContentContainerContainer">
        <div id="mainContentContainer">
            <div id="mainContentPageButtonContainer">

                <div class="activePageButton">
                    <div class="activePageButtonText">
                        PAGE
                    </div>
                </div>

                <!-- whenever addNewPageButton with text entered is pressed,
                    add a new inactive page -->

                <?php
                // $newPageName is an optional parameter
                function addInactivePage($newPageName = "PAGE") {
                    $inactivePageButton = "<div class=\"inactivePageButton\">
                    <div class=\"inactivePageButtonText\">";
                    $inactivePageButton .= $newPageName;
                    $inactivePageButton .= "</div></div>";

                    echo $inactivePageButton;
                }


                if($numPages > 0) {
                    foreach($pageNames as $name ) {
                        addInactivePage($name);
                    }
                }

                // clear superglobal so it doesn't make 1 + 2 + 3 + 4 entries

                $_POST = array();
                ?>

            </div>

            <div id="mainContentImageContainerContainer">
                <div id="mainContentImageContainer">
                    <img src="images/Icon.png" class="mainContentImage">
                    <div class="mainContentImageText">
                        ADD IMAGE <div id="plus">+</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>