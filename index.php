<?php
//** init session
session_start();

//** load config
include ('./inc/config.php');

//** expire session after 5 minutes
if (isset ($_SESSION['ac_time'])) {
  $ac_dif = (300-(time()-$_SESSION['ac_time']));

  if ($ac_dif <= 0) {
    //** clear session
    unset ($_SESSION['ac_time']);
    unset ($_SESSION['ac_user']);

    //** update users online counter
    $ac_on_cur = file_get_contents($ac_cur);
    $ac_on_val = $ac_on_cur;

    if ($ac_on_val <1) {
      $ac_on_cur = 0;
    } else {
      $ac_on_cur = ($ac_on_val-1);
    }

    file_put_contents($ac_cur, $ac_on_cur);

    //** load interface
    header("Location: $ac_chm");
    exit;
  }
} else {
  $_SESSION['ac_time'] = time();
}
?>
<!DOCTYPE html>
<html lang="en-GB">
  <head>
    <title>Atom Chat Login</title>
    <meta charset="UTF-8" />
    <meta name="language" content="en-GB" />
    <meta name="description" content="Atom Chat free PHP chat script" />
    <meta name="keywords" content="Atom Chat" />
    <meta name="robots" content="noodp, noydir" />
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1" />
    <link rel="shortcut icon" href="<?php echo $ac_www . $ac_dir; ?>favicon.png" type="image/png" />
    <link rel="stylesheet" href="<?php echo $ac_www . $ac_inc; ?>style.css" type="text/css" />
  </head>
  <body>
<?php include ($ac_hdr); ?>
    <object data="<?php echo $ac_www . $ac_nip; ?>" type="text/html">Failed to render object data!</object>
    <div id="ac_menu">
      <form action="<?php echo $ac_www . $ac_nif; ?>" method="POST" id="ac_login">
        <div>
          <label for="ac_user">User</label>
          <input type="text" name="ac_user" id="ac_user" maxlength="16" title="Please enter your user name" />
        </div>
        <div>
          <label for="ac_pass">Pass</label>
          <input type="password" name="ac_pass" id="ac_pass" maxlength="16" title="Please enter your password" />
        </div>
        <div>
          <input type="submit" name="ac_login" value="Login" title="Click here to login" />
        </div>
      </form>
<?php include ($ac_ftr); ?>
    </div>
  </body>
</html>
