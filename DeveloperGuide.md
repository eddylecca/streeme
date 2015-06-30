# Introduction #

### Contributing Code ###

If you want to contribute code to Streeme, there are a few things you can do to make the process flow smoothly.

Whether you're writing a new feature or fixing an existing bug, it pays to get a second opinion before you get too far. If it's a new feature idea, post to the [Streeme discussion group](https://groups.google.com/group/streeme) and propose it.

Not all bugs in our bug system are assigned, but if the one you're interested in fixing is, send a note to the person it's assigned to and ask if they would like a patch.

Behavior changes and anything nontrivial (i.e. anything other than simple cleanups and style fixes) should generally be tracked in the bug system. Please [file a bug](http://code.google.com/p/streeme/issues/list) and describe what you're doing if there isn't one already.

### Get your code ready ###

  * Code must conform to the [Symfony Style Guidelines](http://trac.symfony-project.org/wiki/HowToContributeToSymfony#CodingStandards): when in doubt, look at the examples in the lib/vendor/symfony dir.
  * Source changes should be a reasonable size to review. Giant patches are unlikely to get reviewed quickly, so please do your work in small doses.
  * Use classes and dependency injection whenever possible
  * Streeme is a TDD environment. Please test your code before submission. When changing model classes and helper classes, run the unit tests on Postgres, sqllite and mysql data stores to make sure you haven't broken anything. Unit tests can easily be run by typing
```
./symfony test:unit 
```
  * if you are making non trivial javascript commits, please test your changes as widely as you can:

Streeme should be tested for:
  * **Desktop**
```
    OSX( Chrome, Safari, Firefox)
    WIN( Chrome, Safari, Opera, IEb9 and Firefox)
    iPad
    Linux( Firefox, Chrome )
```

  * **mobile**
```
    iPad
    iPhone (OS 4.x+)
    iPod Touch (OS 4.x+)
    Palm Pre( 1.4 series )
    Android( 2.2+ )
```

### Source Control ###

https://github.com/chaffneue/streeme

Mind your manners. Please use detailed commit messages (at least 1 sentence describing the changes you've applied). Once you're happy with a patch, please submit a pull request to the project and add a thread to the [Streeme discussion group](https://groups.google.com/group/streeme) if the patch touches more than about 3 or 4 files, so we can plan how to integrate it.

Please do not submit patches concerning: removal of security measures from Streeme, adding untested third party libraries to the project, personalized code or graphics, personal config files.

always remember to check your commits carefully for accidental deletions (eg. .gitplaceholderfile ) and unintended commits of the model dirs.

**The SVN repository is only for distribution. all developers, please submit patches through github only.**

### Source Editors ###

Whatever your editor, there are a few settings that are important to editing source files in Streeme:
```
tab key inserts 2 spaces
default encoding: UTF8
documentation style is Javadoc
```

### Language Contributions ###

Any user may contribute a language pack - please generate an i18n language module for your language group using the following symfony command where xx is the lower case [ISO-639-1 language code](http://en.wikipedia.org/wiki/List_of_ISO_639-1_codes). The following command will build all of the tokens to translate and build a XLIFF file. The file can be opened and edited in the apps/client/i18n folder.

```
./symfony i18n:extract client xx --auto-save
```

Like other static configuration files in Symfony, whenever you make a change to a token in an XLIFF file in symfony, you'll need to clear the cache

```
./symfony cc
```

To add your translations, replace the `<target/>` tags with `<target>Your Translation</target>`. If you spot a bug in a translation, please fix it in place and follow the steps below to submit it. You'll need to update your setting.yml file to add your translation to the allowed languages list. Once you're happy with your translation please attach the XLIFF file to an [issue ticket](http://code.google.com/p/streeme/issues/entry?summary=Language%20Pack%20Ready) and a committer will integrate it into the project.
Users contributing language packs to the project will be recognized in the contributors list. If you're testing a language pack and for some reason it fails to load, please **double check the XML is well formed** - Symfony will not warn you by default.

(some portions of this doc are borrowed from the chromium specs)