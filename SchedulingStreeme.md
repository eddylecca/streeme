# Introduction #

Now you've got a working Streeme copy of your own, it's time to take a moment to learn how to schedule scanning tasks, so you don't have to run scans manually. On most unix and linux system, this is taken care of by a program called crontab. On Windows, you'll use Windows Scheduler. Let's have a look at how to make scanning music and art an automated task.

# Scheduling on Windows #

### Windows Vista and W7 ###
Scheduling is located in Control Panel -> Administrative Tools -> Task Scheduler

Make sure that you run this task as an admin

![http://farm6.static.flickr.com/5122/5253134077_b7059db30c_o.jpg](http://farm6.static.flickr.com/5122/5253134077_b7059db30c_o.jpg)

Create a new task, add a little descriptive text and check high privilege

![http://farm6.static.flickr.com/5204/5253742954_3a64869325_o.jpg](http://farm6.static.flickr.com/5204/5253742954_3a64869325_o.jpg)

Set up the timing under triggers - I like to run mine daily.

![http://farm6.static.flickr.com/5245/5253743098_81eefbcb6c_o.jpg](http://farm6.static.flickr.com/5245/5253743098_81eefbcb6c_o.jpg)

Set up the Action part - you'll need to make sure it starts in the same directory as your project

![http://farm6.static.flickr.com/5289/5253134241_3793dcda5c_o.jpg](http://farm6.static.flickr.com/5289/5253134241_3793dcda5c_o.jpg)

There are other settings that you can play around with, but these settings should begin your daily scan.





# Scheduling on OSX, Unix and Linux #

enter a terminal and type

```
crontab -e 
```

choose an editor and then add a line something like

```
# This cron is to update the music library in streeme
0 0 * * * cd "/home/notroot/sites/streeme"; ./symfony schedule-scan
```
This will perform a daily scan of your music for changes/updates to songs and art files.
<br />
[Continue to Connecting to Streeme >](ConnectingStreeme.md)