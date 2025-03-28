-- $ sqlite3 sql-injection-databse.db < sql-injection-database.sql

create table ID_Profile (
	id	varchar(10) ,
	profile	varchar(100)
) ;
insert into ID_Profile values( 't-saitoh' , 'phone:12-3456' ) ;
insert into ID_Profile values( 'sakamoto' , 'email:sakamoto@example.jp' ) ;
insert into ID_Profile values( 'aoyama' , 'phone:090-9999-9999' ) ;
insert into ID_Profile values( 'flag' , 'FLAG{YBB=500Yen}' ) ;

--- Local Variables: ---
--- mode: sql ---
--- End: ---
