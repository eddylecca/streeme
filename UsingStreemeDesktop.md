# Introduction #

Streeme Desktop is the more powerful interface of the two supplied music players. Streeme uses your browser's HTML5 audio player to play back. As more and more browsers get turned onto HTML5, the support for streeme will broaden. At this time, your best bet is to use Google Chrome or Apple Safari to run the app.


# The UI Groups #

![http://farm6.static.flickr.com/5284/5251054510_04330b59d1_o.jpg](http://farm6.static.flickr.com/5284/5251054510_04330b59d1_o.jpg)

### Album Art ###
Your album art appears in the top left corner of the app. click on the art to magnify it.

### Song Info ###
The currently playing song will be detailed above the player controls. The artist, album and song name are all visible during playback.

### Playlists ###
You can make unlimited amounts of playlists with Streeme. Click the folder icon to expose the playlist sub menu. You will see a list of playlists and an Add a playlist button.
  * To add items to a playlist, single click on one of the playlists in the list. It will turn blue when it is active. At this point you can use the Add to playlist buttons to add artists albums and songs.
  * To choose a playlist for playback, either double click the playlist entry or click the play button.
  * To stop vieiwing a playlist, click the eject icon.
  * To erase a playlist, click the delete button.
  * To add a new playlist, click Add New Playlist... and give your playlist a name.
  * To exit the playlist window, click the folder icon again.

### Settings ###
If you have enabled transcoding and a valid FFMPEG executable exists in your configuration, you may change attributes about your output file in this sub menu. Click the wrench icon to open the menu and select your options:
  * Target bitrate:
    1. Play original - will not modify the file's bitrate.
    1. Auto will automatically set the bitrate based on your connection speed, this is read by transferring a file from your streeme server to your device.
    1. Static Bitrate - will pick a bitrate roughly equivalent to the number shown depending on the format
  * Target format:
    1. Play original - will not modify the file format
    1. MP3 - change the format of this file to MP3
    1. OGG - change the format of this file to OGG
  * To exit the settings window, click the wrench icon again.

### Exit App ###
The exit app button will return you to the player lobby. From there you may choose another player or logout. Streeme will confirm before it closes the session to prevent accidental tab or browser closure during playback.

### Player Controls ###
The player controls vary with each browser. They generally contain a play button, progress indicator/duration indicator and a volume control. The buttons immediately to the right skip to the < Previous and > Next songs. RND shuffles the current song selection.

### Genre List ###
Pull down to see a list of Genres, you can scan through them by typing the first and second letters while the select box is highlighted

### Alpha Bar ###
Streeme has a common UI element called the alpha bar for managing medium sized lists clicking a letter in the alpha bar will take you to the results starting with that letter or symbol.

### Artist and Album List ###
The left sidebar contains your catalog of artist and albums. You can use the alpha bar or  global search to find artists and albums quickly.

### Global Search ###
When you enter search terms in this box, streeme will attempt to match artists, albums and songs to get you the most results. It searches progressively, so results should get better as you search. If you have already selected an artist/genre/playlist, adding your keywords to the active terms will search for items within those constraints.

### Song List ###
The song list is paginated and can display many thousands of songs fairly quickly. The interface becomes quicker as you use it thanks to SQL caching. Music is ordered by latest library additions, but maintains a cookie to remember your settings per session. you may order by any column by clicking on the table's column headers. In addition to your ordering, streeme will attempt to group album track numbers so song play in the right order.
  * To play a song, either double click its entry in the songlist or hit the 1 click play button. On iPad, you should consistently touch the play icon, since double tapping a song will only zoom in.
  * the playing song row will turn a faint blue to indicate it is the currently selected (and playing) track

<br />
[Continue to Using Streeme Mobile](UsingStreemeMobile.md)
<br />
<br />