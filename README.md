# Atom Chat

**Atom Chat** is a **free PHP chat script** with minimal bloat. Some optional extra features are provided by Java Script. Edit `/atomchat/inc/config.php` to match your environment. Next, register an account and have a look around. Edit `/atomchat/inc/banned.php` to configure a basic list of banned user names.

New messages appear top-down to minimise scrolling. The optional Push button manually refreshes the chatlog if either the browser does not support Java Script, and thus, the AJAX call would fail; or for mere convenience. Daily logs are stored in the `/atomchat/log/` folder. If you run into permission issues try making the following locations writable first: 
````
- /atomchat/log/
- /atomchat/inc/current.php
- /atomchat/inc/registered.php
````

Published under the terms of the GPL version 3 or later.

http://phclaus.com/php-scripts/atomchat/
