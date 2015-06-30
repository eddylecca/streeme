# Introduction #

Once you get the hang of how to install and use streeme, it's time to leave the house - with your music! You'll need to configure your home router and change your firewall settings a bit to allow this and you'll need to discover your external IP address. Please follow this guide to make your music collection available on the Internet.


### Configuring your Firewall ###

#### Windows ####
When you start Apache with your Streeeme configurations, windows will prompt you to allow the application access for the specfic ports it needs. Simply allow apache to make the modifications to your Windows Firewall. The other option is to simply kill Windows firewall by stopping the service, though it opens your computer to higher risk.

#### Mac ####
Firewalls are turned off on Snow Leopard by default. If you have enabled a software firewall, please allow the ports you chose for Streeme to communicate.

#### Linux ####
Ubuntu may or may not have a firewall to start with.. here's a helpful guide to learn how to adjust your firewall settings in ubuntu https://help.ubuntu.com/6.06/ubuntu/serverguide/C/firewall-configuration.html


### Discovering your IP ###
Go Here and memorize the IP address it shows, this is your public IP for outside your house/office<br />
[What is My IP?](http://www.whatismyip.com)
<br />
To access your collection while outside or while on a cellular data plan, use this IP and your first port in your apache config. example http://27.34.109.168:8095

### Configuring Your Router ###
The easiest way to allow communication with Streeme is to Port Forward like you would do for game servers, VPNs  and other products that require access to home computers. Have a look at the documentation on your router for how to port forward TCP packets. You'll want to add your Apache ports to  the list of forwarded ports and you should make sure that it forwards to the right computer on your network. Here's an example:

![http://farm6.static.flickr.com/5252/5472459321_2895689784_o.jpg](http://farm6.static.flickr.com/5252/5472459321_2895689784_o.jpg)

# Conclusion #
Thanks for following this guide. this is the last part of the tutorial. If you have further questions, please check the help guides in the [Help Wiki](http://code.google.com/p/streeme/w/list?can=2&q=label=Help&colspec=PageName%20Summary%20Changed%20ChangedBy)

# Troubleshooting #
If you're having trouble getting Streeme up and running, hop over to the [Troubleshooting Page](Troubleshooting.md) for next steps.