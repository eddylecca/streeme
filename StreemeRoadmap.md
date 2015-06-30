# Introduction #

Streeme is very much in its infancy and there are multiple new features that spring to mind. Release 1.0 has no solid deadline at this time, but it will likely be somewhere near summer 2011. The following lists details some key features and bundling deliverables for this timeline. If you think you can help with any of these features, please let the project owner know!


# Summary #

  * ~~[Implement a resume feature to support audio books and long mixes](StreemeRoadmap#Implement_a_Resume_Feature.md)~~
  * [Implement a fast forward method for browsers without HTML5 controls](StreemeRoadmap#Implement_a_Fast_Forward_UI.md)
  * [Deliver better mobile support for the Android platform](StreemeRoadmap#Better_Support_for_Android_Devices.md)
  * ~~[Integrate Jplayer into the playback API for browsers without MP3 support or controls](StreemeRoadmap#Integrate_JPlayer.md)~~
  * [Import podcasts](StreemeRoadmap#Import_Podcasts.md)
  * ~~[Import playlists](StreemeRoadmap#Import_Playlists.md)~~
  * [Support other jukebox software lists](StreemeRoadmap#Support_Music_Importing_from_Other_Jukeboxes.md)
  * ~~[Create a Virtual Machine version of Streeme](StreemeRoadmap#Create_a_Virtual_Machine.md)~~
  * ~~[Create Language Packs for Streeme](StreemeRoadmap#Language_Packs.md)~~
  * [Create a comments and rating system](StreemeRoadmap#Rating_and_Comments_System.md)
# Details #
### Implement a Resume Feature ###
For users with FFMPEG installed, offer a feature to resume a song or audiobook from a specific position. ~~This feature should record its position in the song database on a per song scope.~~ The user shall be asked if they would like to resume or start from the beginning of the song or audio book. The player will check in at a regular interval on the current position in the file using a javascript/php interface.

Completed: Version 0.4.0

### Implement a Fast Forward UI ###
For devices and browsers that support the HTML5 API, create a button to tell the playback agent to scan forward or back in preset intervals or implement a seek bar to seek through the file visually.

### Better Support for Android Devices ###
I lack the testing facilities for Android phones and the emulator seems to differ from real devices. If you have feedback on android or can help develop for it, please contact the project owner to be added to the commit group. Streeme seems to work on Android Phones V2.2 and higher as of V0.3.6

### Integrate JPlayer ###
Investigate and see if integrating a playback API like jPlayer is within scope for release. if so, implement it.

Completed: Version 0.3.0

### Import Podcasts ###
Podcasts are traditionally downloaded to a user's computer and then synced to a device. I'd like to either support this facility completely wirelessly or make an automation that syncs a users podcast list automatically with their scheduled tasks.

### Import Playlists ###
Many MP3s come with an M3U file and iTunes maintains its own playlist mechanisms, it would be nice to add an automatic import feature to merge predefined playlists with the current playlist system where possible.

Completed: Version 0.5.0

### Support Music Importing from Other Jukeboxes ###
Ideally streeme should support any jukebox software for managing song lists. If you have a favorite library management software, please help develop or bug test an importer for other software packages.

### Create a Virtual Machine ###
Exposing your server to the 'net carries a few risks and is inherently more difficult to support. Let's create a solid VMWare image that requires relatively few setup parameters and can take the brunt of living in a router DMZ. Just mount your read only shares and a sacrificial Streeme VM will be up and running on a VMWare or equivalent player.

Completed: Version 0.1.1 - [Install the VM edition!](InstallingStreemeHomeServer.md)

### Language Packs ###
The Streeme project is looking for XLIFF translations to German, Spanish and French at minimum before 1.0 is released. Any language packs for other languages are greatly appreciated.
Languages Supported:
Turkish
Italian
English
French
German
Spanish

### Rating and Comments System ###
Add a star based rating system that integrates with normal filesystem rating systems or looking at storing the ratings/comments as metadata in the id3 or in the folder near the music. If anyone has some good ideas on this, please join [the rating system thread](http://groups.google.com/group/streeme/browse_thread/thread/a753f2f267c35fd1) on the discussion group - I'd definitely like some guidance or someone to lead the charge on this feature. Would be nice if ratings made in streeme were available to other apps like itunes/winamp/amarok/windows explorer etc.