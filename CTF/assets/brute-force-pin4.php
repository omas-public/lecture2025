<?php // -*- coding: utf-8 -*-
$pw = isset( $_REQUEST[ "PW" ] ) ? $_REQUEST[ "PW" ] : "" ;
$ans = "8087" ;
?>
<html>
<head>
<title>ブルートフォース攻撃</title>
<meta charset="utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<h1>ブルートフォース攻撃</h1>
<h2>(たった数字4桁やし)</h2>
<form method="post" action="brute-force-pin4.php">
Enter PW<input type="text" name="PW" size="4" /><input type="submit" />
<?php
if ( $pw == $ans ) {
   print "<b><font color='red'><br/>\nCorrect FLAG{".$ans."} 正解です。\n</br></font></b>" ;
} else {
   print "<b><font color='blue'><br/>\nWrong FLAG{".$pw."} 不正解です。\n</br></font></b>" ;
}
if ( $pw == "" ) {
   print "正解の場合は、Correct FLAG{...} と表示されます。<br />" ;
   print "ヒント：普通のサイト管理者なら、<font color='red'>8000回</font>ぐらい連続アクセスされると、攻撃されたと誤認しちゃうよな。頼むから script 書くときはこのヒントよく読んでね。" ;
}
?>
</form>
<p>
curl とか w3m といったツールを使ってshell script 書かないと大変かな。
</p>
</body>
</html>
<!-- Local Variables: -->
<!-- mode: php -->
<!-- tab-width: 4 -->
<!-- End: -->
