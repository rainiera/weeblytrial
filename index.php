<?php
session_start();
?>



<html>

<head>
    <title>
        Mini Weebly
    </title>
    <link rel="stylesheet" type="text/css" href="stylesheets/proximanovas/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/reset.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/styles.css">
</head>

<body>
    <?php
//$numPages = 1;
//$_SESSION["$numPages"] = 1;
//echo numPages;


//echo mt_rand()


    ?>
    
    <div id="header">
        <img src="stylesheets/sprites/Weebly-Logo.png" id="logo">
    </div>
    <div class="sidebarNav">

        <div class="sidebarTab">
            <div class="sidebarTabText">
                TEMPLATES
            </div>
        </div>
        <div class="sidebarElementContainer">
            <div class="pageButtonContainer">
                <div class="pageButton" id="currentPage">
                    <div class="pageText">
                        PAGE
                    </div>
                </div>
                <div class="pageButton" id="addNewPage">
                    <div class="pageText">
                        ADD NEW PAGE
                    </div>
                </div>
            </div>
        </div>


        <div class="sidebarTab">
            <div class="sidebarTabText">
                ELEMENTS
            </div>
        </div>
            <div class="sidebarElementContainer">
                <div class="elementsTile">
                    <div class="tileImgContainer">
                       <div id="titleTile"></div>
                    </div>
                </div>
                <div class="elementsTile">
                </div>
                <div class="elementsTile">
                </div>
                <div class="elementsTile">
                </div>
            </div>
<!--
        <div class="sidebarTab">
            <div class="sidebarTabText">
                SETTINGS
            </div>
            <div class="sidebarElementContainer">
                <div class="settingsTabContainer">
                    <div id="settingsTabText">
                        SITE GRID
                    </div>
                </div>
                <div id="settingsTabToggleContainer">
                    <img src="images/Off.png" id="off">
                </div>
            </div>
        </div>
-->
    </div>
    <div id="mainContentContainer">
        <div id="mainContentPageButtonContainer">
            Page button.
        </div>
    </div>
</body>

</html>