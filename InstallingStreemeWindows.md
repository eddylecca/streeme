# Introduction #

This is the Windows install guide - if you're looking for other platform installation guides, please go back to the [start page of the installation](InstallingStreemeStartPage.md)

Streeme requires the initial installation of a web server package before the script can operate. This method seems to work on Windows XP to Windows 7 x64.

## Installing the Web Server ##

**Log in as an administrator throughout this process**

[Install XAMPP (EXE Version)](http://www.apachefriends.org/en/xampp-windows.html#641)

There is a visual guide on the installation below the download.

**Be sure to turn off IIS** before proceeding with installing xampp. To do that, go to: control panel>administrative tools>services then stop and disable www publishing or World Wide Publishing, whichever it may be.


### Install Services ###

after installing, please go to _C:\xampp\apache_

run/double click `apache_installservice.bat`

then go to _C:\xampp\mysql_

run/double click `mysql_installservice.bat`

### Configure Passwords for XAMPP ###

open a web browser and go to:

http://127.0.0.1 or http://localhost

Click "Security" > http://localhost/security/xamppsecurity.php

Set a password to Mysql, phpMyAdmin and XAMPP

XAMPP should now tell you everything's secure!

## Configuring the Server ##

Now you've got your bare bones server installed, you'll need to make some edits to the config files before you can proceed.

### Apache Configs ###
The above guide will add apache in a modular setup - to enable/disable modules, you just uncomment them in the configuration file:

open a text editor (start>accessories>notepad) and edit _C:\xampp\apache\conf\httpd.conf_

find these modules and enable them by removing the "#"
```
LoadModule rewrite_module modules/mod_rewrite.so
LoadModule deflate_module modules/mod_deflate.so
```

Create the virtual hosts:
It's highly recommended that you choose two **random unused ports** between 1025-9800 and replace the example 8095/8096 pairs. One port is for the media stream and another is for HTML and program communication. Replace d:/web/streeme/web with your own path/to/streeme/web. You can always decide this later or just leave it and install your streeme project to D:/web/streeme. Add the following to the very bottom of your httpd.conf file:

_C:\xampp\apache\conf\httpd.conf_
```
# This is the configuration for the streeme app communication path
Listen *:8095

NameVirtualHost *:8095

<VirtualHost *:8095>
  DocumentRoot "d:/web/streeme/web"
  DirectoryIndex index.php
  <Directory "d:/web/streeme/web">
    AllowOverride All
    Allow from All
  </Directory>

  Alias /sf "d:/web/streeme/lib/vendor/symfony/data/web/sf"
  <Directory "d:/web/streeme/lib/vendor/symfony/data/web/sf">
    AllowOverride All
    Allow from All
  </Directory>
</VirtualHost>

# This is the configuration for the music streamer
Listen *:8096

NameVirtualHost *:8096

<VirtualHost *:8096>
  DocumentRoot "d:/web/streeme/web"
  DirectoryIndex index.php
  <Directory "d:/web/streeme/web">
    AllowOverride All
    Allow from All
  </Directory>
</VirtualHost>

#Disable SVN directory sniffing through apache
<Directory ~ ".*\.svn"> 
Order allow,deny 
Deny from all 
Satisfy All 
</Directory> 
```

go: Control Panel>Administrative Tools>Services

find Apache and right click it, then choose `restart`

If all went well, Windows will report that is "started" in the status column

### PHP Configs ###

_C:\xampp\php\php.ini_

  * set `magic_quotes_gpc = Off`
  * set `short_open_tag = Off`
  * set `memory_limit = 256M` or higher

go: start>applications>command prompt>right click and run command prompt as administrator
type:
  * `pear install HTTP_Download`

note: If your command prompt can't find the file pear (the php application and extension repository command), you have to change you windows path . To do that, go Control Panel>System>Advanced>Environment Variables. In the both user and system variables, you'll see the word Path. Edit Path for both variables and add `;C:/xampp/php;` to the end of the entry. Click ok and restart you command prompt. Pear should run now.

### MySQL Configs ###

You will have already set up your MySQL installation previous steps, but there's a couple of easy performance and internationalization tweaks to perform.

_C:\xampp\mysql\bin\my.ini_
```
[mysqld]
default-character-set = utf8
default-collation = utf8_unicode_ci
query_cache_type = 1
query_cache_size  = 32M
```

### FFMPEG ###
Installing FFMPEG for streeme will allow you to transcode music on the fly.

You'll need to download a compiled version of FFMPEG with libmp3 and ogg vorbis

Download and run the file from the following location

[http://ffmpeg.arrozcru.org/builds/ Unofficial FFMPEG Builds - use  [revision 16537](https://code.google.com/p/streeme/source/detail?r=16537) shared
]

download and install the executable in STEP 4

`ffmpeg.exe`

keep the location of the install handy for configuring streeme


### Tortoise SVN ###
This app relies on a file management and version control system called SVN. Windows users should download and install TortoiseSVN here:

[Get Tortoise SVN Here](http://tortoisesvn.net/downloads.html)

### Cleaning Up ###

Restart both apache AND mysql services in the "services" panel before you continue:

Continue to [Installing Streeme >](InstallingStreeme.md)