<?php
	class Database{
		private static $HOST = 'localhost';
		private static $NAME = 'VirFile';
		private static $USER = 'root';
		private static $PASS = '';

		private static $Conn = null;

		public static function Connect(){
			try{
				self::$Conn = new PDO('mysql:host='.self::$HOST.';dbname='.self::$NAME,self::$USER,self::$PASS);
			}catch(PDOException $e){die($e -> getMessage());}
			return self::$Conn;
		}
		public static function free(){self::$Conn = null;}
	}

?>