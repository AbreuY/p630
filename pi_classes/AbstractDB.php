<?php
/*
AbstractDB.php
abstract database class file
to be used as a base to objects
using database data
*/
//error_reporting(E_ALL);
error_reporting(0);
abstract class AbstractDB
{
	// Definitions
	const HOST  = 'localhost';  		// Your Database Server Hostname
	const USER   = 'root';				// Your Database Username
	const PASS   = '';				// Your Database User Password
	const DB     = 'p630';	        // Your Database Name
	const SUFFIX = 'p630_';
	const SITE_TITLE = 'Guru Bul';
	const SITE_PATH='http://192.168.2.24:8080/p630/'; 
	const SITE_ABS_PATH='E:/wamp/www/p630/'; // local
	
/*	// Definitions
	const HOST  = 'localhost';  		// Your Database Server Hostname
	const USER   = 'root';				// Your Database Username
	const PASS   = 'ShriSaiBaba123$';				// Your Database User Password
	const DB     = 'p630';	        // Your Database Name
	const SUFFIX = 'p630_';
	const SITE_TITLE = 'Guru Bul';
	const SITE_PATH='http://64.251.22.148/p630/'; 
	const SITE_ABS_PATH='/var/www/html/p630/'; // local
*/
	protected 
		$row,
		$mysql;
	public function __construct()
	{
		try
		{
			$this->mysql = mysql_connect(self::HOST,self::USER,self::PASS);
			mysql_select_db(self::DB);
		}
		catch (Exception $e)
		{
			echo "Caught exception: " . $e->getMessage()."\n";
			exit;
		}
		
		// verify the mysql connection is correct
		if (!$this->mysql)
		{			
			die("There has been a technical error in p630 the webmaster has been informed, please try again shortly.");
			mail("sahil@panaceatek.com", "Error in Server p630", "Database error in Dentist Consultation");
		}
		return true;
	}
	public function getField($field)
	{
		return $this->row[$field];
	}

	protected function query($sql)
	{
		//********This Two Lines for multilanguage*********//
		mysql_query("SET CHARACTER SET utf8");
		mysql_query("SET SESSION collation_connection ='utf8_general_ci'") or die (mysql_error());
		return mysql_query($sql);	
	}
	public function getLastID()
	{
		return mysql_insert_id($this->mysql);
	}
}
?>