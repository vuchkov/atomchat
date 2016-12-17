<?php
//** init session
session_start();

//** load config
include ('./config.php');

//** link and encode user name and password
$ac_user = base64_encode($_POST['ac_user']);
$ac_pass = base64_encode($_POST['ac_pass']);

//** register
if (isset ($_POST['ac_register'])) {

  //** check empty values
  if (($ac_user != '') && 
      ($ac_pass != '')) {

    //** banned user name or already registered
    if ((strpos(file_get_contents($ac_ban), base64_decode($ac_user)) !== FALSE) || 
        (strpos(file_get_contents($ac_reg), base64_decode($ac_user)) !== FALSE)) {
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
  } else {
    //** return to login
    header("Location: $ac_dir");
    exit;    
  }
}

//** login
if (isset ($_POST['ac_login'])) {

  //** check banned user name
  if ((strpos(file_get_contents($ac_ban), $ac_user) !== FALSE)) {
    header("Location: $ac_dir");
    exit;
  }

  //** check if user name and password match
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
