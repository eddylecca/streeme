# Introduction #

If you have a library of music you'd like to upload to a secure shared server or VPS, you will likely have to weigh a few considerations before you proceed. Streeme has the ability to use a good deal of CPU and memory for transcoding activities, which may raise eyebrows at your hosting provider - this app was meant to be run on a VM.

### What you'll need to square away ###

Streeme has some basic requirements to get started:
  * Ensure you have the [minimum system and software requirements](StreemeMinimumRequirements.md)
  * Shell access with SSH (it is possible to [install on non ssh](http://trac.symfony-project.org/wiki/InstallingSymfonyOnSharedHostNoSsh), but god help you). Sudo is a big plus.
  * You'll need to provision about 5-10MB of database space if your database is really limited, you can use SQLite.
  * Linux hosting provider

### Deploying Streeme ###
On many shared hosts, Apache's virtual host information is controlled in a separate control panel. You'll want to redirect your URL to the web folder in your project.