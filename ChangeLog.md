# CHANGELOG #
### Version 0.6.0 ###
  * Added search indexing for faster searching on large media libraries using mysql
  * Added Optional support for Solr Indexing - see documentation
  * Added Latvian language pack - thanks, @kleofass!
  * Added framework for windows installer setup scripts
  * Updated to Jquery Datatables 1.8.2 to help with keyword search issuse and to tighten security
  * Improved compatibility with postgresql databases
  * Added a repeat function
  * Added framework for LDAP support - needs testing! help!
  * Fixed a bug in pagination returning screwy results
  * Fixed autoscroll bug on small screens

### Version 0.5.0 ###
  * THIS VERSION NOW USES A NEW DATABASE SCHEMA. IT IS NOT A CLEAN UPGRADE PATH FROM 0.4.2.
  * Added playlist scanning for iTunes playlists
  * Fixed meta scanning so it includes more tag locations - closes [issue 31](https://code.google.com/p/streeme/issues/detail?id=31)
  * Added support for multiple genres - closes [issue 25](https://code.google.com/p/streeme/issues/detail?id=25)
  * Changed streeme to use real filesystem names instead of the iTunes scheme. This helps to better associate playlists with the appropriate content
  * Upgraded getid3.php id3 scanner library to 1.9.0

### Version 0.4.2 ###
  * added a delete user command to the CLI to manage users a bit better - closes [issue 19](https://code.google.com/p/streeme/issues/detail?id=19)
  * Added a functional test suite for Streeme's critical paths
  * Added an asset collector/minifier to help make mobile downloads faster and speed up Javascript operations.
  * Lots of .htaccess updates to improve http caching
  * Closing [issue 26](https://code.google.com/p/streeme/issues/detail?id=26) - song length ordering
  * Closing [issue 25](https://code.google.com/p/streeme/issues/detail?id=25) - searching by genres
  * Preemptively fixing case sensitive 'like' expressions for Postgres and SQLite
  * Adding a media filler task, so testers can see how Streeme will perform with large libraries
  * Adding playlist scanner components in prep for 0.5.0

### Version 0.4.1 ###
  * Fixed a mobile playback bug stemming from the mp3 transcoder
  * Added a workaround to new playback behaviors added to iOS4.3
  * Added a way to resync your art after a database purge
  * Moved Safari (Windows) to jPlayer
  * Page title now reflects the currently playing song on the desktop interface.

### Version 0.4.0 ###
  * Added a feature to resume playback of the last played song - feature requires FFMPEG
  * Added translation for Danish and Khmer
  * Fixed Shuffle for SQLite and Postgres storage engines
  * Increased the contrast of the shuffle button
  * Strengthened security - denied all access to user config folders in case of a botched install

### Version 0.3.6 ###
  * Significantly reduced memory usage required by iTunes scan process - also found and resolved a number of character encoding issues in the scan process
  * fixed the sorting algorithm for the newest songs view - now presents albums ordered by tracknumber and date modified
  * Added android support for V2.2+
  * Merged pull request from esion on Github to allow for saving your volume settings in jPlayer
  * Fixed another case sensitivity bug in extensions for jplayer
  * Removed some old dependencies (JSMin and CFProperty List)

### Version 0.3.4 & 0.3.5 ###
  * Added french locale
  * Amazon scanner edge cases resolved - if id3 derived name has null terminators, Amazon/cloudfusion will respond with poorly formed XML.
  * Fixed issue with in\_array being used in a case insensitive manner when it is not a case insensitive function.
  * Changed google chrome's html 5 player choice back to an audio tag until Chromium issue in version 10 is resolved. that bug is here: http://code.google.com/p/chromium/issues/detail?id=73458
  * Unit test added for StreemeUtil

### Version 0.3.2 & 0.3.3 ###
  * Added more locales
  * Added Logging to the proxy system so users can see details about how their media loads

### Version 0.3.1 ###
  * Added a language switcher to the login form
  * Streeme will also try to detect your browser language
  * Thanks to Contributors dryope and mte90smanettator for turkish and italian translation files
  * added a few more language tokens and made the inteface a bit more localizable

### Version 0.3.0 ###
  * Added jPlayer library to project - Streeme now supports Firefox, Opera and IEb9
  * Fixed a syntax error in the HTML for playlist display
  * added a skin for Jplayer to unify the UI look across more browsers

### Version 0.2.1 ###
  * Corrected a bug in the media proxy that could sometimes hang Chrome while transcoding

### Version 0.2.0 ###
  * Migrated old database code to Doctrine ORM
  * Added a unit test suite
  * Streeme now works on Postgresql, mySQL and SQLite
  * UI fixes and cleaner fail cases for songs with no albums/artists
  * Fixes a problem in Album Views on mobile devices, where the data was incorrect

### Version 0.1.1 ###
  * Fixed a problem on single thread PHP editions where symfony would stop servicing new responses when streaming
  * Left a console.log in javascript code
  * Added copyright notice for artwork / documentation and a setup readme file
  * Added a scheduler task to schedule both music and art scans
  * Created a VM edition of Streeme called [Streeme Home Server](InstallingStreemeHomeServer.md)

### Version 0.1.0 ###

  * First Import - Basic music player functionality ready for release