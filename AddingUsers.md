# Introduction #

Before you fire up Streeme for the first time, you'll need to add user accounts. Set up an account per device you'd like to use with Streeme.

# Adding an Account #
To add an account, type:
<br />
`./symfony guard:create-user your_username your_password`
<br />

# Changing your Password #
To change your password, type:
<br />
`./symfony guard:change-password your_username your_new_password`
<br />

# It's Time to Make Some Noise! #
Now you've got an account, you can launch Streeme by opening Chrome or Safari and typing
in your\_ip\_address:your\_port/
eg http://127.0.0.1:8095

The login screen will come up, just enter your username and password and you're IN!
<br />

# Oops! I want to delete a user. How do I do that? #
Deleting a user is easy, just type:
`./symfony guard:delete-user your_username`
<br />
This change will take effect next time a user tries to login.
<br />

[Continue to Using Streeme Desktop >](UsingStreemeDesktop.md)
<br />
<br />