<?php
//** deny direct access
$ac_dat = 1;

if ($ac_dat === 1) {
  header("Location: ../");
  exit;
}
//** add banned names below
?>
admin
administrator
moderator
root
webmaster
