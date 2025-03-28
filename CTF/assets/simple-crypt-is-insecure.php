<?php // -*- coding: utf-8 -*-
$pw = isset( $_REQUEST[ "PW" ] ) ? $_REQUEST[ "PW" ] : "" ;
$ans = "i4004" ;
?>
<html>
<head>
<title>crypt() 英数字5桁</title>
<meta charset="utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<h1>crypt()暗号化</h1>
<h2>(英数字5桁やし)</h2>
<pre>
$ htpasswd -c -b -d simple-crypt-is-insecure.txt foo 答え
$ cat simple-crypt-is-insecure.txt
foo:OtP1pexfjzhyc
<font color="blue">
 # Usage: htpasswd ...
 #    -d Force CRYPT encryption of the password
 #       (8 chars max, insecure).
 #                     ~~~~~~~~</font>
</pre>
<form method="post" action="simple-crypt-is-insecure.php">
Enter foo's Password<input type="text" name="PW" size="5" /><input type="submit" />
<?php
if ( $pw == $ans ) {
   print "<b><font color='red'><br/>\nCorrect FLAG{".$ans."} 正解です。\n</br></font></b>" ;
} else {
   print "<b><font color='blue'><br/>\nWrong FLAG{".$pw."} 不正解です。\n</br></font></b>" ;
}
if ( $pw == "" ) {
   print "正解の場合は、Correct FLAG{...} と表示されます。<br />" ;
}
?>
</form>
<p>
サーバの負担になるから、ブルートフォースで解くのはやめてくれぃ。
</p>
</body>
</html>
<!-- Local Variables: -->
<!-- mode: php -->
<!-- tab-width: 4 -->
<!-- End: -->
