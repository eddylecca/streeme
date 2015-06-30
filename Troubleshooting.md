# Introduction #

If you have found something wrong with streeme, don't panic - Streeme is throughly tested on multiple platforms. Often times the only problem is in configuration. This troubleshooting guide can help you diagnose some common installation or known program issues. Always try this stuff first before submitting a bug.

# Upgrading issues #
### I see SQLSTATE erors in the error log after an upgrade ###
There's a good chance that your upgrade has taken you to a new minor version and has incoming database changes. Please follow the directions here to rebuild or migrate to the latest version of the database layout.

http://code.google.com/p/streeme/wiki/UpdateStreeme#Migrating_your_database_schema_between_minor_versions

# Setup issues #
### Why does it keep saying page not found? ###
### I get an error - Connection Refused ###
**Check that your ports are correct** - Streeme is set up so it won't interfere with other web services you might be running, so you will need to define two ports. The port numbers are set up in your [Apache configs](InstallingStreemeLinux#Apache_Configs.md) and [app.yml](InstallingStreeme#Configure_Streeme.md). If music doesn't play, it may just be that the music\_proxy\_port setting doesn't match up with whatever you used in Apache. Example: if you chose 8096 as your second port, update the music\_proxy\_port: setting in app/client/config/app.yml to match. You should use unique ports for your install, just to further obscure your private music server. If you change app.yml, type `./symfony cc` if you change the apache configs, restart apache before continuing.

### When in doubt, symfony cc ###
Symfony maintains an optimized cache forfaster execution, sometimes this cache is at fault for breaking the app, so always use `./symfony cc` before doing further troubleshooting.

### Help! Streeme is 'white screen of deathing!' ###
A white screen of death, the page you try to load is completely blank, usually means that Streeme has utterly **failed to load.** The easiest solution to this issue is to give read and write capabilities to the cache and log folder for the apache user and your user. **Cache, log and data need fairly wide permissions** and are the only writable folders in Streeme if you run a tight ship permission wise, consider using ACLs. Also double check that the configuration files are copied over as detailed in [this step](InstallingStreeme.md). If that doesn't seem to work, try going to the commandline and type:
```
cd /path/to/streeme
php check_configuration.php 
```
With any luck, you'll get a list of items that should all pass with "OK" - if not, track down the problematic test and try again.

**Try disabling APC.** Sometimes APC will fail to compile properly and may need to be recompiled or installed in a different way, either using the OS package manager or rebuilding from different sources. Once you've disabled apc, restart apache for the changes to take effect.

**Double check your apache configuration** and closely look at the paths you used for your virtual hosts. Any issues in paths will make the program malfunction.

Once the configuration checker is all OK, type `./symfony cc` and try to load the page again. Still not working, see desperate measures below.

### Streeme runs, but it won't let me login ###
If you've made a user and can't get past the first screen, or keep getting redirected to /login etc., it is likely that your Apache build is missing the **mod\_rewrite** module. You should be able to easily add this component from your list of available mods or rebuild apache with this functionality if you prefer to build from source.

### App runs, but won't show scanned album art ###
Check that HTTP\_Download is installed - this app is critical to all of Streeme's media serving functionality. If HTTP\_Download is installed and you still can't see album art, then make sure that your permissions allow Apache to read from data/album\_art and that log is writable by apache and the cli.

Also note that the full log of the execution path will log to log/proxy.log - you may be able to diagnose the problem using that log file. If the log file doesn't exist, you may have other issues, see desperate measures

### App runs, but music won't play ###
### App runs, but when I click play, it just cycles through all the songs ###
Keep in mind that browsers may not have full codec support for MP3 and OGG. While the Streeme team tests the app widely for compatibility, you may find some formats simply won't play back in your favorite browser. Some open source brosers may need audio functionality/ffmpeg added before they will play anything back.

If the browser's not the issue; again, check that HTTP\_Download is installed - this app is critical to all of Streeme's media serving functionality. If HTTP\_Download is installed and you still can't hear audio, then make sure that your permissions allow Apache to read from your music directories and that log is writable by apache and the cli.

The port numbers are set up in your apache configs and app.yml. If music doesn't play, it may just be that the music\_proxy\_port setting doesn't match up with whatever you used in Apache. Example: if you chose 8096 as your second port, update the music\_proxy\_port: setting in app/client/config/app.yml to match. If you change app.yml, type `./symfony cc` if you change the apache configs, restart apache before continuing.

Make sure that you open these ports on your router as well. Most routers  firewall anonymous traffic from the internet simply because they have no route for it. You must explicitly open the ports (default are 8095 and 8096) in the port forwarding menu on your router. Symptoms of this problem are easiest to detect by watching the proxy.log file. If you don't see anything ending up in the latest logs, chances are that your ports are not connectable.

Also note that the full log of the execution path will log to log/proxy.log - you may be able to diagnose the problem using that log file. If the log file doesn't exist, you may have other issues (ports or php errors), see desperate measures

### Desperate Measures ###
Here's an annoying scenario to be in. By default, Streeme is quite secretive about its errors in production. Depending how broken your installation happens to be, you may want to start from square one. If your installation seems fine, but Streeme is still not behaving, it's time to pull out the big guns and do some sleuthing of your own.

**Testing Streeme**

First action should be to enable errors in Apache add this to your httpd.conf and restart Apache.
```
log_errors = On
error_log = "/path/to/php_error.log"
```
now when an error occurs, it should end up in your php\_error.log

Second, try using the client\_dev.php tool - this will enable a dev environment for Streeme, so you can inspect what's going on in plain english. To use the client\_dev tool, copy web/client\_dev.template.php to client\_dev.php and uncomment:
```
require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');
$configuration = ProjectConfiguration::getApplicationConfiguration('client', 'dev', true);
sfContext::createInstance($configuration)->dispatch();
```
Now you should be able to go to http://your_ip:8095/client_dev.php - navigate the site like you normally would and see if you can get the error to trigger.

Third, try the tests. Streeme has an automated test suite that can help point you to problems when you don't know what's precisely failed - these tests are designed to pass, so if they're failing, something is definitely going on with your installation. This tool should give you an idea where to look.

to run the tests set up a test database:

_config/databases.yml_
```
test:
  doctrine:
    class: sfDoctrineDatabase
    param:
      dsn: 'mysql:host=localhost;dbname=streemetest'
      username: your_username
      password: your_pass
      encoding: utf8
      attributes:
        default_table_collate: utf8_general_ci
        default_table_charset: utf8
```

then type:

```
./symfony cc
```

then run the tests:

```
./symfony test:all
```

all information you discover in this stage will be helpful for generating any bug reports.

**Make sure to revert all of the changes you have made to Apache and client\_dev.php to keep your installtion secure**

# Submitting a bug #
With the information you've gathered above, it will be a lot easier for the team to track down your specific problem. Submitting a bug is done in the [Issue Tracker](http://code.google.com/p/streeme/issues/list). Just follow the template.