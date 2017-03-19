<?php
/*
 * banned names
 *
 * regex matches anything beginning with $string
 *
 * $string will match string, stringfoo
 * but not mystring, mystringfoo
 */
$ac_nono = array (
                  preg_match('/\Badmin(.+?)\B/', $ac_user),
                  preg_match('/\Bass(.+?)\B/', $ac_user),
                  preg_match('/\Bcunt(.+?)\B/', $ac_user),
                  preg_match('/\Bdick(.+?)\B/', $ac_user),
                  preg_match('/\Bfuck(.+?)\B/', $ac_user),
                  preg_match('/\Bmoderat(.+?)\B/', $ac_user),
                  preg_match('/\Bpiss(.+?)\B/', $ac_user),
                  preg_match('/\Broot(.+?)\B/', $ac_user),
                  preg_match('/\Bsuck(.+?)\B/', $ac_user),
                  preg_match('/\Btest(.+?)\B/', $ac_user),
                  preg_match('/\Bwebmas(.+?)\B/', $ac_user),
                 );
