# weeblytrial


4:00 - figured out that some of the sprite assets weren't web safe and resaved them all
4:50 - figured out that some of the font assets were potentially not web safe and used Font Squirrel to generate web safe fonts and stylesheets
5:00 - figured out that Apache didn't have the correct permissions for some directories which included my reset and font stylesheets, chmod 777'd everything even though that means zero security (would definitely have to change in a shippable iteration)