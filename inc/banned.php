<?php
//** load config
include ('./config.php');

//** deny direct access
if (($_SERVER['HTTP_REFERER'] == '') || 
    ($_SERVER['HTTP_HOST'] != $ac_dom)) {
  header("Location: ../");
  exit;
}

//** basic list of banned names -- better use some regex voodoo
?>
admin
ass
asshole
bitch
bullshit
cunt
dickhead
fuck
fuckall
fucker
fuckoff
fuckthis
fuckshit
fuckyou
moderator
piss
pisser
pussy
root
shit
staff
suck
sucker
webmaster
