<?php
//** script folder and protocol
$ac_dir = "/chat/";
$ac_pro = "http://";

//** internals
$ac_dom = $_SERVER['HTTP_HOST'];
$ac_www = $ac_pro . $ac_dom;
$ac_doc = $_SERVER['DOCUMENT_ROOT'];

//** check log folder
if (!is_dir($ac_doc . $ac_dir . "log")) {
  mkdir($ac_doc . $ac_dir . "log");
}

//** files and folders
$ac_inc = $ac_dir . "inc/";
$ac_hdr = $ac_doc . $ac_inc . "header.php";
$ac_ftr = $ac_doc . $ac_inc . "footer.php";
$ac_reg = $ac_doc . $ac_inc . "registered.php";
$ac_ban = $ac_doc . $ac_inc . "banned.php";
$ac_cur = $ac_doc . $ac_inc . "current.php";
$ac_chm = $ac_dir. "chat.php";
$ac_chp = $ac_inc . "chat_page.php";
$ac_chf = $ac_inc . "chat_form.php";
$ac_dat = "log/" . date('Ymd') . ".html";
$ac_log = $ac_doc . $ac_dir . $ac_dat;
$ac_nip = $ac_inc . "init_page.php";
$ac_nif = $ac_inc . "init_form.php";

//** users online plural
if (file_get_contents($ac_cur) !== 1) {
  $ac_uop = "s";
} else {
  $ac_uop = "";
}

//** script version
$ac_ver = 20170519;
