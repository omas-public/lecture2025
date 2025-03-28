<?php // -*- coding: utf-8 -*-
$agent = $_SERVER[ "HTTP_USER_AGENT" ] ;
?>
<html lang="ja">
<head>
<title>I Like Netscape Agent</title>
<meta charset="utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h1>I Like Netscape Agent</h1>
<?php if ( preg_match( "/Netscape/i" , $agent ) ) : ?>
<h2>FLAG{I-Love-Nescape}</h2>
<?php else : ?>
<?php print htmlspecialchars( $agent ) ; ?>
<?php endif ; ?>
</body>
</html>
