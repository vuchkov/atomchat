# Atom Chat

**Atom Chat** is a **free PHP chat script** with minimal bloat. Some optional features are provided by Java Script. Edit `inc/config.php` to set the script's folder and `inc/banned.php` to configure banned user names. Point your browser to the URL and login as user `test` with password `test` to have a look around.

New messages appear top-down to minimise scrolling. The optional _Push_ button manually refreshes the chatlog if the browser doesn't support Java Script; or for mere convenience. Daily logs are stored in the `log/` folder. If you run into permission issues make sure the following locations have write access: 
````
- log/
- inc/current.php
- inc/registered.php
````

[Script homepage](http://phclaus.com/php-scripts/atomchat/)
