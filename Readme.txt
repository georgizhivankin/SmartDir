# About SmartDir

**Please note that this app is not in active development as of 31 December 2014 due to other more pressing projects.**

The SmartDir application is designed for individuals or small organisations who wish to provide restricted access to content on a specific server through a standard HTTP connection to their clients, without requiring complex FTP setup or configuration on the client's end.

Essentially, the SmartDir application provides an easy-to-use interface similar to the default indexing behaviour of the Apache HTTP server, but with the additional ability to restrict the user in the amount of content they can access through a basic username and password authentication system.

* * *

# Requirements

The SmartDir application requires the following to run correctly:
- An [Apache](http://httpd.apache.org/) or [Nginx](http://nginx.org/) HTTP server,
- [PHP](http://php.net/) V 5.3 or greater
- [MySQL](http://www.mysql.com/) V 5.10 or greater
- [Composer](https://getcomposer.org/) dependency manager for PHP

* * *

# Installation

The application is still in active development, so at the moment, you may wish to first pull the whole repository into your development environment, review and amend the config files at `app/config/` as necessary and then run the following command within the route directory of the application, assuming that Composer is properly setup on your machine
```
composer update
```
This would download all dependencies needed for the application to function correctly.
After this, you may run the following command to create the initial MySQL schema:
```
php artisan migrate:install
```
If you have configured everything correctly, you should be able to see the home page of the app by going to http://localhost/route_directory_of_smartdir_app/public/

# Questions, Comments or Suggestions

If you wish to contact me with questions, suggestions or comments about the app, don't hesitate to drop me a line by completing the contact form on my website [here](http://www.zhivankin.com/contact).
I usually try to answer to any received emails on a daily basis.