# Introduction #

This project features a premade virtual appliance for Vmware that significantly reduces the time to install Streeme while suporting most of Streeme's core features. This manual covers the steps you need to take to install Streeme Home Server on any Windows or Vmware compatible linux distribution. Streeme Home Server is not compatible with OSX yet, so please follow [The Mac Install Guide](InstallingStreemeMac.md). If you use bootcamp, you can evaluate streeme on your Windows partition before installing more permanently.

# Streeme Home Server #

### Bundled Features ###
  * Filesystem media scanning using Windows File Sharing or SMB on your NAS
  * Comprehensive art scanning - use Amazon PAS, id3 tags and
  * Fully bridges to your network for use anywhere
  * Preconfigured and ready to go - just add permissions and music.

### Requirements ###
  * 1GB RAM
  * 1GB HD space
  * 1GHz or greater PC
  * Windows XP or "better" and many popular linuxes
  * [vmware player software](http://www.vmware.com/products/player/)
  * A computer you can leave on

# Installing Streeme Home Server #

**Step One**
  * [Get a copy of vmware player - free download](http://www.vmware.com/products/player/)
<br />
**Step Two**
  * Download the [Streeme Home Server Virtual Appliance](https://sourceforge.net/projects/streeme/files) and unzip it using [7zip](http://www.7-zip.org/) to somewhere safe
```
Streeme Home Server V.0.4.2 MD5: 479ea2e7946a8a698ddd065e65637363
```
<br />
**Step Three**

  * Double click or load `Streeme Home Server.vmx` in vmware player and hit start - when prompted, say you "copied it" and the appliance will boot to a login screen.
```
login: notroot
password: streeme
```

  * Once you gain access, immediately type:
```
sudo passwd notroot
```

  * **Now choose a new password for your server** - make it over 12 characters, mix in a number and change the case.
  * Now things are a bit more secure, get an IP address assigned to your new server
```
sudo dhclient -r
sudo dhclient
```
  * Take note of the dhpack and bound ip addresses. they should match and that will be how you can access your server in your house. eg. http://192.168.1.111:8095
<br />
**Step Four**

  * Mount your music drive

```
 sudo mount -t smbfs //your_media_pc_ip_address/your_folder/ /home/notroot/music -o username=Guest,password=
```

  * your\_media\_pc\_ip\_address - The IP address of your media pc or Network attached storage
  * your\_folder - the folder where you store your music
  * username=Guest is the default, but if your share requires a username, put it here
  * password=  the password is empty by default, but if you need to use a password enter it here
  * **please make sure your music shared drive in in read only mode for guests**

example
```
sudo mount -t smbfs "//192.168.1.105/Music/iTunes/iTunes Media" /home/notroot/music -o username=sillyme,password=$ecret
```

  * If you'd like to mount a drive permanently, so it always reappears after shutdown, please follow [this guide](https://wiki.ubuntu.com/MountWindowsSharesPermanently)
<br />
**Last Steps!**

Run these commands in order to upgrade and initialize streeme

```
cd /home/notroot/sites/streeme
svn update
./symfony doctrine:build --all --and-load
```

Now add your streeme users - do this for each of the devices (your phone, office, gym.. you name it) that will attach to your home server install

```
./symfony guard:create-user your_username your_password
```

Once you're done, clear the cache to add all the edits items you've just made

```
./symfony cc
```

Now Scan your music!

```
./symfony scan-media --type=filesystem 
```

For info on art scanning, please read the [Album Art Scanning wiki](AlbumArtScanning.md)

If you use a router, please read the [Connecting Streeme Wiki](ConnectingStreeme.md)

For info on scanning on a schedule [Read the scheduling wiki](http://code.google.com/p/streeme/wiki/SchedulingStreeme#Scheduling_on_OSX,_Unix_and_Linux)

To discover your Streeme Home Server IP from the commandline, type:
```
curl whatismyip.org
```