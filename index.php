<?php
    session_start();


    // Make a database connection
    $dbhost = "localhost";
    $dbuser = "weeblytrial_cms";
    $dbpass = "pingpong";
    $dbname = "weeblytrial";
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); // make a connection handle

    // See if connection succeeded
    if(mysqli_connect_errno()) {
        die("Database connection failed: " .
            mysqli_connect_error() . 
            " (" .mysqli_connect_errno() . ")"
        );
    }

    // Perform database query
    $query = "SELECT * ";
    $query .= "FROM pages ";
    $query .= "WHERE visible = 1 ";
    $query .= "ORDER BY position ASC";
    $result = mysqli_query($connection, $query); // creates a resource object
    // test if there's a query error
    if (!$result) {
        die("Database query failed.");
    }

    $numPages = 1;
    $pageNames = {}

    while($row = mysqli_fetch_assoc($result)) {
    // output data from each row
    var_dump($row);
    echo $row["pageName"] . "<br>";
}

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
                        <input id="addNewPage" id="addNewPageText" placeholder="ADD NEW PAGE">
                    </div>
                </div>
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

                function addInactivePage($newPageName) {
                    $inactivePageButton = "<div class=\"inactivePageButton\">
                    <div class=\"inactivePageButtonText\">";
                    $inactivePageButton .= $newPageName;
                    $inactivePageButton .= "</div></div>";

                    echo $inactivePageButton;
                }


                if($numPages > 1) {
                    for ($i = 0; $i < $numPages - 1; $i++) {
                        addInactivePage("YOLO");
                    }
                }

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