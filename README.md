# Setting up Dev Environment #
A web sever will need set up.  You can get a free web server by going to [xammp](https://www.apachefriends.org/index.html).  This will also install MYSQL which will be used until the Oracle Database is set up.

1. Clone the repository into the HTDOCS folder which is found in the XAMMP folder.
2. Open a CMD session and CD into the directory you have just created after the clone.
3. Run `composer install` this will install the back end dependencies.  You may have to install Composer if you do not have it already.
4. Now run `npm install` this will install the front end dependencies.  You may have to install Node and NPM if you have do not already have this.
4. Open the Xammp Control Panel, start the Apache and Mysql Services.  
5. Create a new Database in MYSQL.  You can do this by going to http://localhost/phpmyadmin.  Of the left sidebar you will see a 'New' link.  Click on that and give the database a name.  Click submit.
6. Open up your IDE and in the root of your project folder create a new .env file.  This can be done by copying and pasting the example.env file.  Name the new file '.env'
7. Edit the database details.  The ones that require changing are: 
    1. App Name = IP3
    2. Database Name = Name set in Step 6 
    3. Database User = Root
    4. Database Password = (just leave it blank after the '=' sign).
You can change other details if required but usually, the defaults are fine.
9. Back in CMD, run `php artisan migrate`.  This will create the tables.
10. Now Run `php artisan db:seed`. 
11. Finally, run `php artisan key:generate`.
11. Open a browser and navigate to http://localhost/ip3/public and it you should direct you towards a login page.

# Login Credentials for App #
Username: test@test.com
Password: test

# README #

http://localhost/ip3/public/

This README would normally document whatever steps are necessary to get your application up and running.

### What is this repository for? ###

* Quick summary
* Version
* [Learn Markdown](https://bitbucket.org/tutorials/markdowndemo)

### How do I get set up? ###

* Summary of set up
* Configuration
* Dependencies
* Database configuration
* How to run tests
* Deployment instructions

### Contribution guidelines ###

* Writing tests
* Code review
* Other guidelines

### Who do I talk to? ###

* Repo owner or admin
* Other community or team contact