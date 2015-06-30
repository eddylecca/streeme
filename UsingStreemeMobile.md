# Introduction #

Streeme mobile is a cut down mobile optimized version of the desktop app. The Mobile app works on many Webkit based handsets including iPhone, iPad, iPod touch, Palm Pre and Android (2.3). It uses a familiar interface and simple controls to load up and play in an instant.

# The UI Groups #

![http://farm6.static.flickr.com/5248/5253227672_7f9f8eb46c_o.jpg](http://farm6.static.flickr.com/5248/5253227672_7f9f8eb46c_o.jpg)

### Card Title ###
The UI is broken into cards - each card has a unique set of content on it, one may contain the player interface, another may contain a songlist. To make it clear what card you are on, simple refer to the car name in the hading.

### Exit App ###
This button will return you to the lobby. Because not all mobile phones support the `onbeforeunload()` javascript command, the app does not warn you if you click this element.

### Global Search ###
Most cards feature a magnifying glass icon indicateing search. Click the button and type in your search terms. You will see a list of songs related to your keywords. to exit the universal search and go back to your last search, click the Back to menu button once.

### Back to Menu ###
Most cards feature 3 solid horizontal lines in the top right. This button will return you to the welcome screen from any other card.

### Card List ###
The card list is the jump off point for using the mobile interface. here's a quick breakdown of the functions of each menu button
  * **Artists** - This button takes you to a list of artists in your library
  * **Albums** - This button takes you to a list of albums in your library
  * **Songs** - This button will take you to a list of songs - on first load, it will show the newest songs in your library, otherwise it will show the last state you left the songlist in.
  * **Playing** - At any time, you can see what's currently playing in the player using this button
  * **Newest Songs** - This button loads the songlist with your library ordered by newest  library additions
  * **Shuffle all Songs** - This button loads the songlist with your library in a radnom order
  * **Genres** - This button takes you to a list of active genres in your library
  * **Playlists** - Any playlists you make in the desktop will be instantly available to your mobile device as well. This button takes you to a list of playlists.
  * **Settings** This button will take you to similar settings as seen in the desktop app.

### Alpha Bar ###
Streeme has a common UI element called the alpha bar for managing medium sized lists clicking a letter in the alpha bar will take you to the results starting with that letter or symbol. There's on small change to the way it works on mobile - the alpha bar sends a request to your server asking for new content. so be patient while the list updates.

### Navigate to the Previous Card ###
Some cards feature a navigation element in the top left corner. This button will switch back to the previous card.

### Album Art ###
Your album art appears in the player card (Playing from the menu while a song is playing back). Tap the art to toggle pause/play. To each side of the album art, there are buttons indicating skip to the next and previous track. If the button is a lighter color, there are no more songs in that direction.

### Song List ###
The song list is paginated and can display many thousands of songs fairly quickly. The interface becomes quicker as you use it thanks to SQL caching. Music is ordered by latest library additions, but maintains a cookie to remember your settings per session. you may order by any column by clicking on the table's column headers. In addition to your ordering, streeme will attempt to group album track numbers so song play in the right order.
  * To play a song,tap the appropriate row
  * the playing song row will turn a faint blue to indicate it is the currently selected (and playing) track

### Song Info ###
The currently playing song will be detailed above the player controls. The artist, album and song name are all visible during playback.

### Player Controls ###
The player controls vary with each mobile browser. They generally contain a play button, progress indicator/duration indicator. Some handsets simply do not feature playback controls. The Palm Pre for instance, does not support controls and the API is quite primitive, so you can't even count on duration indicators, so I'm not going to get carried away with building a UI until a new WebOS edition hits the Pre.

### Adding Streeme to your Home Screen/bookmarks ###
In order to get back to Streeme quickly, it's a good idea to add your public URL to the bookmarks on your phone.

**iPhone/iPod Touch/iPad**
  * While Using Streeme Mobile, Click the "+" at the bottom of the screen
  * Click "Add to Home Screen"
  * Choose a Name to show on your home screen, the icon for Streeme will download automatically.
  * From now on, you can access Streeme from your home screen like any other app.
<br />
**Palm Pre / WebOS**
  * While Using Streeme Mobile, Click the Web button in the top left corner of the screen
  * Tap Page>Add to Launcher
  * Choose a Name to show on your home screen, if the icon's not quite centered, click it and you'll be able to create an icon from the page
<br />
**Android**
  * Click the Star button to the right of the URL for streeme mobile.
  * Click "Add" and enter a name
  * Now you'll be able to refer to streeme using a bookmark

[Next Topic: Scheduling Streeme](SchedulingStreeme.md)

