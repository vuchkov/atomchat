<?php
//** init session
session_start();

//** load config
include ('./config.php');

//** link name and password
$ac_user = $_POST['ac_user'];
$ac_pass = $_POST['ac_pass'];

//** register
if (isset ($_POST['ac_register'])) {

  //** check empty name and password
  if (($ac_user == '') || ($ac_pass == '')) {
    header("Location: $ac_dir");
    exit;
  } else {

    //** link banned names data file
    include ('./banned.php');

    //** check if name is banned or already registered
    if ((in_array($ac_user, $ac_nono)) ||
        (strpos(file_get_contents($ac_reg), $ac_user) !== false)) {
      header("Location: $ac_dir");
      exit;
    } else {
      //** add new user to data file
      $ac_reg_new = $ac_user . '|' . $ac_pass . "\n";
      file_put_contents($ac_reg, $ac_reg_new, FILE_APPEND);

      //** init session
      $_SESSION['ac_user'] = $ac_user;
      $_SESSION['ac_time'] = time();

      //** update users online counter and load chat
      $ac_on_cur = file_get_contents($ac_cur);
      $ac_on_val = $ac_on_cur;
      $ac_on_cur = ($ac_on_val + 1);
      file_put_contents($ac_cur, $ac_on_cur);
      header("Location: $ac_chm");
      exit;
    }
  }
}

//** login
if (isset ($_POST['ac_login'])) {

  //** check empty name and password
  if (($ac_user == '') || ($ac_pass == '')) {
    header("Location: $ac_dir");
    exit;
  } else {

    //** check if name is banned
    if (in_array($ac_user, $ac_nono)) {
      header("Location: $ac_dir");
      exit;
    }

    //** check if name and password match
    if ((strpos(file_get_contents($ac_reg), $ac_user) !== FALSE) &&
        (strpos(file_get_contents($ac_reg), $ac_pass) !== FALSE)) {

      //** init session
      $_SESSION['ac_time'] = time();
      $_SESSION['ac_user'] = $ac_user;

      //** update users online counter and load chat
      $ac_on_cur = file_get_contents($ac_cur);
      $ac_on_val = $ac_on_cur;
      $ac_on_cur = ($ac_on_val + 1);
      file_put_contents($ac_cur, $ac_on_cur);
      header("Location: $ac_chm");
      exit;
    } else {
      //** no match -- back to login
      header("Location: $ac_dir");
      exit;
    }
  }
}
