# Introduction #

It's time to install the streeme application - most of this is configuration, so just go through and see what parts you'll need in your app.


## Check out the Code ##
use SVN to checkout the code from Google code. If you know how to use SVN, run the following command in your streeme directory:

```
cd /path/to/your/streeme/install
svn checkout http://streeme.googlecode.com/svn/trunk/ .
```

[Help! I've never done this before - show me what to do!](UsingSVN.md)


## Configure Streeme ##

in _your\_streeme\_dir/config/_
  * rename databases.template.yml to databases.yml
edit this file with a text editor
```
      username: your_mysql_username
      password: your_mysql_pass
```


---


in _your\_streeme\_dir/_
  * rename .htaccess.template .htaccess

  * linux and mac users
```
chmod 777 log cache
```


---


in _your\_streeme\_dir/apps/client/config_
  * rename app.template.yml to app.yml
edit this file with a text editor
  * **iTunes XML Location** - if you plan to use the itunes media scanner, enter the full path to your itunes xml file
  * **Watched folders** - if you plan to use the filesystem scanner to import your music, these are the folders that will be scanned periodically for new music - add a folder per line preceded with a "-" as shown in the example
  * **Mapped Drive Locations** - If your music is predominantly stored on NAS drives on Windows, please remap the locations from the itunes style full paths to the windows style sharing paths using forward slashes only required for itunes scanning. examples given in file
  * **Allowed File Types** - currently streeme only imports mp3 files, but this option will control which extensions are allowed to be scanned for both the itunes and filesystem scanners
  * **Results Per Page** - The default list length per page
  * **Allow FFMpeg Transcoding** - You may enable FFMpeg functionality if you require transcoding capabilities. I've been able to run this on even pretty frail hardware, but you may not be able to make many connections if every authorized device is transcoding simultaneously
  * **FFMpeg Executable** - the full path to your FFMpeg application file
```
examples: if you do not know where ffmpeg is, search using locate on the commandline or using windows explorer:
Windows: "C:\Program Files\FFmpeg for Audacity\ffmpeg.exe"
Linux: "/usr/bin/ffmpeg"
OSX: "/opt/local/var/macports/software/ffmpeg/version/opt/local/bin/ffmpeg"
```
  * **Music Proxy Port** select a port for music communications enter here whatever you put in your virtual host setup in the first step
  * **Send Cookies with Request** when requesting music on devices that cannot send cookies for Audio or art requests, this option allows for a workaround - it sends the remember key cookie value with the request and verifies it against the IP given at last login. This is mostly to support Palm/HP Pre and WebOS devices, don't turn it on if your phone can properly send cookies
  * **remember\_key\_expiration\_age** - This setting will keep users selecting "remember me" at login time logged in for approximately 300 days. If you run a tighter ship, consider changing this number - time denoted in seconds
  * **Scheduling your library scanning** Streeme uses a task to coordinate automated scans of your music library. The list of options will istruct streeme how to scan you library and in what order. Simply comment out the items you don't use and add in the ones that you do. You can read more about scheduling in a later step [located here](SchedulingStreeme.md).


---


in your\_streeme\_dir/config
  * rename cloudfusion.template.php cloudfusion.php
  * edit this file and follow the directions to register for an Amazon PAS account

---


open a commandline and type
<br />
`./symfony cc`
<br />
This command will clear symfony's cache and should be run whenever you change the yml  configuration files. If you get strange 500 errors, always try running this first.

**WINDOWS USERS** you can leave the "./" out of symfony commands
<br />
## Testing Your Installation ##

Now run the **config checker**. go to _your\_streeme\_dir_ and type
<br />
`php check_configuration.php`
<br />
if all went well, your install should show OK next to the parameters in the list.
<br />
## Initializing your Music Library ##

now type
<br />
`./symfony doctrine:build --all --and-load`
<br />

[Continue to Music Scanning >](MusicScanning.md)
<br />
<br />
<br />
<br />