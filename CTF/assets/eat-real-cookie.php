<?php // -*- coding: utf-8 -*-
if ( !isset( $_COOKIE[ "COOKIE" ] ) ) {
    // クッキーを発行
    setcookie( "COOKIE" , "FAKE" ) ;
    header( "location: eat-real-cookie.php" ) ;
    exit() ;
  }
?>
<html>
  <head>
    <title>eat-real-cookie</title>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  </head>
  <body>
    <h1>eat-real-cookie</h1>
    <?php if ( $_COOKIE[ "COOKIE" ] == "FAKE" ) : ?>
      本当のクッキーを食べたい！
    <?php else : ?>
      FLAG{EatRealCookie}
    <?php endif ; ?>
  </body>
</html>

<!-- Local Variables: -->
<!-- mode: php -->
<!-- End: -->
