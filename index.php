<?php session_start(); ?>

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
    <?php //$numPages=1 ; //$_SESSION[ "$numPages"]=1 ; //echo numPages; //echo mt_rand() ?>

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
                        ADD NEW PAGE
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

    </div>

    <!-- START MAIN CONTENT -->

    <div id="mainContentContainer">
        <div id="mainContentPageButtonContainer">
            <div id="mainContentPageButtonContainer">
                <div class="activePageButton">
                    <div class="activePageButtonText">
                        PAGE
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>