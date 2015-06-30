# Windows using Tortoise SVN #

![http://farm6.static.flickr.com/5169/5250859580_fd18cea55b_o.jpg](http://farm6.static.flickr.com/5169/5250859580_fd18cea55b_o.jpg)

Please read the following tutorial and get to know tortoise SVN  - it will show you the basics of checking out and updating.

[Using TortoiseSVN to check out files from Google Code repositories](http://cjcat.blogspot.com/2009/06/using-tortoisesvn-to-check-out-files.html#6950097685236424422)

the "URL of Repository" when used with tortoise is:

`https://streeme.googlecode.com/svn/trunk/`

Wherever you set the folder in step 2, make sure that your Apache configs know the directory name in the virtual host entries! For example, I store mine in D:/web/streeme.

Once downloaded, please continue with the [Installing Streeme Tutorial](InstallingStreeme.md)

# Linux/Unix #

Checking out svn on linux/osx is amazingly easy. Create a streeme folder in your /Users/your\_username/Sites/ or ~/sites/ folder.

then run something like
```
notroot@ubuntu:~/sites$ mkdir streeme
notroot@ubuntu:~/sites$ cd streeme
notroot@ubuntu:~/sites/streeme$ svn checkout http://streeme.googlecode.com/svn/trunk .
```

It should checkout a bunch of stuff and you're ready to go!

if you need to update later, just enter your streeme directory and type

```
svn up
```