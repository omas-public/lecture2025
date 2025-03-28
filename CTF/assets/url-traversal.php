<?php // -*- coding: utf-8 -*-
$uid = isset( $_REQUEST[ "uid" ] ) ? $_REQUEST[ "uid" ] : "" ;
$array = array(
    't-saitoh' => "phone:12-3456" ,
    'sakamoto' => "email:sokomata@example.jp" ,
    'flag' => "FLAG{URLAttack}" ,
) ;
?>
<html>
<head>
<title>URLトラバーサル</title>
<meta charset="utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
 <script type="text/javascript">
  function no_flag() {
    uid = document.input_form.uid.value ;
    if ( uid == "flag" ) {
       alert( "uid に "+uid+" って入力するんじゃねぇ!" ) ;
       return false ;
    } else {
       return true ;
    }
  }
 </script>
<h1>URLトラバーサル</h1>
<form name="input_form" method="post" action="url-traversal.php" onsubmit="return no_flag()" >
User-ID
<select name="uid">
    <option value="">IDを選んでください</option>
    <option value="t-saitoh">t-saitoh</option>
    <option value="sakamoto">sakamoto</option>
    <!-- <option value="flag">flag</option> -->
</select>
<input type="submit" />
</form>
<pre>
<?php
     print "uid : ".htmlspecialchars($uid)."<br/>\n" ;
	 print "value : ".$array[ $uid ]."<br/>\n" ;
?>
</pre>
</body>
</html>
