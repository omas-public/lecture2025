<?php // -*- coding: utf-8 -*-
$id = isset( $_POST[ "id" ] ) ? $_POST[ "id" ] : "" ;
$dbfile = "/home/t-saitoh/public_html/ctf/sql-injection-database.db" ;
?>
<html>
<head>
<title>SQL-Injection</title>
<meta charset="utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<h1>SQL-Injection</h1>
<h2>Welcome ゃほぉびーびー</h2>
<form method="post" action="sql-injection.php">
Enter ID<input type="text" name="id" /><input type="submit" />
</form>
<pre>
<?php
     try {
         $db = new PDO( "sqlite:$dbfile" ) ;

         $sql = "select * from ID_Profile where id='$id' ;" ;
         $count = 0 ;
         //print htmlspecialchars($sql)."\n" ;
         print "select * from ID_Profile where id='<span style=\"background-color:pink;\">".htmlspecialchars($id)."</span>' ;\n" ;
         if ( ($query = $db->query( $sql )) !== FALSE ) {
	     //print htmlspecialchars($sql)."\n" ;
             while( ($result = $query->fetch( PDO::FETCH_NUM )) !== FALSE ) {
                 printf( "%d %s %s\n" , ++$count , $result[0] , $result[1] ) ;
             }
         } else {
             // print_r( $db->errorInfo() ) ;
         }
         if ( $count == 0 ) {
             print( "input user-id like t-saitoh\n" ) ;
         }
     } catch( PDOException $e ) {
         // die( 'Error: '.$e->getMessage() ) ;
     }
?>
</pre>
</body>
</html>
<!-- Local Variables: -->
<!-- mode: php -->
<!-- tab-width: 4 -->
<!-- End: -->
