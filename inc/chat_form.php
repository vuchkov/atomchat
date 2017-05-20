<?php
//** init session
session_start();

//** load config
include ('./config.php');

//** save data file
if (isset ($_POST['ac_save'])) {
  header('Content-type: text/html');
  header('Content-Disposition: attachment; filename="atomchat_' . $ac_dat . '"');
  readfile($ac_www . $ac_dir . $ac_dat);
  exit;
}

//** quit session
if (isset ($_POST['ac_quit'])) {

  //** clear session
  unset ($_SESSION['ac_time']);
  unset ($_SESSION['ac_user']);

  //** update users online counter and return to login
  $ac_on_cur = file_get_contents($ac_cur);
  $ac_on_val = $ac_on_cur;

  if ($ac_on_val <1) {
    $ac_on_cur = 0;
  } else {
    $ac_on_cur = ($ac_on_val-1);
  }

  file_put_contents($ac_cur, $ac_on_cur);
  header("Location: $ac_dir");
  exit;
}

//** manual update
if (isset ($_POST['ac_push'])) {
  header("Location: $ac_chm");
  exit;
}

//** process new entry
if (isset ($_POST['ac_post'])) {
  $ac_user = htmlentities($_POST['ac_user'], ENT_QUOTES, "UTF-8");
  $ac_text = filter_var($_POST['ac_text'], FILTER_SANITIZE_SPECIAL_CHARS);
  $ac_host = gethostbyaddr($_SERVER['REMOTE_ADDR']);

  //** skip empty post
  if ($ac_user === "" || $ac_text === "") {
    header("Location: $ac_chm");
    exit;
  } else {
    //** link icon and stylesheet for offline reading
    if (!is_file($ac_log)) {
      $ac_link  = '<link rel=icon href="' . $ac_www . $ac_dir . 'favicon.png" type="image/png"/>' . "\n";
      $ac_link .= '<link rel=stylesheet href="' . $ac_www . $ac_inc . 'style.css" type="text/css"/>' . "\n";
      file_put_contents($ac_log, $ac_link);
    }

    //** save post and refresh data file
    $ac_text  = '<div id=' . $ac_host . '_' . gmdate('Ymd-His') . '_' . $ac_user . ' class=ac_text>' . "\n" . 
                '  <p class=ac_head>' . gmdate('Y-m-d H:i:s') . " " . $ac_user . "</p>\n" . 
                '  <p class=ac_data>' . $ac_text . "</p>\n" . 
                "</div>\n";
    $ac_text .= file_get_contents($ac_log);
    file_put_contents($ac_log, $ac_text);
    header("Location: $ac_chm");
    exit;
  }
}
