<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include("../includes/layouts/header.php"); ?>

<?php
    // hard-code the $user_id in before auth is implemented for testing purposes
    $user_id = 1;

    if (isset($_GET["user_id"])) {
        $user_id = $_GET["user_id"];
        $selected_page_id = null;
    } elseif (isset($_GET["page_name"])) {
        $user_id = null;
        $selected_page_id = $_GET["page_name"];
    } else {
        $user_id = null;
        $selected_page_id = null;
    }
?>

<div id="container">

    <div id="sidebar">
        <div class="horiz-divider"></div>
        <div class="sidebar-title-container">
            <div class="sidebar-title-text">TEMPLATES</div>
        </div>
        <div class="horiz-divider"></div>

        <div class="sidebar-pane">
            <div class="s-page-button-container">
                <div id="pages-that-exist-container">

                    <?php
                        if (isset($_POST["new_page_name"])) {
                            $new_page_name = $_POST["new_page_name"];
                            add_new_page($user_id, "\"{$new_page_name}\"",
                                "\"<p>{$new_page_name} is a new page</p>\"", 1);
                        }
                        echo sidebar_page_list($user_id);
                    ?>
                    
                </div>
                <div id="s-add-page-button">
                    <div id="s-add-page-button-text">
                        <form action="index.php" method="post" class="s-add-page-button-text">
                             <input type="text" placeholder="ADD NEW PAGE"
                                 onfocus="this.placeholder = ''"
                                 onblur="this.placeholder = 'ADD NEW PAGE'"
                                 name="new_page_name"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="horiz-divider"></div>
            <div class="sidebar-title-container">
                <div class="sidebar-title-text">ELEMENTS</div>
            </div>
        <div class="horiz-divider"></div>

        <div class="sidebar-pane">
            <div id="s-element-tile-container">
                <div class="s-element-tile-row-container">

                    <div class="s-element-tile">
                        <div class="s-element-tile-icon" id="title"></div>
                        <div class="s-element-tile-text-container">
                            <div class="s-element-tile-text">TITLE</div>
                        </div>
                    </div>

                    <div class="vert-divider"></div>

                    <div class="s-element-tile">
                        <div class="s-element-tile-icon" id="text"></div>
                        <div class="s-element-tile-text-container">
                            <div class="s-element-tile-text">TEXT</div>
                        </div>
                    </div>

                </div>

                <div class="horiz-divider"></div>

                <div class="s-element-tile-row-container">

                    <div class="s-element-tile">
                        <div class="s-element-tile-icon" id="image">
                        </div>
                        <div class="s-element-tile-text-container">
                            <div class="s-element-tile-text">IMAGE</div>
                        </div>
                    </div>

                    <div class="vert-divider"></div>

                    <div class="s-element-tile">
                        <div class="s-element-tile-icon" id="nav">
                        </div>
                        <div class="s-element-tile-text-container">
                            <div class="s-element-tile-text">NAV</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="horiz-divider"></div>
            <div class="sidebar-title-container">
                <div class="sidebar-title-text">SETTINGS</div>
            </div>
        <div class="horiz-divider"></div>

        <div class="sidebar-pane">
            <div id="setting-tile">
                <div id="setting-tile-text">SITE GRID</div>
                <div id="setting-tile-button"><img src="css/images/off.png"></div>
            </div>
            <div class="horiz-divider"></div>
        </div>

    </div>

    <div id="main">
        <div id="main-content-container">
            <div id="m-page-button-container">
                <?php echo main_page_list($user_id); ?>
            </div>

            <div id="m-image-container">
                <div id="m-add-image-image">
                    <img src="css/images/icon.png">
                </div>
                <div id="m-under-image">
                    <img src="css/images/add-image-plus.png">
                </div>
            </div>

            <div id="m-title-container">
                Add Title Here
            </div>
            <div id="m-text-container">
                Cum sociis natoque penatibus et magnis dis parturient montes,
                nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula
                ut id elit. Cum sociis natoque penatibus et magnis dis parturient
                montes, nascetur ridiculus mus. Praesent commodo cursus magna, vel
                scelerisque nisl consectetur et. Maecenas sed diam eget risus varius
                blandit sit amet non magna.<br>
                Aenean lacinia bibendum nulla sed consectetur. Cum sociis natoque
                penatibus et magnis dis parturient montes. nascetur ridiculus mus.
                Curabitur blandit tempus porttitor. Lorem ipsum dolor sit amet,
                consectetur adipiscing elit. Etiam porta sem malesuada magna mollis
                euismod. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            </div>
        </div>
    </div>

</div>

<?php include("../includes/layouts/footer.php"); ?>