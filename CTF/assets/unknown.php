<?php // -*- coding: utf-8 -*-
?>
<html lang="ja">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>unknown</title>
  <link rel='stylesheet' href='/cstyle.css' type='text/css' media='all' />
  <script type="text/javascript">
   function my_crypt( c ) {
       var idx = "ABCDEFGHIJKLMNOPQRSTUVWXYZ".indexOf( c ) ;
       return "ZABCDEFGHIJKLMNOPQRSTUVWXYZ".charAt( idx ) ;
   }
   function main( str ) {
       var uarea = document.getElementById( "uarea" ) ;
       var text = "" ;
       for( var i = 0 ; i < str.length ; i++ ) {
           var c = str.charAt( i ).toUpperCase() ;
           if ( c == ' ' ) {
               text += '<font size=7>・</font>' ;
           } else if ( c == '!' ) {
               text += '<img src="unknown/EX.png" />' ;
           } else if ( c == '?' ) {
               text += '<img src="unknown/QU.png" />' ;
           } else {
               text += '<img src="unknown/'+ my_crypt( c ) +'.png" />' ;
           }
       }
       uarea.innerHTML = text ;
   }
  </script>
 </head>
 <body onload="main('Vopxo jt b Qtzdijd uzqf Qplfnpo! GMBH jt vopxo ! Dbo zpv sfbe uijt?');">
   <!-- $ echo "hoge" | tr a-z b-za | tr A-Z B-ZA -->
   <h1>なぞのもじ</h1>
   <div id="uarea">
   </div>
 </body>
</html>
<!-- Local Variables: -->
<!-- mode: php -->
<!-- End: -->
