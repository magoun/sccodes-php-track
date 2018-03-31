# SC Codes PHP Track

This repo will hold my up-to-date work with the SC Codes PHP Track.
The point is to be able to easily share my progress with other PHP track members and anyone following my PHP coding progress.

It will also help me get in the habit of saving my code and using Git more frequently.

[//]: # (Add Table of Contents if this page gets too long.)

#### Actions:
- [x] Clean up my version of the file from the first PHP Workshop.
- [x] Create the GitHub Repo for the PHP Track.
- [x] Test README.md appearance on GitHub (actions and relative links).
- [ ] Create instructions for getting PHP 7.2 and Laravel set up on c9.io.
    * Laravel section complete!
    * Gabriel has a good chunk of this available on slack already.
- [ ] Learn what the submit button does for PHP
    * Is there a post request? It doesn't change the html handle...
    * Can you set a custom href on submit?
- [ ] Add recap of Workshop #2
- [x] Add details for the PHP Track project
- [x] List user stories as actions under project header below

#### CodeSchool Activity
1. [PHP Track](https://www.codeschool.com/learn/php)
    1. [Try PHP](https://www.codeschool.com/courses/try-php)
    2. [Close Encounters with PHP](https://www.codeschool.com/courses/close-encounters-with-php)
    3. [Try Laravel](https://www.codeschool.com/courses/try-laravel)
    4. [From Form to Table with Laravel](https://www.codeschool.com/courses/try-laravel)
        * The From Form to Table App is replicated in the [market](market/) folder in this repo. It is not styled and had progress only through the end of the From Form to Table course on CodeSchool.
2. [Database Track](https://www.codeschool.com/learn/database)
    1. [Try SQL](https://www.codeschool.com/courses/try-sql)
    2. [The Sequel to SQL](https://www.codeschool.com/courses/the-sequel-to-sql)
    3. [The Magical Marvels of MongoDB](https://www.codeschool.com/courses/the-magical-marvels-of-mongodb)

#### PHP Workshops
1. 24Feb18 with Ryan McAllen
    * Worked on general PHP syntax and programming tools.
    * Started working on a simple CRUD interface to modify our "database" (which was the data.json flat file).
    * Learned some tricks on how to read from and write to a file from PHP.
    * Also learned some design patterns for looping constructs in PHP alongside HTML. 
        * [Loop Example](php-workshop-1/loopingexample.php)

#### Projects
[Link to project description](https://docs.google.com/document/d/1MNkXgf0rjRus8LRWmm6qjV4nNA-4p6vWrse0OOnFGsg/edit)
[Link to Greenville Open Data Website](https://data.openupstate.org/)

Fulfill the user stories below using the Greenville Open Data API.
- [ ] User Story: I can view events by month.
- [ ] User Story: I can sort events by event type.
- [ ] User Story: I want to see a list of events and be able to click a Google Calendar link and add events to my calendar easily. 
- [x] User Story: I can view a list of organizations.
    * This is satisfied by the /orgs route

##### Project next steps
- [x] Figure out how to parse timestamps from events
- [ ] Add links to organizations in the orgs view
- [x] Abstract orgs display out of template
    * @yield and @section tags
- [x] Create general template ~~with header / footer~~
- [ ] Beautify layout.page
- [x] Figure out how to sort events by date
