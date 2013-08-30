# wp-mins-to-read

**A simple plugin to generate the minutes to read for WordPress posts. Increase blog readership by qualifying the time commitment needed to read your post.**

## Features
* Calculates the time it will take to read a post
* Adds `Min Read` column to WordPress post admin
* Provides a function for outputting `Min Read` on posts and archives
* Uses WordPress transients to store calculated values and increase performance. 

## Installation
1. Copy the `wp-mins-to-read` directory into your `wp-content/plugins` directory
2. Navigate to the *Plugins* dashboard page
3. Locate the menu item that reads `WP Mins To Read`
4. Click on *Activate*

## Theme Integration
In order to output the time to read on the front end you will need to add the function call to your theme. You can do this by calling the ` get_mtr(); ` function. 
Typically you want to add the time to read above the post title. To do this you will need to edit two files.

### Add to singal post & archive pages

* Open ` wp-content/themes/YOUR THEME/contents.php`
* Find `<h1 class="entry-title">`
* Add the following line above or below the title line.

```php
<strong><?php WP_MinsToRead::get_mtr(get_the_ID()); ?></strong>
```
* Repeat steps to add the code to ` wp-content/themes/YOUR THEME/content-single.php`

## Credits
* [Edward McIntyre](https://github.com/twittem/) plugin Author
* [Tom McFarlin](http://tommcfarlin.com/) plugin structure is based on Tom's [WordPress-Plugin-Boilerplate 2.0](https://github.com/tommcfarlin/WordPress-Plugin-Boilerplate)

## Roadmap Items
* Find a good way to add the Min Read text to the posts automatically. There is no current filter that allows you to add text directly before or after the post title that is not included in the posts `<h1>` tag. This can by done using jQuery but on archive pages it could cause quite a performance lag.
* Add localization support
* Add Activation function to generate transients for current posts
* Add Deactivation function to delete transients from the database

## Changlog
**1.0**
* Initial Release

[![Bitdeli Badge](https://d2weczhvl823v0.cloudfront.net/twittem/wp-mins-to-read/trend.png)](https://bitdeli.com/free "Bitdeli Badge")