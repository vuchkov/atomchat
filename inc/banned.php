<?php
//** deny direct access
$ac_dat = 'n';

if ($ac_dat == 'n') {
  header('Location: ../');
  exit;
}
//** add banned names below
?>
admin
administrator
moderator
root
webmaster
