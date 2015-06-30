# Introduction #

Now that you've done your first full music scan, you can begin retrieving Art for your albums and sets. Streeme has 3 scanners to help get the most artwork coverage for your music library. The amazon scanner will get high quality package art from the PAS (partner advertising services) system, tests so far seem to indicate it provides the best quality art. The Meta scanner is the second best scanner, it will copy artwork from ID3V2 MP3 files. The Folder scanner will scan any files containing the word cover or folder in the name.


# Scanning Amazon PAS #
In order to use this service, you must fill out the cloudfusion signup form in the config directory. This service uses Amazon's PAS API to discover album artwork.
<br />
`./symfony scan-art --source=amazon`
<br />

# Scanning ID3 Tags #
Scan your library for art embedded in the mp3 files
<br />
`./symfony scan-art --source=meta`
<br />

# Scanning Folders #
Scan your library for art embedded in the containing folders
<br />
`./symfony scan-art --source=folders`
<br />
<br />
[Continue to Adding Users >](AddingUsers.md)
<br />