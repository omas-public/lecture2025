<?php // -*- coding: utf-8 -*-
$file = "database.csv" ;
$uid = isset( $_REQUEST[ "uid" ] ) ? $_REQUEST[ "uid" ] : "" ;
?>
<html lang="ja">
<head>
<title>beware-dot-bak-file</title>
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
<h1>Beware-Dot-Bak-File</h1>
<h2>あびばぁ会員データベース</h2>
<form method="post" action="beware-dot-bak-file.php"
      name="input_form" onsubmit="return no_flag()">
User-ID <input type="text" name="uid"/>
        <input type="submit" />
</form>
<pre>
<?php
     if ( ($fp = fopen( "$file" , "r" )) !== FALSE ) {
         $count = 0 ;
         while( ($line = fgets( $fp , 999 )) !== FALSE ) {
             if ( preg_match( "/^\s*#/" , $line ) )
                 continue ;
             $data = preg_split( "/\s+/" , $line ) ;
             if ( $data[0] == $uid ) {
                 printf( "%d: %s , %s\n" , ++$count , $data[0] , $data[1] ) ;
             }
         }
         fclose( $fp ) ;
         if ( $count == 0 ) {
             print( "input user-id like t-saitoh\n" ) ;
         }
     }
?>
</pre>
</body>
</html>
