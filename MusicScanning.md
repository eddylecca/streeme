# Introduction #

Now you've got the hard part done, it's time to scan your music and build a library. Currently there are two scanners - one will sync with your iTunes library and the other will scan the folders on your disks

# Scanning iTunes #

If you want to sync your iTunes library, run the following symfony command from the root of your streeme project:
<br />
`./symfony scan-media --type=itunes`
<br />
This script will open your itunes library backup file and copy all of the song information to your Streeme music library.

**Tip:** Scanning iTunes is a fairly memory hungry task at the moment. If  you're getting memory exhausted errors, try changing the memory limit in php.ini, restart apache and try again. As an example, 8500 songs takes up about 97MB of memory while running.


# Scanning the Filesystem #

if you don't use itunes, or just want to watch folders without having to add music to iTunes first, the second option is to run a filesystem scan:
<br />
`./symfony scan-media --type=filesystem`
<br />

# The Scanning process #
Running either command will take a few moments as Streeme syncs your music. At the end, you will be shown a report on how the scan went:

```
Total Songs Scanned: 6042
Songs Skipped: 120
Songs Added: 5922
Albums Added: 922
Artists Added: 862
Custom Genres Added: 45
Songs Removed: 0
Albums Removed: 0
Artists Removed: 0
Custom Genres Removed: 1
```

Future scans will be a lot faster as the database keeps a manifest of what has changed and   what's new or incoming.
<br />
[Continue to Album Art Scanning >](AlbumArtScanning.md)
<br />