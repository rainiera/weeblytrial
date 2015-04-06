# weeblytrial

###notweebly.rainier.io OR http://104.131.92.112

##Frontend bugs/to-do
------
    San Francisco:
    [x] some sprite assets weren't websafe, just re-exported the .pngs to .png in Preview
    [x] some font assets were potentially not websafe and used Font Squirrel to generate
    websafe fonts and stylesheets
    Austin:
    [X] major CSS name and <div> container refactoring for maintainability, clarity,
    and adherence to convention
    [X] refactor the HTML and PHP into templates and functions to make it more modular 
    [] make the plus symbol next to ADD IMAGE an image
    [] make the SITE GRID button under SETTINGS toggle
    [] jQuery to add a new page button if there is text in the s-add-page-button input box and
    the user clicks on that tile
    [] remove input box borders
    [X] vertical divider between ELEMENTS tiles in the sidebar

##Backend bugs/to-do
------
    San Francisco:
    [x] altered permissions for directories that Apache server couldn't access, including
    major frontend assets
    [x] setup database table "pages"
    [x] connect mysql to PHP with mysqli
    [x] make the s-add-page-button input form make a POST request to insert new pages to the
    database (yay!)
    Austin:
    [x] migrate personal website "rainier.io" from GitHub Pages to DigitalOcean droplet
    (static --> dynamic)
    [x] Setup subdomain at personal website to host Mini Weebly, "notweebly.rainier.io"
    (if the DNS hasn't propogated yet, this is a sure-fire URL: http://104.131.92.112/)
    [X] setup database table "users"
    [X] database fencepost - there should always be one page and one page button. That should be
    part of the database even if we delete the columns from the database. Solution might be
    to just DELETE FROM pages WHERE {id > first page id}
    [] implement user authentication layer