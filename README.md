# Atom Chat

Atom Chat is a simple PHP chat script with minimal bloat. Some extra features are provided by Java Script, but it works fine without. Edit `/atomchat/inc/config.php` to match your environment. Next, register an account and have a look around. You can manage a list of banned user names in `/atomchat/inc/banned.php` to deny access.

New messages appear top-down to minimise scrolling. The optional Push button manually refreshes the chat log if either the browser does not support Java Script, and thus, the AJAX call would fail; or for mere convenience. Daily chat logs are stored in the `/atomchat/log/` folder. In rare cases you may need to manually chmod the following locations to be writable: 
````
- /atomchat/log/
- /atomchat/inc/current.php
- /atomchat/inc/registered.php
````

Published under the terms of the GPL version 3 or later.

http://phclaus.eu.org/php-scripts/atomchat/
