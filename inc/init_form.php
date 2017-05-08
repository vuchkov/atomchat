<?php
//** init session
session_start();

//** load config
include ('./config.php');

//** link name and password
$ac_user = htmlentities($_POST['ac_user'], ENT_QUOTES, "UTF-8");
$ac_pass = htmlentities($_POST['ac_pass'], ENT_QUOTES, "UTF-8");

//** login
if (isset ($_POST['ac_login'])) {
  //** check empty name and password
  if ($ac_user === "" || $ac_pass === "") {
    header("Location: $ac_dir");
    exit;
  } else {
    //** check if name and password match
    if (strpos(file_get_contents($ac_reg), $ac_user) !== FALSE && 
        strpos(file_get_contents($ac_reg), $ac_pass) !== FALSE) {
    } else {
      //** check banned name
      if (stripos(file_get_contents($ac_ban), $ac_user) !== FALSE) {
        header("Location: $ac_dir");
        exit;
      } else {
      //** add new user to data file
        $ac_reg_new = "$ac_user|$ac_pass\n";
        file_put_contents($ac_reg, $ac_reg_new, FILE_APPEND);
      }
    }
    //** flag valid login
    $ac_login = 1;
  }

  //** check valid login
  if ($ac_login === 1) {
    //** init session
    $_SESSION['ac_time'] = time();
    $_SESSION['ac_user'] = $ac_user;
    //** update users online counter and load chat
    $ac_on_cur = file_get_contents($ac_cur);
    $ac_on_val = $ac_on_cur;
    $ac_on_cur = ($ac_on_val+1);
    file_put_contents($ac_cur, $ac_on_cur);
    header("Location: $ac_chm");
    exit;  
  } else {
    //** no match -- back to login
    header("Location: $ac_dir");
    exit;
  }
}
