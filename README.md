#Meatmaps
###About
Meatmaps is still in development. Should you decide to setup your own instance please check this repository regularly for updates. 

###Bugs
Please report any errors to Jordan Wright / @JordanLeft.

###Known Issues
* Meatcubes in the exact same location overlap each other
* Counter needed over Meatcube clusters

###Future Enchancements
* Allow users to create and administer "Meatups"
* Add "Meatups" location to meatmaps
* Users can change Passwords

###Requirements
* PHP 5.5.3 or Higher
* MySQL Database
* Twitter apps account (apps.twitter.com) to enable Signin with twitter

###Twitter oAuth / HybridAuth Lib
You will need to create a twitter application for your instance. To do this, login to apps.twitter.com and create a new application. The application only needs **read only access**. Insert the API Key and API Secret into line 59 of the hybridauth config file in /core/ directory. If you'd rather not use twitter signin, change line 58 of the same file to "false".

###Installation
* Download and unzip this repo
* Set your servers root directory to the root of this folder
* Modify and rename /core/config.*.php files
* Start server
