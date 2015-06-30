# How to Update (Stable) #

### Windows/TortoiseSVN ###

To update with TortoiseSVN, just right click on the Streeme folder and click SVN Update. Once the update is finished, open a command terminal and type symfony cc in your streeme directory.



### Linux/OSX ###
The Streeme project releases new patches and updates regularly. To take advantage of these new features and fixes, type the following:

```
svn up
./symfony cc
```

et voila! You're up to date.

### Testing Patches and Feature Branches ###

If you are watching the program commits, you may see messages about a feature that interests you in progress. You can always switch to a branch to see what's happening in the project (a warning though, the code in branches is under development and may not work properly). You can usually ask about the patch on our google group @ http://groups.google.com/group/streeme

```
svn switch ^/branches/dev_branch_name
./symfony cc
```

and back again

```
svn switch ^/trunk
./symfony cc
```


### Migrating your database schema between minor versions ###

If you plan to move between minor versions - eg(0.4.x -> 0.5.x), usually there will be incoming database changes between them. You may see errrors in the error log with SQLSTATE after the upgrade. You have a couple of options to update your database where possible.

**Start fresh** (Recommended):
The least technical way to upgrade is to just start fresh and rescan your music. There's a good chance that the changes made to the Database will cause some data loss due to table moving or changing relationships and music scan is easy to reporoduce. In this case, you may run the following command to factory reset your db.

```
./symfony cc
./symfony doctrine:build --all --and-load
./symfony cc
```

**Migrate** (Expert Users):
If your database is huge and it might be better just to see if there's a way to keep your data/playlists intact, you can perform a migration. This will try to take a snapshot of your old database and match it up to the new version's image. You'll likely have to rescan your music once it's done to fill in any blanks.

```
./symfony cc 
./symfony doctrine:generate-migrations-diff
./symfony doctrine:migrate
./symfony doctrine:build --all-classes
./symfony cc
```

Thanks for keeping up to date!