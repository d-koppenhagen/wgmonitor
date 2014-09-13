infoscreen
==========

## About ##
This project is a WebApp for an infoscreen using on a Radxa Rock + Touchscreen.

## Freatures ##
- Departure Monitor for Tram (EasyGo)
- Weather- and News-Toolbar
- Gallery
- Shopping List
- Guestbook
- Calendar
- Postillon News (Satire)

## Configuration ##
- move files from the folder 'Common.example' to 'Common'
- edit the Config files
- 'dbConfig.php' :
      * contains the database configuration for using a mysql-databes (guestbook)

- copy '/js/wlanconfig.example.js' to '/js/wlanconfig.js' or just rename the file:
      * contains the WLAN name and Password for displaying at the screen
      * contains ip adress for building the qr code to get access to the image folder

### Using the image gallery ###
- just create a new folder wih the name 'gallery'
- create a new folder 'thumbs' in the "gallery" folder
- insert pictures (into 'gallery') and thumbs (into 'gallery/thumbs') (for each thumb the same name like the picture-name)

## How it looks like? ##
- a preview of the project is available on: http://1111101.eu/
![alt tag](http://www.doerki.com/img/infoscreen/pic01.JPG)
![alt tag](http://www.doerki.com/img/infoscreen/pic02.JPG)
![alt tag](http://www.doerki.com/img/infoscreen/pic03.JPG)
![alt tag](http://www.doerki.com/img/infoscreen/pic04.JPG)

