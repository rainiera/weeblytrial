As of July 2015 the DO instance is off. Next year :)

# weeblytrial

###http://notweebly.rainier.io


###Notes:
The project is hosted on a DigitalOcean VPS running LAMP on Ubuntu 14.04.

~~The URLs above may not be updating as quickly as I would have wished them to, or there might be something wrong with the Apache config files. In any case, I'll prepare a demonstration later from my localhost with screen capture software and post a link on here within the first half of the week.~~ EDIT: It was a MySQL connection problem, fixed now.

The CSS and PHP have been entirely refactored for maintainability and clarity. **[This](https://github.com/rainiera/weeblytrial/blob/master/includes/functions.php)** is the new functions page, which was all inline when I learned PHP/MySQL. On the backend, the persistence layer (for the purposes of this demo) is a database that contains three tables:

**```pages```** has 5 fields: ```id```, ```user_id```, ```page_name```, ```html_content```, and ```visible```. ```user_id``` is a foreign key that points to ```id``` in the ```users``` table. **```users```** has 3 fields: ```id```, ```username```, and ```hashed_password```. **```activity_log```** has 3 fields: ```id```, ```user_id```, and ```lpa_id``` (or "last_page_accessed_id"). ```user_id``` and ```lpa_id``` are foreign keys that point to their respective tables' primary keys (```id```). Whenever the page is loaded or there is interaction with an input field such as "Add New Page", creates, reads, or updates are performed on the database. Whenever a page is deleted, the ```visible``` field of that page is set to 0. This is so that deletes are performed sparingly. Upon viewing the page, however, only the pages with ```visible = 1``` are represented. The **```activity_log```** table keeps track of which page the user accessed last so that its button may be styled appropriately when PHP constructs the DOM, and the user can log out and log back in but still see the page that they were on.

Currently the ```$user_id``` variable is hard-coded for testing purposes. Sign up page to be completed. The only code that was not made from scratch was a few font stylesheets that had to be processed to be made websafe by [Font Squirrel](http://www.fontsquirrel.com/tools/webfont-generator).

Thanks for reading, Weebly :)

###Frontend bugs/to-do
------
    San Francisco:
    [x] some sprite assets weren't websafe, just re-exported the .pngs to .png in Preview
    [x] some font assets were potentially not websafe and used Font Squirrel to generate
    websafe fonts and stylesheets
    Austin:
    [X] major CSS name and <div> container refactoring for maintainability, clarity,
    and adherence to convention
    [X] refactor the HTML and PHP into templates and functions to make it more modular 
    [X] vertical divider between ELEMENTS tiles in the sidebar
    [x] remove input box borders
    [] jQuery to show the edit and delete buttons in the button containers
    [] make the SITE GRID button under SETTINGS toggle
    [] create login page for users

###Backend bugs/to-do
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
    [X] database fencepost - there should always be one page and one page button - fix by
    adding a page by default when user is added
    [x] add/delete/rename functions for the database
    [] prevent SQL injection by prepared statements/parameterization
    [] implement user authentication layer
