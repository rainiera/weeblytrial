# weeblytrial

##Frontend bugs/to-do
------
    [x] some sprite assets weren't websafe, just re-exported the .pngs to .png in Preview
    [x] some font assets were potentially not websafe and used Font Squirrel to generate
    websafe fonts and stylesheets 
    [x] breaking up the sprites with CSS wasn't working - used the Adobe CC Extract extension
    in Brackets to save multiple layers in the PSD mockup as a single image instead - this was
    particularly for the elements tiles
    [] make the plus symbol next to ADD IMAGE an image
    [] make the SITE GRID button under SETTINGS toggle
    [] jQuery to add a new page button if there is text in the addNewPage input box and the
    user clicks on that tile
    [] remove input box borders
    [] vertical divider between ELEMENTS tiles in the left column
    [] CSS name refactoring, the convention is actually "foo-bar" not "fooBar"
    [] lots of attribute redundancy, should determine most common attributes and build styles
    from there

##Backend bugs/to-do
------
    [x] Apache didn't have correct permissions for some directories that included major front
    end resources, chmod 777'd everything (zero security - would change in a shippable version)
    [x] the databae - make "users" and "pages" tables a one-to-many relationship
    [x] connect mysql to PHP with mysqli (imperative/OO-capabilities)
    [x] Make the addNewText input form make a POST request to insert new pages to the database
    (yay!)
    [] Database fencepost - there should always be one page and one page button. That should be
    part of the database even if we delete the columns from the database. Solution might be
    to just DELETE FROM pages WHERE {id > first page id}