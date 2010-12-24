<?php

/**************************************************
 * PHP DEBUGGER
 **************************************************/

/**************************************************
 * @package phpDebugger
 * @subpackage interface
 * @version 1.01
 * @build 1042
 **************************************************/

/**************************************************
 * @author: Roman Matthias Keil
 * @copyright: Roman Matthias Keil
 **************************************************/

require_once 'config/debugger.inc.php';

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
	 * @return unknown_type
	 */
	public function selectALL() {
		$sql = 'SELECT * FROM `'.DATABASE_TABLE.'` ORDER BY `timestamp` DESC';
		return mysql_query($sql);
	}

	/**
	 * @return unknown_type
	 */
	public function selectLAST() {
		$sql = 'SELECT * FROM `'.DATABASE_TABLE.'` WHERE `session` = (SELECT MAX(`session`) FROM `'.DATABASE_TABLE.'`)';
		return mysql_query($sql);
	}

	/**
	 * @return unknown_type
	 */
	public function clear() {
		$sql = 'TRUNCATE TABLE `'.DATABASE_TABLE.'`';
		return mysql_query($sql);
	}
}
?>