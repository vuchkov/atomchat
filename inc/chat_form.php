<?php
session_start();

include ('./config.php');

//** save current chat log
if (isset ($_POST['ac_save'])) {
  header('Content-type: text/html');
  header('Content-Disposition: attachment; filename="atomchat_' . $ac_dat . '"');
  readfile($ac_www . $ac_dir . $ac_dat);
  exit;
}

//** quit current session
if (isset ($_POST['ac_quit'])) {

  //** clear session
  unset ($_SESSION['ac_chat']);

  //** update users online counter
  $ac_on_cur = file_get_contents($ac_cur);
  $ac_on_val = $ac_on_cur;
  $ac_on_cur = ($ac_on_val -1);
  file_put_contents($ac_cur, $ac_on_cur);

  //** return to login
  header("Location: $ac_dir");
  exit;
}

//** force manual update
if (isset ($_POST['ac_push'])) {
    header("Location: $ac_chm");
    exit;
}

//** process new entry
if (isset ($_POST['ac_post'])) {

  $ac_user = $_POST['ac_user'];
  $ac_text = filter_var($_POST['ac_text'], FILTER_SANITIZE_SPECIAL_CHARS);
  $ac_host = gethostbyaddr($_SERVER['REMOTE_ADDR']);

  //** skip empty post
  if (($ac_user == '') || ($ac_text == '')) {
    header("Location: $ac_chm");
    exit;
  } else {
    //** decode user name
    $ac_user = base64_decode($ac_user);

    //** link icon and stylesheet for offline reading
    if (!is_file($ac_log)) {
      $ac_link  = '<link rel="shortcut icon" href="' . $ac_www . $ac_dir . 'favicon.png" type="image/png">' . "\n";
      $ac_link .= '<link rel="stylesheet" href="' . $ac_www . $ac_inc . 'style.css" type="text/css">' . "\n";
      file_put_contents($ac_log, $ac_link);
    }

    //** save post to data file
    $ac_text  = "<div id=\"". $ac_host . "_" . gmdate('Ymd-His') . "_" . $ac_user . "\" class=\"ac_text\">\n  <p class=\"ac_head\">" . gmdate('Y-m-d H:i:s') . " " . $ac_user . "</p>\n  <p>" . $ac_text . "</p>\n</div>\n";
    $ac_text .= file_get_contents($ac_log);
    file_put_contents($ac_log, $ac_text);

    //** refresh chat log
    header("Location: $ac_chm");
    exit;
  }
}
