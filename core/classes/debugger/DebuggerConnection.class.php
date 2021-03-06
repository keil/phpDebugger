<?php

/**************************************************
 * PHP DEBUGGER
 **************************************************/

/**************************************************
 * @package phpDebugger
 * @subpackage core
 * @version 1.01
 * @build 1042
 **************************************************/

/**************************************************
 * @author: Roman Matthias Keil
 * @copyright: Roman Matthias Keil
 **************************************************/

Application::import('config.debugger');

class DebuggerConnection {

	/**
	 * @var unknown_type
	 */
	private $connection;

	/**
	 * @return unknown_type
	 */
	function __construct() {
		$this->connection = mysql_connect(DATABASE_HOST, DATABASE_USERNAME, DATABASE_PASSWORD) or die(": " . mysql_error());
		mysql_select_db(DATABASE) or die(": " . mysql_error());
	}

	/**
	 * @return unknown_type
	 */
	function __destruct() {
		mysql_close($this->connection);
	}

	/**
	 * @param $_event the event to log
	 * @param $_message the message to log
	 * @return unknown_type
	 */
	public function insert($_session, $_identifier, $_value) {
		$session = mysql_real_escape_string($_session);
		$identifier = mysql_real_escape_string($_identifier);
		$value = mysql_real_escape_string($_value);
		$sql = 'INSERT INTO `'.TABLE_DEBUG.'` (`session`, `timestamp`, `identifier`, `value`) VALUES (\''.$session.'\', NOW(), \''.$identifier.'\', \''.$value.'\');';
		$res = mysql_query($sql);
	}
	
	/**
	 * @return int
	 */
	public function getSession() {
		$sql = 'SELECT MAX(`session`) FROM `'.TABLE_DEBUG.'`;';
		$result =  mysql_fetch_array(mysql_query($sql));
		
		if(isset($result))
			return $result[0];
		else
			return 0;
	}
}
?>
